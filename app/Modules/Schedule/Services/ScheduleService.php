<?php

namespace App\Modules\Schedule\Services;

use App\Modules\Core\Services\MediaService;
use App\Modules\Schedule\Enums\ScheduleStatusEnum;
use App\Modules\Schedule\Exports\SchedulesExport;
use App\Modules\Schedule\Imports\SchedulesImport;
use App\Modules\Schedule\Models\Schedule;
use App\Modules\Schedule\Models\ScheduleParticipant;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ScheduleService
{
    private array $eagerLoads = [
        'department', 'chairperson', 'meetingType', 'nature',
        'participants', 'participants.user',
        'notifications', 'notifications.user',
        'media', 'creator', 'editor',
    ];

    public function __construct(
        private MediaService $mediaService,
        private ScheduleNotificationService $notificationService,
    ) {}

    public function stats(array $filters): array
    {
        $base = Schedule::filter($filters);

        return [
            'total' => (clone $base)->count(),
            'active' => (clone $base)->where('schedules.status', ScheduleStatusEnum::Active->value)->count(),
            'inactive' => (clone $base)->where('schedules.status', ScheduleStatusEnum::Inactive->value)->count(),
        ];
    }

    public function index(array $filters, int $limit)
    {
        return Schedule::with(['department', 'chairperson', 'meetingType', 'nature', 'participants', 'participants.user', 'creator'])
            ->filter($filters)
            ->paginate($limit);
    }

    public function show(Schedule $schedule): Schedule
    {
        return $schedule->load($this->eagerLoads);
    }

    public function store(array $validated, array $attachments = []): Schedule
    {
        $storedFiles = [];

        try {
            return DB::transaction(function () use ($validated, $attachments, &$storedFiles) {
                $data = collect($validated)->except([
                    'participants', 'notification', 'attachments',
                ])->all();

                /* Tính sort_order tự động: max + 1 trong cùng scope (event_date, department_id) */
                $data['sort_order'] = Schedule::where('event_date', $data['event_date'])
                    ->where('department_id', $data['department_id'])
                    ->max('sort_order') + 1;

                $schedule = Schedule::create($data);

                /* Thành phần tham dự */
                $this->syncParticipants($schedule, $validated['participants'] ?? []);

                /* Thông báo — tự gửi cho tất cả participants */
                $this->notificationService->syncNotifications($schedule, $validated['notification'] ?? []);

                /* File đính kèm */
                $uploaded = $this->mediaService->uploadMany($schedule, $attachments, 'schedule-attachments', [
                    'disk' => 'public',
                ]);
                $storedFiles = array_merge($storedFiles, $uploaded);

                return $schedule->load($this->eagerLoads);
            });
        } catch (\Throwable $exception) {
            $this->mediaService->cleanupStoredFiles($storedFiles);
            throw $exception;
        }
    }

    public function update(Schedule $schedule, array $validated, array $attachments = []): Schedule
    {
        $storedFiles = [];

        try {
            return DB::transaction(function () use ($schedule, $validated, $attachments, &$storedFiles) {
                $data = collect($validated)->except([
                    'participants', 'notification', 'attachments', 'remove_attachment_ids',
                ])->all();

                $schedule->update($data);

                /* Thành phần tham dự */
                if (array_key_exists('participants', $validated)) {
                    $this->syncParticipants($schedule, $validated['participants'] ?? []);
                }

                /* Thông báo — tự gửi cho tất cả participants */
                if (array_key_exists('notification', $validated)) {
                    $this->notificationService->syncNotifications($schedule, $validated['notification'] ?? []);
                }

                /* Xóa file cũ */
                if (! empty($validated['remove_attachment_ids'])) {
                    $this->mediaService->removeByIds($schedule, $validated['remove_attachment_ids'], 'schedule-attachments');
                }

                /* Upload file mới */
                $uploaded = $this->mediaService->uploadMany($schedule, $attachments, 'schedule-attachments', [
                    'disk' => 'public',
                ]);
                $storedFiles = array_merge($storedFiles, $uploaded);

                return $schedule->load($this->eagerLoads);
            });
        } catch (\Throwable $exception) {
            $this->mediaService->cleanupStoredFiles($storedFiles);
            throw $exception;
        }
    }

    public function destroy(Schedule $schedule): void
    {
        $schedule->delete();
    }

    public function bulkDestroy(array $ids): void
    {
        Schedule::whereIn('id', $ids)->delete();
    }

    public function bulkUpdateStatus(array $ids, string $status): void
    {
        Schedule::whereIn('id', $ids)->update(['status' => $status]);
    }

    public function changeStatus(Schedule $schedule, string $status): Schedule
    {
        $schedule->update(['status' => $status]);

        return $schedule->load($this->eagerLoads);
    }

    public function export(array $filters): BinaryFileResponse
    {
        return Excel::download(new SchedulesExport($filters), 'schedules.xlsx');
    }

    public function import($file): void
    {
        Excel::import(new SchedulesImport, $file);
    }

    /**
     * Xuất lịch công tác ra PDF.
     */
    public function exportPdf(array $filters)
    {
        $schedules = Schedule::with(['chairperson', 'meetingType', 'nature', 'participants', 'participants.user'])
            ->filter($filters)
            ->get();

        $orgId = $filters['department_id'] ?? null;
        $orgName = $orgId ? \App\Modules\Core\Models\Department::find($orgId)?->name : null;
        $title = $orgName ? "Lịch công tác {$orgName}" : 'Tổng hợp lịch công tác';

        $pdf = Pdf::loadView('exports.schedules', compact('schedules', 'title'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('lich-cong-tac.pdf');
    }

    /* ── Sort Order ── */

    /**
     * Di chuyển lịch lên trên (swap sort_order với bản ghi liền trước cùng scope).
     */
    public function moveUp(Schedule $schedule): Schedule
    {
        $prev = Schedule::where('event_date', $schedule->event_date)
            ->where('department_id', $schedule->department_id)
            ->where('sort_order', '<', $schedule->sort_order)
            ->orderByDesc('sort_order')
            ->first();

        if ($prev) {
            DB::transaction(function () use ($schedule, $prev) {
                $tempOrder = $schedule->sort_order;
                $schedule->update(['sort_order' => $prev->sort_order]);
                $prev->update(['sort_order' => $tempOrder]);
            });
        }

        return $schedule->fresh($this->eagerLoads);
    }

    /**
     * Di chuyển lịch xuống dưới (swap sort_order với bản ghi liền sau cùng scope).
     */
    public function moveDown(Schedule $schedule): Schedule
    {
        $next = Schedule::where('event_date', $schedule->event_date)
            ->where('department_id', $schedule->department_id)
            ->where('sort_order', '>', $schedule->sort_order)
            ->orderBy('sort_order')
            ->first();

        if ($next) {
            DB::transaction(function () use ($schedule, $next) {
                $tempOrder = $schedule->sort_order;
                $schedule->update(['sort_order' => $next->sort_order]);
                $next->update(['sort_order' => $tempOrder]);
            });
        }

        return $schedule->fresh($this->eagerLoads);
    }

    /**
     * Chèn lịch phía trên bản ghi target (dồn sort_order).
     */
    public function insertAbove(Schedule $schedule, int $targetId): Schedule
    {
        $target = Schedule::findOrFail($targetId);
        $targetOrder = $target->sort_order;

        DB::transaction(function () use ($schedule, $target, $targetOrder) {
            Schedule::where('event_date', $target->event_date)
                ->where('department_id', $target->department_id)
                ->where('sort_order', '>=', $targetOrder)
                ->increment('sort_order');

            $schedule->update([
                'sort_order' => $targetOrder,
                'event_date' => $target->event_date,
                'department_id' => $target->department_id,
            ]);
        });

        return $schedule->fresh($this->eagerLoads);
    }

    /**
     * Chèn lịch phía dưới bản ghi target (dồn sort_order).
     */
    public function insertBelow(Schedule $schedule, int $targetId): Schedule
    {
        $target = Schedule::findOrFail($targetId);
        $targetOrder = $target->sort_order;

        DB::transaction(function () use ($schedule, $target, $targetOrder) {
            Schedule::where('event_date', $target->event_date)
                ->where('department_id', $target->department_id)
                ->where('sort_order', '>', $targetOrder)
                ->increment('sort_order');

            $schedule->update([
                'sort_order' => $targetOrder + 1,
                'event_date' => $target->event_date,
                'department_id' => $target->department_id,
            ]);
        });

        return $schedule->fresh($this->eagerLoads);
    }

    /* ── Lịch công khai ── */

    public function publicIndex(array $filters, int $limit)
    {
        return Schedule::with(['department', 'chairperson', 'meetingType', 'nature', 'participants', 'participants.user'])
            ->where('schedules.status', ScheduleStatusEnum::Active->value)
            ->filter($filters)
            ->paginate($limit);
    }

    /* ── Private ── */

    /**
     * Đồng bộ danh sách thành phần tham dự.
     */
    private function syncParticipants(Schedule $schedule, array $participants): void
    {
        $schedule->participants()->delete();

        foreach ($participants as $participant) {
            $schedule->participants()->create([
                'user_id' => $participant['user_id'] ?? null,
                'external_name' => $participant['external_name'] ?? null,
            ]);
        }
    }
}
