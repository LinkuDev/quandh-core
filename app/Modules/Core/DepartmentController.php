<?php

namespace App\Modules\Core;

use App\Http\Controllers\Controller;
use App\Modules\Core\Models\Department;
use App\Modules\Core\Requests\BulkDestroyDepartmentRequest;
use App\Modules\Core\Requests\BulkUpdateStatusDepartmentRequest;
use App\Modules\Core\Requests\ChangeStatusDepartmentRequest;
use App\Modules\Core\Requests\FilterRequest;
use App\Modules\Core\Requests\ImportDepartmentRequest;
use App\Modules\Core\Requests\StoreDepartmentRequest;
use App\Modules\Core\Requests\UpdateDepartmentRequest;
use App\Modules\Core\Resources\DepartmentCollection;
use App\Modules\Core\Resources\DepartmentResource;
use App\Modules\Core\Resources\DepartmentTreeResource;
use App\Modules\Core\Resources\PublicOptionResource;
use App\Modules\Core\Services\DepartmentService;
use Illuminate\Http\Request;

/**
 * @group Core - Department
 * @header X-Department-Id ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1
 *
 * Quản lý đơn vị (department): stats, index, show, store, update, destroy, bulk delete, bulk status, change status, export, import.
 */
class DepartmentController extends Controller
{
    public function __construct(private DepartmentService $departmentService) {}

    /**
     * Danh sách department công khai
     *
     * Trả về danh sách department đang hoạt động (active), thứ tự theo cây, dùng cho các chức năng công khai.
     *
     * @unauthenticated
     *
     * @queryParam search string Từ khóa tìm kiếm (name, slug). Example: cong-ty
     *
     * @apiResourceCollection App\Modules\Core\Resources\DepartmentCollection
     *
     * @apiResourceModel App\Modules\Core\Models\Department
     *
     * @apiResourceAdditional success=true
     */
    public function public(FilterRequest $request)
    {
        $items = $this->departmentService->publicList($request->all());

        return $this->successCollection(new DepartmentCollection($items));
    }

    /**
     * Danh sách department công khai cho dropdown
     *
     * Trả về dữ liệu tối giản chỉ gồm id, name, description để tối ưu payload cho dropdown.
     *
     * @unauthenticated
     *
     * @queryParam search string Từ khóa tìm kiếm (name, slug). Example: cong-ty
     *
     * @apiResourceCollection App\Modules\Core\Resources\PublicOptionResource
     *
     * @apiResourceModel App\Modules\Core\Models\Department
     *
     * @apiResourceAdditional success=true
     */
    public function publicOptions(FilterRequest $request)
    {
        $items = $this->departmentService->publicOptions($request->all());

        return $this->successCollection(PublicOptionResource::collection($items));
    }

    /**
     * Thống kê department
     *
     * Tổng số, đang kích hoạt (active), không kích hoạt (inactive). Áp dụng cùng bộ lọc với index.
     *
     * @queryParam search string Từ khóa tìm kiếm (name, slug). Example: cong-ty
     * @queryParam status string Lọc theo trạng thái: active, inactive.
     * @queryParam from_date date Lọc từ ngày tạo (created_at) (Y-m-d). Example: 2026-02-01
     * @queryParam to_date date Lọc đến ngày tạo (created_at) (Y-m-d). Example: 2026-02-17
     * @queryParam sort_by string Sắp xếp theo: id, name, slug, status, created_at, updated_at. Example: created_at
     * @queryParam sort_order string Thứ tự: asc, desc. Example: desc
     * @queryParam limit integer Số bản ghi mỗi trang (1-100). Example: 10
     *
     * @response 200 {"success": true, "data": {"total": 10, "active": 5, "inactive": 5}}
     */
    public function stats(FilterRequest $request)
    {
        return $this->success($this->departmentService->stats($request->all()));
    }

    /**
     * Danh sách department
     *
     * Lấy danh sách có phân trang, lọc và sắp xếp.
     *
     * @queryParam search string Từ khóa tìm kiếm (name, slug). Example: cong-ty
     * @queryParam status string Lọc theo trạng thái: active, inactive.
     * @queryParam from_date date Lọc từ ngày tạo (created_at) (Y-m-d). Example: 2026-02-01
     * @queryParam to_date date Lọc đến ngày tạo (created_at) (Y-m-d). Example: 2026-02-17
     * @queryParam sort_by string Sắp xếp theo: id, name, slug, status, created_at, updated_at. Example: id
     * @queryParam sort_order string Thứ tự: asc, desc. Example: desc
     * @queryParam limit integer Số bản ghi mỗi trang (1-100). Example: 10
     *
     * @apiResourceCollection App\Modules\Core\Resources\DepartmentCollection
     *
     * @apiResourceModel App\Modules\Core\Models\Department paginate=10
     *
     * @apiResourceAdditional success=true
     */
    public function index(FilterRequest $request)
    {
        $items = $this->departmentService->index($request->all(), (int) ($request->limit ?? 10));

        return $this->successCollection(new DepartmentCollection($items));
    }

    /**
     * Cây department (toàn bộ cây, không phân trang). Cấu trúc parent_id.
     *
     * @queryParam status string Lọc theo trạng thái: active, inactive.
     *
     * @response 200 {"success": true, "data": [{"id": 1, "name": "Công ty A", "slug": "cong-ty-a", "status": "active", "parent_id": null, "children": []}]}
     */
    public function tree(Request $request)
    {
        $tree = $this->departmentService->tree($request->status);

        return $this->successCollection(DepartmentTreeResource::collection($tree));
    }

