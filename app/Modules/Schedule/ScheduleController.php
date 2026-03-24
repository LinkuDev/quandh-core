<?php

namespace App\Modules\Schedule;

use App\Http\Controllers\Controller;
use App\Modules\Core\Requests\FilterRequest;
use App\Modules\Schedule\Models\Schedule;
use App\Modules\Schedule\Requests\BulkDestroyScheduleRequest;
use App\Modules\Schedule\Requests\BulkUpdateStatusScheduleRequest;
use App\Modules\Schedule\Requests\ChangeStatusScheduleRequest;
use App\Modules\Schedule\Requests\ImportScheduleRequest;
use App\Modules\Schedule\Requests\SortOrderScheduleRequest;
use App\Modules\Schedule\Requests\StoreScheduleRequest;
use App\Modules\Schedule\Requests\UpdateScheduleRequest;
use App\Modules\Schedule\Resources\ScheduleCollection;
use App\Modules\Schedule\Resources\ScheduleResource;
use App\Modules\Schedule\Services\ScheduleService;

/**
 * @group Schedule - Lịch công tác
 * @header X-Organization-Id ID tổ chức cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1
 *
 * Quản lý lịch công tác Thường trực Thành ủy và Văn phòng Thành ủy: thống kê, danh sách, chi tiết, tạo, cập nhật, xóa, thao tác hàng loạt, sắp xếp thứ tự, xuất Excel/PDF, nhập Excel.
 */
class ScheduleController extends Controller
{
    public function __construct(private ScheduleService $scheduleService) {}

    /**
     * Lịch công tác công khai
     *
     * Trả về danh sách lịch công tác đang hoạt động cho hiển thị công khai.
     *
     * @unauthenticated
     *
     * @queryParam from_date date Lọc từ ngày (Y-m-d). Example: 2026-04-01
     * @queryParam to_date date Lọc đến ngày (Y-m-d). Example: 2026-04-30
     * @queryParam organization_id integer ID tổ chức.
     * @queryParam session string Buổi: sang, chieu, toi.
     * @queryParam limit integer Số bản ghi mỗi trang (1-100). Example: 20
     */
    public function publicIndex(FilterRequest $request)
    {
        $items = $this->scheduleService->publicIndex($request->all(), (int) ($request->limit ?? 20));

        return $this->successCollection(new ScheduleCollection($items));
    }

    /**
     * Thống kê lịch công tác
     *
     * Tổng số lịch, số lịch đang hoạt động, không hoạt động (áp dụng bộ lọc).
     *
     * @queryParam search string Từ khóa tìm kiếm theo nội dung.
     * @queryParam status string Trạng thái: active, inactive.
     * @queryParam organization_id integer ID tổ chức.
     * @queryParam from_date date Lọc từ ngày (Y-m-d). Example: 2026-04-01
     * @queryParam to_date date Lọc đến ngày (Y-m-d). Example: 2026-04-30
     *
     * @response 200 {"success": true, "data": {"total": 50, "active": 45, "inactive": 5}}
     */
    public function stats(FilterRequest $request)
    {
        return $this->success($this->scheduleService->stats($request->all()));
    }

    /**
     * Danh sách lịch công tác
     *
     * Lấy danh sách có phân trang, lọc thông minh và sắp xếp.
     *
     * @queryParam search string Tìm kiếm theo nội dung.
     * @queryParam status string Trạng thái: active, inactive.
     * @queryParam event_date date Lọc theo ngày cụ thể (Y-m-d).
     * @queryParam from_date date Lọc từ ngày (Y-m-d).
     * @queryParam to_date date Lọc đến ngày (Y-m-d).
     * @queryParam session string Buổi: sang, chieu, toi.
     * @queryParam organization_id integer ID tổ chức.
     * @queryParam chairperson_id integer Lọc theo chủ trì.
     * @queryParam meeting_type_id integer Lọc theo loại cuộc họp.
     * @queryParam nature_id integer Lọc theo tính chất.
     * @queryParam position string Lọc theo chức danh chủ trì.
     * @queryParam participant_user_id integer Lọc theo thành phần tham dự.
     * @queryParam sort_by string Sắp xếp theo: id, event_date, start_time, sort_order, created_at, updated_at. Example: sort_order
     * @queryParam sort_dir string Thứ tự: asc, desc. Example: asc
     * @queryParam limit integer Số bản ghi mỗi trang (1-100). Example: 20
     *
     * @apiResourceCollection App\Modules\Schedule\Resources\ScheduleCollection
     *
     * @apiResourceModel App\Modules\Schedule\Models\Schedule paginate=20
     *
     * @apiResourceAdditional success=true
     */
    public function index(FilterRequest $request)
    {
        $items = $this->scheduleService->index($request->all(), (int) ($request->limit ?? 20));

        return $this->successCollection(new ScheduleCollection($items));
    }

    /**
     * Chi tiết lịch công tác
     *
     * @urlParam schedule integer required ID lịch. Example: 1
     *
     * @apiResource App\Modules\Schedule\Resources\ScheduleResource
     *
     * @apiResourceModel App\Modules\Schedule\Models\Schedule
     *
     * @apiResourceAdditional success=true
     */
    public function show(Schedule $schedule)
    {
        $schedule = $this->scheduleService->show($schedule);

        return $this->successResource(new ScheduleResource($schedule));
    }

