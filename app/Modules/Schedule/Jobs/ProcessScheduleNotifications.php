<?php

namespace App\Modules\Schedule\Jobs;

use App\Modules\Schedule\Services\ScheduleNotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

/**
 * Job xử lý gửi thông báo nhắc lịch. Chạy định kỳ mỗi phút.
 * Ban đầu chỉ ghi log (stub), tích hợp SMS/Zalo/Firebase sau.
 */
class ProcessScheduleNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(ScheduleNotificationService $service): void
    {
        $notifications = $service->getPendingNotifications();

        foreach ($notifications as $notification) {
            try {
                /* Stub: ghi log thay vì gửi thực tế */
                Log::info('[ScheduleNotification] Gửi thông báo', [
                    'notification_id' => $notification->id,
                    'schedule_id' => $notification->schedule_id,
                    'user_id' => $notification->user_id,
                    'channel' => $notification->channel,
                    'schedule_content' => $notification->schedule?->content,
                ]);

                $service->markSent($notification);
            } catch (\Throwable $e) {
                Log::error('[ScheduleNotification] Gửi thất bại', [
                    'notification_id' => $notification->id,
                    'error' => $e->getMessage(),
                ]);
                $service->markFailed($notification);
            }
        }
    }
}
