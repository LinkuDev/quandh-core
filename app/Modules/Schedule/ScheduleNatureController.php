<?php

namespace App\Modules\Schedule;

use App\Http\Controllers\Controller;
use App\Modules\Core\Requests\FilterRequest;
use App\Modules\Core\Resources\PublicOptionResource;
use App\Modules\Schedule\Models\ScheduleNature;
use App\Modules\Schedule\Requests\BulkDestroyCatalogRequest;
use App\Modules\Schedule\Requests\BulkUpdateStatusCatalogRequest;
use App\Modules\Schedule\Requests\ChangeStatusCatalogRequest;
use App\Modules\Schedule\Requests\ImportCatalogRequest;
use App\Modules\Schedule\Requests\StoreCatalogRequest;
use App\Modules\Schedule\Requests\UpdateCatalogRequest;
use App\Modules\Schedule\Resources\CatalogCollection;
use App\Modules\Schedule\Resources\CatalogResource;
use App\Modules\Schedule\Services\CatalogService;

/**
 * @group Schedule - Tính chất
 * @header X-Department-Id ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1
 *
 * Quản lý danh mục tính chất cuộc họp: thống kê, danh sách, chi tiết, tạo, cập nhật, xóa, thao tác hàng loạt, xuất/nhập và đổi trạng thái.
 */
class ScheduleNatureController extends Controller
{
    public function __construct(private CatalogService $catalogService) {}

    /**
     * Danh sách tính chất công khai
     *
     * @unauthenticated
     */
    public function public(FilterRequest $request)
    {
        return $this->successCollection(new CatalogCollection(
            $this->catalogService->publicCatalog(ScheduleNature::class, $request->all())
        ));
    }

    /**
     * Danh sách tính chất công khai cho dropdown
     *
     * @unauthenticated
     */
    public function publicOptions(FilterRequest $request)
    {
        return $this->successCollection(PublicOptionResource::collection(
            $this->catalogService->publicOptions(ScheduleNature::class, $request->all())
        ));
    }

    /**
     * Thống kê tính chất
     *
     * @response 200 {"success": true, "data": {"total": 5, "active": 4, "inactive": 1}}
     */
    public function stats(FilterRequest $request)
    {
        return $this->success($this->catalogService->stats(ScheduleNature::class, $request->all()));
    }

    /**
     * Danh sách tính chất
     *
     * @queryParam search string Từ khóa tìm kiếm theo tên.
     * @queryParam status string Lọc theo trạng thái: active, inactive.
     * @queryParam limit integer Số bản ghi mỗi trang (1-100). Example: 10
     */
    public function index(FilterRequest $request)
    {
        $items = $this->catalogService->index(ScheduleNature::class, $request->all(), (int) ($request->limit ?? 10));

        return $this->successCollection(new CatalogCollection($items));
    }

    /**
     * Chi tiết tính chất
     *
     * @urlParam scheduleNature integer required ID tính chất. Example: 1
     */
    public function show(ScheduleNature $scheduleNature)
    {
        return $this->successResource(new CatalogResource($this->catalogService->show($scheduleNature)));
    }

    /**
     * Tạo tính chất
     *
     * @bodyParam name string required Tên tính chất. Example: Họp mật
     * @bodyParam description string Mô tả.
     * @bodyParam status string required Trạng thái: active, inactive. Example: active
     */
    public function store(StoreCatalogRequest $request)
    {
        $item = $this->catalogService->store(ScheduleNature::class, $request->validated());

        return $this->successResource(new CatalogResource($item), 'Tạo tính chất thành công!', 201);
    }

    /**
     * Cập nhật tính chất
     *
     * @urlParam scheduleNature integer required ID. Example: 1
     */
    public function update(UpdateCatalogRequest $request, ScheduleNature $scheduleNature)
    {
        $item = $this->catalogService->update($scheduleNature, $request->validated());

        return $this->successResource(new CatalogResource($item), 'Cập nhật tính chất thành công!');
    }

    /**
     * Xóa tính chất
     *
     * @urlParam scheduleNature integer required ID. Example: 1
     *
     * @response 200 {"success": true, "message": "Xóa tính chất thành công!"}
     */
    public function destroy(ScheduleNature $scheduleNature)
    {
        $this->catalogService->destroy($scheduleNature);

        return $this->success(null, 'Xóa tính chất thành công!');
    }

    /**
     * Xóa hàng loạt tính chất
     *
     * @bodyParam ids array required Danh sách ID. Example: [1,2,3]
     */
    public function bulkDestroy(BulkDestroyCatalogRequest $request)
    {
        $this->catalogService->bulkDestroy(ScheduleNature::class, $request->ids);

        return $this->success(null, 'Xóa hàng loạt thành công!');
    }

    /**
     * Cập nhật trạng thái hàng loạt tính chất
     *
     * @bodyParam ids array required Danh sách ID. Example: [1,2,3]
     * @bodyParam status string required Trạng thái mới. Example: inactive
     */
    public function bulkUpdateStatus(BulkUpdateStatusCatalogRequest $request)
    {
        $this->catalogService->bulkUpdateStatus(ScheduleNature::class, $request->ids, $request->status);

        return $this->success(null, 'Cập nhật trạng thái hàng loạt thành công!');
    }

    /**
     * Đổi trạng thái tính chất
     *
     * @urlParam scheduleNature integer required ID. Example: 1
     * @bodyParam status string required Trạng thái mới. Example: active
     */
    public function changeStatus(ChangeStatusCatalogRequest $request, ScheduleNature $scheduleNature)
    {
        $item = $this->catalogService->changeStatus($scheduleNature, $request->status);

        return $this->successResource(new CatalogResource($item), 'Đổi trạng thái thành công!');
    }

    /**
     * Xuất Excel tính chất
     *
     * Xuất ra các trường: id, name, description, status, created_by, updated_by, created_at, updated_at.
     */
    public function export(FilterRequest $request)
    {
        return $this->catalogService->export(ScheduleNature::class, $request->all(), 'schedule-natures.xlsx');
    }

    /**
     * Import tính chất
     *
     * Cột bắt buộc: name. Cột không bắt buộc: description, status (mặc định "active").
     *
     * @bodyParam file file required File Excel (xlsx, xls, csv).
     *
     * @response 200 {"success": true, "message": "Import tính chất thành công."}
     */
    public function import(ImportCatalogRequest $request)
    {
        $this->catalogService->import(ScheduleNature::class, $request->file('file'));

        return $this->success(null, 'Import tính chất thành công.');
    }
}
