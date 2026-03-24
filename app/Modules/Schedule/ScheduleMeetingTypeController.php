<?php

namespace App\Modules\Schedule;

use App\Http\Controllers\Controller;
use App\Modules\Core\Requests\FilterRequest;
use App\Modules\Core\Resources\PublicOptionResource;
use App\Modules\Document\Requests\BulkDestroyCatalogRequest;
use App\Modules\Document\Requests\BulkUpdateStatusCatalogRequest;
use App\Modules\Document\Requests\ChangeStatusCatalogRequest;
use App\Modules\Document\Requests\ImportCatalogRequest;
use App\Modules\Document\Requests\StoreCatalogRequest;
use App\Modules\Document\Requests\UpdateCatalogRequest;
use App\Modules\Document\Resources\CatalogCollection;
use App\Modules\Document\Resources\CatalogResource;
use App\Modules\Document\Services\CatalogService;
use App\Modules\Schedule\Models\ScheduleMeetingType;

/**
 * @group Schedule - Loại cuộc họp
 * @header X-Organization-Id ID tổ chức cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1
 *
 * Quản lý danh mục loại cuộc họp: thống kê, danh sách, chi tiết, tạo, cập nhật, xóa, thao tác hàng loạt, xuất/nhập và đổi trạng thái.
 */
class ScheduleMeetingTypeController extends Controller
{
    public function __construct(private CatalogService $catalogService) {}

    /**
     * Danh sách loại cuộc họp công khai
     *
     * @unauthenticated
     *
     * @queryParam search string Từ khóa tìm kiếm theo tên.
     * @queryParam sort_by string Sắp xếp theo: id, name, created_at, updated_at. Example: name
     * @queryParam sort_order string Thứ tự: asc, desc. Example: asc
     */
    public function public(FilterRequest $request)
    {
        $items = $this->catalogService->publicCatalog(ScheduleMeetingType::class, $request->all());

        return $this->successCollection(new CatalogCollection($items));
    }

    /**
     * Danh sách loại cuộc họp công khai cho dropdown
     *
     * @unauthenticated
     *
     * @queryParam search string Từ khóa tìm kiếm theo tên.
     */
    public function publicOptions(FilterRequest $request)
    {
        $items = $this->catalogService->publicOptions(ScheduleMeetingType::class, $request->all());

        return $this->successCollection(PublicOptionResource::collection($items));
    }

    /**
     * Thống kê loại cuộc họp
     *
     * @queryParam search string Từ khóa tìm kiếm theo tên.
     * @queryParam status string Lọc theo trạng thái: active, inactive.
     * @queryParam from_date date Lọc từ ngày tạo (Y-m-d).
     * @queryParam to_date date Lọc đến ngày tạo (Y-m-d).
     *
     * @response 200 {"success": true, "data": {"total": 10, "active": 8, "inactive": 2}}
     */
    public function stats(FilterRequest $request)
    {
        return $this->success($this->catalogService->stats(ScheduleMeetingType::class, $request->all()));
    }

    /**
     * Danh sách loại cuộc họp
     *
     * @queryParam search string Từ khóa tìm kiếm theo tên.
     * @queryParam status string Lọc theo trạng thái: active, inactive.
     * @queryParam from_date date Lọc từ ngày tạo (Y-m-d).
     * @queryParam to_date date Lọc đến ngày tạo (Y-m-d).
     * @queryParam sort_by string Sắp xếp theo: id, name, created_at, updated_at.
     * @queryParam sort_order string Thứ tự: asc, desc.
     * @queryParam limit integer Số bản ghi mỗi trang (1-100). Example: 10
     */
    public function index(FilterRequest $request)
    {
        $items = $this->catalogService->index(ScheduleMeetingType::class, $request->all(), (int) ($request->limit ?? 10));

        return $this->successCollection(new CatalogCollection($items));
    }

    /**
     * Chi tiết loại cuộc họp
     *
     * @urlParam scheduleMeetingType integer required ID loại cuộc họp. Example: 1
     */
    public function show(ScheduleMeetingType $scheduleMeetingType)
    {
        return $this->successResource(new CatalogResource($this->catalogService->show($scheduleMeetingType)));
    }