    /**
     * Tạo lịch công tác
     *
     * @bodyParam content string required Nội dung lịch. Example: Họp Ban Thường vụ
     * @bodyParam event_date date required Ngày diễn ra (Y-m-d). Example: 2026-04-01
     * @bodyParam session string required Buổi: sang, chieu, toi. Example: sang
     * @bodyParam organization_id integer required ID tổ chức. Example: 1
     * @bodyParam start_time string Giờ bắt đầu (HH:mm). Example: 08:00
     * @bodyParam chairperson_id integer ID người chủ trì. Example: 1
     * @bodyParam location string Địa điểm. Example: Phòng họp A
     * @bodyParam prep_unit string Đơn vị chuẩn bị. Example: Văn phòng
     * @bodyParam driver_info string Thông tin lái xe. Example: Nguyễn Văn A

     * @bodyParam meeting_type_id integer ID loại cuộc họp. Example: 1
     * @bodyParam nature_id integer ID tính chất. Example: 1
     * @bodyParam color_code string Mã màu. Example: #FF5733
     * @bodyParam participants array Danh sách thành phần tham dự.
     * @bodyParam participants.*.user_id integer ID user tham dự.
     * @bodyParam participants.*.external_name string Tên thành phần bên ngoài.
     * @bodyParam notifications array Danh sách thông báo nhắc lịch.
     * @bodyParam notifications.*.user_id integer required ID người nhận.
     * @bodyParam notifications.*.channel string required Kênh: sms, zalo, website, app.
     * @bodyParam notifications.*.remind_at datetime required Thời gian nhắc.
     * @bodyParam attachments file[] Tập tin đính kèm (tối đa 20 file, mỗi file tối đa 10MB).
     *
     * @apiResource App\Modules\Schedule\Resources\ScheduleResource status=201
     *
     * @apiResourceModel App\Modules\Schedule\Models\Schedule
     *
     * @apiResourceAdditional success=true message="Tạo lịch công tác thành công!"
     */
    public function store(StoreScheduleRequest $request)
    {
        $schedule = $this->scheduleService->store(
            $request->validated(),
            $request->file('attachments', [])
        );

        return $this->successResource(new ScheduleResource($schedule), 'Tạo lịch công tác thành công!', 201);
    }

    /**
     * Cập nhật lịch công tác
     *
     * @urlParam schedule integer required ID lịch. Example: 1
     *
     * @bodyParam content string Nội dung lịch.
     * @bodyParam event_date date Ngày diễn ra (Y-m-d).
     * @bodyParam session string Buổi: sang, chieu, toi.
     * @bodyParam organization_id integer ID tổ chức.
     * @bodyParam start_time string Giờ bắt đầu (HH:mm).
     * @bodyParam chairperson_id integer ID người chủ trì.
     * @bodyParam location string Địa điểm.
     * @bodyParam prep_unit string Đơn vị chuẩn bị.
     * @bodyParam driver_info string Thông tin lái xe.

     * @bodyParam meeting_type_id integer ID loại cuộc họp.
     * @bodyParam nature_id integer ID tính chất.
     * @bodyParam color_code string Mã màu.
     * @bodyParam participants array Danh sách thành phần tham dự (ghi đè toàn bộ).
     * @bodyParam notifications array Danh sách thông báo (ghi đè toàn bộ).
     * @bodyParam remove_attachment_ids array Danh sách ID file cần xóa.
     * @bodyParam attachments file[] Tập tin đính kèm mới.
     *
     * @apiResource App\Modules\Schedule\Resources\ScheduleResource
     *
     * @apiResourceModel App\Modules\Schedule\Models\Schedule
     *
     * @apiResourceAdditional success=true message="Cập nhật lịch công tác thành công!"
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $this->authorize('update', $schedule);

        $schedule = $this->scheduleService->update(
            $schedule,
            $request->validated(),
            $request->file('attachments', [])
        );

        return $this->successResource(new ScheduleResource($schedule), 'Cập nhật lịch công tác thành công!');
    }

    /**
     * Xóa lịch công tác
     *
     * @urlParam schedule integer required ID lịch. Example: 1
     *
     * @response 200 {"success": true, "message": "Xóa lịch công tác thành công!"}
     */
    public function destroy(Schedule $schedule)
    {
        $this->authorize('destroy', $schedule);

        $this->scheduleService->destroy($schedule);

        return $this->success(null, 'Xóa lịch công tác thành công!');
    }

    /**
     * Xóa hàng loạt lịch công tác
     *
     * @bodyParam ids array required Danh sách ID. Example: [1, 2, 3]
     *
     * @response 200 {"success": true, "message": "Đã xóa thành công các lịch được chọn!"}
     */
    public function bulkDestroy(BulkDestroyScheduleRequest $request)
    {
        $this->scheduleService->bulkDestroy($request->ids);

        return $this->success(null, 'Đã xóa thành công các lịch được chọn!');
    }

