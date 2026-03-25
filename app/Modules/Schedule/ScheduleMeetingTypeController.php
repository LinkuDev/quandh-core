<?php

namespace App\Modules\Schedule;

use App\Http\Controllers\Controller;
use App\Modules\Core\Requests\FilterRequest;
use App\Modules\Core\Resources\PublicOptionResource;
use App\Modules\Schedule\Models\ScheduleMeetingType;
use App\Modules\Schedule\Requests\StoreCatalogRequest;
use App\Modules\Schedule\Requests\UpdateCatalogRequest;
use App\Modules\Schedule\Resources\CatalogCollection;
use App\Modules\Schedule\Resources\CatalogResource;
use App\Modules\Schedule\Services\CatalogService;

/**
 * @group Schedule - Loại cuộc họp
 * @header X-Department-Id ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1
 *
 * Quản lý danh mục loại cuộc họp (danh mục đơn giản): danh sách, tạo, cập nhật, xóa.
 */
class ScheduleMeetingTypeController extends Controller
{
    public function __construct(private CatalogService $catalogService) {}

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
     * Danh sách loại cuộc họp
     *
     * @queryParam search string Từ khóa tìm kiếm theo tên.
     * @queryParam status string Lọc theo trạng thái: active, inactive.
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
}
