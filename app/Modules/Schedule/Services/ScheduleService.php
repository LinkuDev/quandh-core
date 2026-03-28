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
        'chairperson',
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
        return Schedule::with(['chairperson', 'participants', 'participants.user', 'creator'])
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

                $schedule = Schedule::create($data);

                /* Gán sort_order dựa trên start_time trong cùng scope (event_date, schedule_type) */
                $this->recalculateSortOrder($schedule->event_date->format('Y-m-d'), $schedule->schedule_type?->value);

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

        $scheduleType = $filters['schedule_type'] ?? null;
        $typeLabel = $scheduleType
            ? \App\Modules\Schedule\Enums\ScheduleTypeEnum::tryFrom($scheduleType)?->label()
            : null;
        $title = $typeLabel ? "Lịch công tác {$typeLabel}" : 'Tổng hợp lịch công tác';

        $pdf = Pdf::loadView('exports.schedules', compact('schedules', 'title'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('lich-cong-tac.pdf');
    }

    /* ── Sort Order ── */

    /**
     * Scope query: event_date + schedule_type.
     */
    private function scopeQuery(Schedule $schedule)
    {
        return Schedule::where('event_date', $schedule->event_date->format('Y-m-d'))
            ->where('schedule_type', $schedule->schedule_type);
    }

    /**
     * Dồn lại sort_order liên tục (1, 2, 3...) cho scope hiện tại, loại trừ 1 bản ghi.
     */
    private function reorderScope(string $eventDate, ?string $scheduleType, ?int $excludeId = null): void
    {
        $query = Schedule::where('event_date', $eventDate)
            ->where('schedule_type', $scheduleType)
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
     * Tính lại sort_order cho toàn bộ scope dựa trên start_time.
     * Dùng khi tạo mới — chèn đúng vị trí theo giờ bắt đầu.
     */
    private function recalculateSortOrder(string $eventDate, ?string $scheduleType): void
    {
        $schedules = Schedule::where('event_date', $eventDate)
            ->where('schedule_type', $scheduleType)
            ->orderByRaw('start_time IS NULL, start_time ASC')
            ->orderBy('id')
            ->get();

        foreach ($schedules as $index => $s) {
            if ($s->sort_order !== $index + 1) {
                $s->update(['sort_order' => $index + 1]);
            }
        }
    }

    /**
     * Di chuyển lịch lên trên.
     */
    public function moveUp(Schedule $schedule): Schedule
    {
        DB::transaction(function () use ($schedule) {
            $ordered = $this->scopeQuery($schedule)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->pluck('id')
                ->values();

            $currentIdx = $ordered->search($schedule->id);

            if ($currentIdx === false || $currentIdx === 0) {
                return;
            }

            $ordered[$currentIdx] = $ordered[$currentIdx - 1];
            $ordered[$currentIdx - 1] = $schedule->id;

            foreach ($ordered as $index => $id) {
                Schedule::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        });

        return $schedule->fresh($this->eagerLoads);
    }

    /**
     * Di chuyển lịch xuống dưới.
     */
    public function moveDown(Schedule $schedule): Schedule
    {
        DB::transaction(function () use ($schedule) {
            $ordered = $this->scopeQuery($schedule)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->pluck('id')
                ->values();

            $currentIdx = $ordered->search($schedule->id);

            if ($currentIdx === false || $currentIdx >= $ordered->count() - 1) {
                return;
            }

            $ordered[$currentIdx] = $ordered[$currentIdx + 1];
            $ordered[$currentIdx + 1] = $schedule->id;

            foreach ($ordered as $index => $id) {
                Schedule::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        });

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
            $oldType = $schedule->schedule_type?->value;

            Schedule::where('event_date', $target->event_date)
                ->where('schedule_type', $target->schedule_type)
                ->where('id', '!=', $schedule->id)
                ->where('sort_order', '>=', $targetOrder)
                ->increment('sort_order');

            $schedule->update([
                'sort_order' => $targetOrder,
                'event_date' => $target->event_date,
                'schedule_type' => $target->schedule_type,
            ]);

            $isSameScope = $oldDate === $target->event_date->format('Y-m-d')
                && $oldType === $target->schedule_type?->value;

            if (! $isSameScope) {
                $this->reorderScope($oldDate, $oldType);
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
            $oldType = $schedule->schedule_type?->value;

            Schedule::where('event_date', $target->event_date)
                ->where('schedule_type', $target->schedule_type)
                ->where('id', '!=', $schedule->id)
                ->where('sort_order', '>', $targetOrder)
                ->increment('sort_order');

            $schedule->update([
                'sort_order' => $targetOrder + 1,
                'event_date' => $target->event_date,
                'schedule_type' => $target->schedule_type,
            ]);

            $isSameScope = $oldDate === $target->event_date->format('Y-m-d')
                && $oldType === $target->schedule_type?->value;

            if (! $isSameScope) {
                $this->reorderScope($oldDate, $oldType);
            }
        });

        return $schedule->fresh($this->eagerLoads);
    }

    /* ── Lịch công khai ── */

    public function publicIndex(array $filters, int $limit)
    {
        return Schedule::with(['chairperson', 'participants', 'participants.user'])
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
