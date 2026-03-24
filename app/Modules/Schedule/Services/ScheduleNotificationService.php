<?php

namespace App\Modules\Schedule\Services;

use App\Modules\Schedule\Models\Schedule;
use App\Modules\Schedule\Models\ScheduleNotification;
use Illuminate\Support\Collection;

/**
 * Quản lý thông báo nhắc lịch.
 */
class ScheduleNotificationService
{
    /**
     * Tạo thông báo tự động cho tất cả participants có user_id.
     *
     * Frontend gửi: { channel: 'sms', remind_at: '2026-04-01 07:00:00' }
     * Hệ thống tự tạo notification cho từng participant trong lịch.
     */
    public function syncNotifications(Schedule $schedule, array $notificationConfig): void
    {
        $schedule->notifications()->delete();

        if (empty($notificationConfig)) {
            return;
        }

        $channel = $notificationConfig['channel'] ?? 'website';
        $remindAt = $notificationConfig['remind_at'] ?? null;

        if (! $remindAt) {
            return;
        }

        /* Lấy tất cả participant có user_id (bỏ qua external) */
        $participantUserIds = $schedule->participants()
            ->whereNotNull('user_id')
            ->pluck('user_id');

        foreach ($participantUserIds as $userId) {
            $schedule->notifications()->create([
                'user_id' => $userId,
                'channel' => $channel,
                'remind_at' => $remindAt,
                'status' => 'pending',
                'created_by' => auth()->id(),
            ]);
        }
    }

    /**
     * Lấy danh sách thông báo cần gửi (pending + đến giờ).
     */
    public function getPendingNotifications(): Collection
    {
        return ScheduleNotification::with(['schedule', 'user'])
            ->where('status', 'pending')
            ->where('remind_at', '<=', now())
            ->get();
    }

    /**
     * Đánh dấu đã gửi.
     */
    public function markSent(ScheduleNotification $notification): void
    {
        $notification->update([
            'status' => 'sent',
            'sent_at' => now(),
        ]);
    }

    /**
     * Đánh dấu gửi thất bại.
     */
    public function markFailed(ScheduleNotification $notification): void
    {
        $notification->update(['status' => 'failed']);
    }

    /* ── API cho user: badge + danh sách thông báo ── */

    /**
     * Đếm số thông báo chưa đọc của user hiện tại (cho badge).
     */
    public function unreadCount(int $userId): int
    {
        return ScheduleNotification::where('user_id', $userId)
            ->where('status', 'sent')
            ->whereNull('read_at')
            ->count();
    }

    /**
     * Danh sách thông báo của user hiện tại (mới nhất trước).
     */
    public function listForUser(int $userId, int $limit = 20)
    {
        return ScheduleNotification::with(['schedule', 'schedule.organization'])
            ->where('user_id', $userId)
            ->where('status', 'sent')
            ->orderByDesc('sent_at')
            ->paginate($limit);
    }

    /**
     * Đánh dấu 1 thông báo đã đọc.
     */
    public function markRead(ScheduleNotification $notification): void
    {
        $notification->update(['read_at' => now()]);
    }

    /**
     * Đánh dấu tất cả thông báo của user là đã đọc.
     */
    public function markAllRead(int $userId): void
    {
        ScheduleNotification::where('user_id', $userId)
            ->where('status', 'sent')
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }
}