    /**
     * Cập nhật trạng thái hàng loạt
     *
     * @bodyParam ids array required Danh sách ID. Example: [1, 2, 3]
     * @bodyParam status string required Trạng thái mới: active, inactive. Example: active
     *
     * @response 200 {"success": true, "message": "Cập nhật trạng thái hàng loạt thành công!"}
     */
    public function bulkUpdateStatus(BulkUpdateStatusScheduleRequest $request)
    {
        $this->scheduleService->bulkUpdateStatus($request->ids, $request->status);

        return $this->success(null, 'Cập nhật trạng thái hàng loạt thành công!');
    }

    /**
     * Đổi trạng thái lịch công tác
     *
     * @urlParam schedule integer required ID lịch. Example: 1
     *
     * @bodyParam status string required Trạng thái mới: active, inactive. Example: active
     */
    public function changeStatus(ChangeStatusScheduleRequest $request, Schedule $schedule)
    {
        $schedule = $this->scheduleService->changeStatus($schedule, $request->status);

        return $this->successResource(new ScheduleResource($schedule), 'Đổi trạng thái thành công!');
    }

    /**
     * Xuất Excel lịch công tác
     *
     * Xuất ra các trường: id, ngày, buổi, thời gian, nội dung, chủ trì, thành phần, địa điểm, đơn vị chuẩn bị, số người, loại cuộc họp, tính chất, lái xe, mã màu, khối, trạng thái, người tạo, người sửa, ngày tạo, ngày cập nhật.
     *
     * @queryParam search string Tìm kiếm theo nội dung.
     * @queryParam status string Trạng thái: active, inactive.
     * @queryParam organization_id integer ID tổ chức.
     * @queryParam from_date date Lọc từ ngày (Y-m-d).
     * @queryParam to_date date Lọc đến ngày (Y-m-d).
     */
    public function export(FilterRequest $request)
    {
        return $this->scheduleService->export($request->all());
    }

    /**
     * Nhập Excel lịch công tác
     *
     * Cột bắt buộc: noi_dung, ngay, buoi. Cột không bắt buộc: thoi_gian, dia_diem, don_vi_chuan_bi, lai_xe, so_nguoi, ma_mau, khoi (mặc định "thuong_trac"), trang_thai (mặc định "active").
     *
     * @bodyParam file file required File Excel (xlsx, xls, csv).
     *
     * @response 200 {"success": true, "message": "Import lịch công tác thành công."}
     */
    public function import(ImportScheduleRequest $request)
    {
        $this->scheduleService->import($request->file('file'));

        return $this->success(null, 'Import lịch công tác thành công.');
    }

    /**
     * Xuất PDF lịch công tác
     *
     * Xuất lịch công tác ra file PDF theo bộ lọc.
     *
     * @queryParam organization_id integer ID tổ chức.
     * @queryParam from_date date Lọc từ ngày (Y-m-d).
     * @queryParam to_date date Lọc đến ngày (Y-m-d).
     * @queryParam session string Buổi: sang, chieu, toi.
     */
    public function exportPdf(FilterRequest $request)
    {
        return $this->scheduleService->exportPdf($request->all());
    }

    /* ── Sắp xếp thứ tự ── */

    /**
     * Di chuyển lịch lên trên
     *
     * Swap vị trí với lịch liền trước cùng ngày và khối.
     *
     * @urlParam schedule integer required ID lịch. Example: 1
     */
    public function moveUp(Schedule $schedule)
    {
        $schedule = $this->scheduleService->moveUp($schedule);

        return $this->successResource(new ScheduleResource($schedule), 'Di chuyển lên thành công!');
    }

    /**
     * Di chuyển lịch xuống dưới
     *
     * Swap vị trí với lịch liền sau cùng ngày và khối.
     *
     * @urlParam schedule integer required ID lịch. Example: 1
     */
    public function moveDown(Schedule $schedule)
    {
        $schedule = $this->scheduleService->moveDown($schedule);

        return $this->successResource(new ScheduleResource($schedule), 'Di chuyển xuống thành công!');
    }

    /**
     * Chèn lịch phía trên bản ghi đích
     *
     * @urlParam schedule integer required ID lịch cần di chuyển. Example: 1
     *
     * @bodyParam target_id integer required ID lịch đích. Example: 5
     */
    public function insertAbove(SortOrderScheduleRequest $request, Schedule $schedule)
    {
        $schedule = $this->scheduleService->insertAbove($schedule, $request->target_id);

        return $this->successResource(new ScheduleResource($schedule), 'Chèn phía trên thành công!');
    }

    /**
     * Chèn lịch phía dưới bản ghi đích
     *
     * @urlParam schedule integer required ID lịch cần di chuyển. Example: 1
     *
     * @bodyParam target_id integer required ID lịch đích. Example: 5
     */
    public function insertBelow(SortOrderScheduleRequest $request, Schedule $schedule)
    {
        $schedule = $this->scheduleService->insertBelow($schedule, $request->target_id);

        return $this->successResource(new ScheduleResource($schedule), 'Chèn phía dưới thành công!');
    }
}