    /**
     * Tạo loại cuộc họp
     *
     * @bodyParam name string required Tên loại cuộc họp. Example: Họp thường kỳ
     * @bodyParam description string Mô tả.
     * @bodyParam status string required Trạng thái: active, inactive. Example: active
     */
    public function store(StoreCatalogRequest $request)
    {
        $item = $this->catalogService->store(ScheduleMeetingType::class, $request->validated());

        return $this->successResource(new CatalogResource($item), 'Tạo loại cuộc họp thành công!', 201);
    }

    /**
     * Cập nhật loại cuộc họp
     *
     * @urlParam scheduleMeetingType integer required ID. Example: 1
     * @bodyParam name string Tên loại cuộc họp.
     * @bodyParam description string Mô tả.
     * @bodyParam status string Trạng thái: active, inactive.
     */
    public function update(UpdateCatalogRequest $request, ScheduleMeetingType $scheduleMeetingType)
    {
        $item = $this->catalogService->update($scheduleMeetingType, $request->validated());

        return $this->successResource(new CatalogResource($item), 'Cập nhật loại cuộc họp thành công!');
    }

    /**
     * Xóa loại cuộc họp
     *
     * @urlParam scheduleMeetingType integer required ID. Example: 1
     *
     * @response 200 {"success": true, "message": "Xóa loại cuộc họp thành công!"}
     */
    public function destroy(ScheduleMeetingType $scheduleMeetingType)
    {
        $this->catalogService->destroy($scheduleMeetingType);

        return $this->success(null, 'Xóa loại cuộc họp thành công!');
    }

    /**
     * Xóa hàng loạt loại cuộc họp
     *
     * @bodyParam ids array required Danh sách ID. Example: [1,2,3]
     *
     * @response 200 {"success": true, "message": "Xóa hàng loạt thành công!"}
     */
    public function bulkDestroy(BulkDestroyCatalogRequest $request)
    {
        $this->catalogService->bulkDestroy(ScheduleMeetingType::class, $request->ids);

        return $this->success(null, 'Xóa hàng loạt thành công!');
    }

    /**
     * Cập nhật trạng thái hàng loạt loại cuộc họp
     *
     * @bodyParam ids array required Danh sách ID. Example: [1,2,3]
     * @bodyParam status string required Trạng thái mới: active, inactive. Example: inactive
     *
     * @response 200 {"success": true, "message": "Cập nhật trạng thái hàng loạt thành công!"}
     */
    public function bulkUpdateStatus(BulkUpdateStatusCatalogRequest $request)
    {
        $this->catalogService->bulkUpdateStatus(ScheduleMeetingType::class, $request->ids, $request->status);

        return $this->success(null, 'Cập nhật trạng thái hàng loạt thành công!');
    }

    /**
     * Đổi trạng thái loại cuộc họp
     *
     * @urlParam scheduleMeetingType integer required ID. Example: 1
     * @bodyParam status string required Trạng thái mới: active, inactive. Example: active
     */
    public function changeStatus(ChangeStatusCatalogRequest $request, ScheduleMeetingType $scheduleMeetingType)
    {
        $item = $this->catalogService->changeStatus($scheduleMeetingType, $request->status);

        return $this->successResource(new CatalogResource($item), 'Đổi trạng thái thành công!');
    }

    /**
     * Xuất Excel loại cuộc họp
     *
     * Xuất ra các trường: id, name, description, status, created_by, updated_by, created_at, updated_at.
     */
    public function export(FilterRequest $request)
    {
        return $this->catalogService->export(ScheduleMeetingType::class, $request->all(), 'schedule-meeting-types.xlsx');
    }

    /**
     * Import loại cuộc họp
     *
     * Cột bắt buộc: name. Cột không bắt buộc: description, status (mặc định "active").
     *
     * @bodyParam file file required File Excel (xlsx, xls, csv).
     *
     * @response 200 {"success": true, "message": "Import loại cuộc họp thành công."}
     */
    public function import(ImportCatalogRequest $request)
    {
        $this->catalogService->import(ScheduleMeetingType::class, $request->file('file'));

        return $this->success(null, 'Import loại cuộc họp thành công.');
    }
}
