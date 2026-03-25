<?php

namespace App\Modules\Schedule;

use App\Http\Controllers\Controller;
use App\Modules\Schedule\Models\ScheduleNotification;
use App\Modules\Schedule\Resources\ScheduleNotificationCollection;
use App\Modules\Schedule\Services\ScheduleNotificationService;
use Illuminate\Http\Request;

/**
 * @group Schedule - Thông báo
 * @header X-Department-Id ID đơn vị cần làm việc. Example: 1
 *
 * API thông báo lịch công tác cho user hiện tại: đếm chưa đọc (badge), danh sách, đánh dấu đã đọc.
 */
class ScheduleNotificationController extends Controller
{
    public function __construct(private ScheduleNotificationService $service) {}

    /**
     * Số thông báo chưa đọc (badge)
     *
     * Trả về số lượng thông báo chưa đọc của user hiện tại để hiển thị badge.
     *
     * @response 200 {"success": true, "data": {"unread_count": 5}}
     */
    public function unreadCount(Request $request)
    {
        $count = $this->service->unreadCount($request->user()->id);

        return $this->success(['unread_count' => $count]);
    }

    /**
     * Danh sách thông báo
     *
     * Danh sách thông báo của user hiện tại, mới nhất trước.
     *
     * @queryParam limit integer Số bản ghi mỗi trang (1-100). Example: 20
     *
     * @apiResourceCollection App\Modules\Schedule\Resources\ScheduleNotificationCollection
     *
     * @apiResourceModel App\Modules\Schedule\Models\ScheduleNotification paginate=20
     *
     * @apiResourceAdditional success=true
     */
    public function index(Request $request)
    {
        $items = $this->service->listForUser(
            $request->user()->id,
            (int) ($request->limit ?? 20)
        );

        return $this->successCollection(new ScheduleNotificationCollection($items));
    }

    /**
     * Đánh dấu đã đọc
     *
     * @urlParam scheduleNotification integer required ID thông báo. Example: 1
     *
     * @response 200 {"success": true, "message": "Đã đánh dấu đã đọc."}
     */
    public function markRead(ScheduleNotification $scheduleNotification)
    {
        $this->service->markRead($scheduleNotification);

        return $this->success(null, 'Đã đánh dấu đã đọc.');
    }

    /**
     * Đánh dấu tất cả đã đọc
     *
     * Đánh dấu tất cả thông báo chưa đọc của user hiện tại là đã đọc.
     *
     * @response 200 {"success": true, "message": "Đã đánh dấu tất cả đã đọc."}
     */
    public function markAllRead(Request $request)
    {
        $this->service->markAllRead($request->user()->id);

        return $this->success(null, 'Đã đánh dấu tất cả đã đọc.');
    }
}