    /**
     * Chi tiết department
     *
     * @urlParam department integer required ID department. Example: 1
     *
     * @apiResource App\Modules\Core\Resources\DepartmentResource
     *
     * @apiResourceModel App\Modules\Core\Models\Department with=parent,children
     *
     * @apiResourceAdditional success=true
     */
    public function show(Department $department)
    {
        $department = $this->departmentService->show($department);

        return $this->successResource(new DepartmentResource($department));
    }

    /**
     * Tạo department mới
     *
     * @bodyParam name string required Tên department. Example: Công ty A
     * @bodyParam slug string Slug (nếu không gửi sẽ tự sinh từ name). Example: cong-ty-a
     * @bodyParam description string Mô tả. Example: Tổ chức quản trị
     * @bodyParam status string required Trạng thái: active, inactive. Example: active
     * @bodyParam parent_id integer ID department cha (null = gốc). Example: null
     * @bodyParam sort_order integer Thứ tự. Example: 0
     *
     * @apiResource App\Modules\Core\Resources\DepartmentResource status=201
     *
     * @apiResourceModel App\Modules\Core\Models\Department
     *
     * @apiResourceAdditional success=true message="Department đã được tạo thành công!"
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = $this->departmentService->store($request->validated());

        return $this->successResource(new DepartmentResource($department), 'Department đã được tạo thành công!', 201);
    }

    /**
     * Cập nhật department
     *
     * @urlParam department integer required ID department. Example: 1
     *
     * @bodyParam name string Tên department. Example: Công ty A
     * @bodyParam slug string Slug. Example: cong-ty-a
     * @bodyParam description string Mô tả. Example: Tổ chức quản trị
     * @bodyParam status string Trạng thái: active, inactive. Example: inactive
     * @bodyParam parent_id integer ID department cha (null = gốc). Example: null
     * @bodyParam sort_order integer Thứ tự. Example: 0
     *
     * @apiResource App\Modules\Core\Resources\DepartmentResource
     *
     * @apiResourceModel App\Modules\Core\Models\Department with=parent,children
     *
     * @apiResourceAdditional success=true message="Department đã được cập nhật!"
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $result = $this->departmentService->update($department, $request->validated());
        if (! $result['ok']) {
            return $this->error($result['message'], $result['code'], null, $result['error_code']);
        }

        return $this->successResource(new DepartmentResource($result['department']), 'Department đã được cập nhật!');
    }

    /**
     * Xóa department
     *
     * @urlParam department integer required ID department. Example: 1
     *
     * @response 200 {"success": true, "message": "Department đã được xóa!"}
     */
    public function destroy(Department $department)
    {
        $this->departmentService->destroy($department);

        return $this->success(null, 'Department đã được xóa!');
    }

    /**
     * Xóa hàng loạt department
     *
     * @bodyParam ids array required Danh sách ID. Example: [1, 2, 3]
     *
     * @response 200 {"success": true, "message": "Đã xóa thành công các department được chọn!"}
     */
    public function bulkDestroy(BulkDestroyDepartmentRequest $request)
    {
        $this->departmentService->bulkDestroy($request->ids);

        return $this->success(null, 'Đã xóa thành công các department được chọn!');
    }

    /**
     * Cập nhật trạng thái department hàng loạt
     *
     * @bodyParam ids array required Danh sách ID. Example: [1, 2, 3]
     * @bodyParam status string required Trạng thái: active, inactive. Example: active
     *
     * @response 200 {"success": true, "message": "Cập nhật trạng thái department thành công."}
     */
    public function bulkUpdateStatus(BulkUpdateStatusDepartmentRequest $request)
    {
        $this->departmentService->bulkUpdateStatus($request->ids, $request->status);

        return $this->success(null, 'Cập nhật trạng thái department thành công.');
    }

    /**
     * Thay đổi trạng thái department
     *
     * @urlParam department integer required ID department. Example: 1
     *
     * @bodyParam status string required Trạng thái mới: active, inactive. Example: inactive
     *
     * @apiResource App\Modules\Core\Resources\DepartmentResource
     *
     * @apiResourceModel App\Modules\Core\Models\Department with=parent,children
     *
     * @apiResourceAdditional success=true message="Cập nhật trạng thái thành công!"
     */
    public function changeStatus(ChangeStatusDepartmentRequest $request, Department $department)
    {
        $department = $this->departmentService->changeStatus($department, $request->status);

        return $this->successResource(new DepartmentResource($department), 'Cập nhật trạng thái thành công!');
    }

    /**
     * Xuất danh sách department
     *
     * Áp dụng cùng bộ lọc với index. Xuất ra các trường: id, name, slug, description, status, parent_id, parent_slug, sort_order, depth, created_by, updated_by, created_at, updated_at.
     *
     * @queryParam search string Từ khóa tìm kiếm (name, slug).
     * @queryParam status string Lọc theo trạng thái: active, inactive.
     * @queryParam from_date date Lọc từ ngày tạo (created_at) (Y-m-d).
     * @queryParam to_date date Lọc đến ngày tạo (created_at) (Y-m-d).
     * @queryParam sort_by string Sắp xếp theo: id, name, slug, status, created_at, updated_at.
     * @queryParam sort_order string Thứ tự: asc, desc.
     */
    public function export(FilterRequest $request)
    {
        return $this->departmentService->export($request->all());
    }

    /**
     * Nhập danh sách department
     *
     * Cột bắt buộc: name. Cột không bắt buộc: slug, description, status (mặc định "active"), parent_id.
     *
     * @bodyParam file file required File Excel (xlsx, xls, csv). Cột theo chuẩn export.
     *
     * @response 200 {"success": true, "message": "Import department thành công."}
     */
    public function import(ImportDepartmentRequest $request)
    {
        $this->departmentService->import($request->file('file'));

        return $this->success(null, 'Import department thành công.');
    }
}
