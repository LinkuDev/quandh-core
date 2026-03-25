<?php

namespace App\Modules\Schedule;

use App\Http\Controllers\Controller;
use App\Modules\Core\Requests\FilterRequest;
use App\Modules\Core\Resources\PublicOptionResource;
use App\Modules\Schedule\Models\ScheduleNature;
use App\Modules\Schedule\Requests\StoreCatalogRequest;
use App\Modules\Schedule\Requests\UpdateCatalogRequest;
use App\Modules\Schedule\Resources\CatalogCollection;
use App\Modules\Schedule\Resources\CatalogResource;
use App\Modules\Schedule\Services\CatalogService;

/**
 * @group Schedule - Tính chất
 * @header X-Department-Id ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1
 *
 * Quản lý danh mục tính chất cuộc họp (danh mục đơn giản): danh sách, tạo, cập nhật, xóa.
 */
class ScheduleNatureController extends Controller
{
    public function __construct(private CatalogService $catalogService) {}

    /**
     * Danh sách tính chất công khai cho dropdown
     *
     * @unauthenticated
     *
     * @queryParam search string Từ khóa tìm kiếm theo tên.
     */
    public function publicOptions(FilterRequest $request)
    {
        return $this->successCollection(PublicOptionResource::collection(
            $this->catalogService->publicOptions(ScheduleNature::class, $request->all())
        ));
    }

    /**
     * Danh sách tính chất
     *
     * @queryParam search string Từ khóa tìm kiếm theo tên.
     * @queryParam status string Lọc theo trạng thái: active, inactive.
     * @queryParam sort_by string Sắp xếp theo: id, name, created_at, updated_at.
     * @queryParam sort_order string Thứ tự: asc, desc.
     * @queryParam limit integer Số bản ghi mỗi trang (1-100). Example: 10
     */
    public function index(FilterRequest $request)
    {
        $items = $this->catalogService->index(ScheduleNature::class, $request->all(), (int) ($request->limit ?? 10));

        return $this->successCollection(new CatalogCollection($items));
    }

    /**
     * Tạo tính chất
     *
     * @bodyParam name string required Tên tính chất. Example: Quan trọng
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
     * @bodyParam name string Tên tính chất.
     * @bodyParam description string Mô tả.
     * @bodyParam status string Trạng thái: active, inactive.
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
}
