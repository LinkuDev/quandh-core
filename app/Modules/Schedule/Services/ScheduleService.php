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
        'department', 'chairperson',
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
        return Schedule::with(['department', 'chairperson', 'participants', 'participants.user', 'creator'])
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
        $schedules = Schedule::with(['chairperson', 'participants', 'participants.user'])
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
     * Scope query: event_date + department_id.
     */
    private function scopeQuery(Schedule $schedule)
    {
        return Schedule::where('event_date', $schedule->event_date)
            ->where('department_id', $schedule->department_id);
    }

    /**
     * Dồn lại sort_order liên tục (1, 2, 3...) cho scope hiện tại, loại trừ 1 bản ghi.
     */
    private function reorderScope(string $eventDate, ?int $departmentId, ?int $excludeId = null): void
    {
        $query = Schedule::where('event_date', $eventDate)
            ->where('department_id', $departmentId)
            ->orderBy('sort_order');

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $schedules = $query->get();
        foreach ($schedules as $index => $s) {
            if ($s->sort_order !== $index + 1) {
                $s->update(['sort_order' => $index + 1]);
            }
        }
    }

    /**
     * Di chuyển lịch lên trên (swap sort_order với bản ghi liền trước cùng scope).
     */
    public function moveUp(Schedule $schedule): Schedule
    {
        $prev = $this->scopeQuery($schedule)
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
        $next = $this->scopeQuery($schedule)
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
            $oldDate = $schedule->event_date->format('Y-m-d');
            $oldDeptId = $schedule->department_id;

            /* Dồn sort_order tại scope đích, exclude bản ghi đang di chuyển */
            Schedule::where('event_date', $target->event_date)
                ->where('department_id', $target->department_id)
                ->where('id', '!=', $schedule->id)
                ->where('sort_order', '>=', $targetOrder)
                ->increment('sort_order');

            $schedule->update([
                'sort_order' => $targetOrder,
                'event_date' => $target->event_date,
                'department_id' => $target->department_id,
            ]);

            /* Dồn lại scope cũ nếu khác scope đích */
            $isSameScope = $oldDate === $target->event_date->format('Y-m-d')
                && $oldDeptId === $target->department_id;

            if (! $isSameScope) {
                $this->reorderScope($oldDate, $oldDeptId);
            }
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
            $oldDate = $schedule->event_date->format('Y-m-d');
            $oldDeptId = $schedule->department_id;

            /* Dồn sort_order tại scope đích, exclude bản ghi đang di chuyển */
            Schedule::where('event_date', $target->event_date)
                ->where('department_id', $target->department_id)
                ->where('id', '!=', $schedule->id)
                ->where('sort_order', '>', $targetOrder)
                ->increment('sort_order');

            $schedule->update([
                'sort_order' => $targetOrder + 1,
                'event_date' => $target->event_date,
                'department_id' => $target->department_id,
            ]);

            /* Dồn lại scope cũ nếu khác scope đích */
            $isSameScope = $oldDate === $target->event_date->format('Y-m-d')
                && $oldDeptId === $target->department_id;

            if (! $isSameScope) {
                $this->reorderScope($oldDate, $oldDeptId);
            }
        });

        return $schedule->fresh($this->eagerLoads);
    }

    /* ── Lịch công khai ── */

    public function publicIndex(array $filters, int $limit)
    {
        return Schedule::with(['department', 'chairperson', 'participants', 'participants.user'])
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
