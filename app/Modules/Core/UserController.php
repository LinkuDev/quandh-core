<?php

namespace App\Modules\Core;

use App\Http\Controllers\Controller;
use App\Modules\Core\Models\User;
use App\Modules\Core\Requests\BulkDestroyUserRequest;
use App\Modules\Core\Requests\BulkUpdateStatusUserRequest;
use App\Modules\Core\Requests\ChangeStatusUserRequest;
use App\Modules\Core\Requests\FilterRequest;
use App\Modules\Core\Requests\ImportUserRequest;
use App\Modules\Core\Requests\StoreUserRequest;
use App\Modules\Core\Requests\UpdateUserRequest;
use App\Modules\Core\Resources\UserCollection;
use App\Modules\Core\Resources\UserResource;
use App\Modules\Core\Services\UserService;

/**
 * @group Core - User
 *
 * Quản lý người dùng: danh sách, chi tiết, tạo, cập nhật, xóa, thao tác hàng loạt, xuất/nhập Excel, đổi trạng thái.
 */
class UserController extends Controller
{
    public function __construct(private UserService $userService) {}

    /**
     * Thống kê người dùng
     *
     * Tổng số, đang kích hoạt (active), không kích hoạt (inactive, banned).
     *
     * @queryParam search string Từ khóa tìm kiếm (name, email, user_name). Example: john
     * @queryParam status string Lọc theo trạng thái: active, inactive, banned.
     * @queryParam sort_by string Sắp xếp theo: id, name, email, user_name, created_at. Example: created_at
     * @queryParam sort_order string Thứ tự: asc, desc. Example: desc
     *
     * @response 200 {"success": true, "data": {"total": 10, "active": 5, "inactive": 5}}
     */
    public function stats(FilterRequest $request)
    {
        return $this->success($this->userService->stats($request->all()));
    }

    /**
     * Danh sách người dùng
     *
     * @queryParam search string Từ khóa tìm kiếm (name, email, user_name). Example: john
     * @queryParam status string Lọc theo trạng thái: active, inactive, banned.
     * @queryParam sort_by string Sắp xếp theo: id, name, email, user_name, created_at. Example: created_at
     * @queryParam sort_order string Thứ tự: asc, desc. Example: desc
     * @queryParam limit integer Số bản ghi mỗi trang (1-100). Example: 10
     */
    public function index(FilterRequest $request)
    {
        $users = $this->userService->index($request->all(), (int) ($request->limit ?? 10));

        return $this->successCollection(new UserCollection($users));
    }

    /**
     * Chi tiết người dùng
     *
     * @urlParam user integer required ID người dùng. Example: 1
     */
    public function show(User $user)
    {
        return $this->successResource(new UserResource($this->userService->show($user)));
    }

    /**
     * Tạo người dùng mới
     *
     * Trường position tự động lấy từ role name, không cần gửi.
     *
     * @bodyParam name string required Tên người dùng. Example: Nguyễn Văn A
     * @bodyParam email string required Email (duy nhất). Example: user@example.com
     * @bodyParam user_name string Tên đăng nhập. Example: nguyenvana
     * @bodyParam password string required Mật khẩu (tối thiểu 6 ký tự). Example: password123
     * @bodyParam password_confirmation string required Xác nhận mật khẩu. Example: password123
     * @bodyParam status string Trạng thái: active, inactive, banned. Example: active
     * @bodyParam phone string Số điện thoại. Example: 0901234567
     * @bodyParam zalo_id string Zalo ID. Example: 0901234567
     * @bodyParam role_id integer required ID vai trò (position tự derive từ role). Example: 1
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->store($request->validated());

        return $this->successResource(new UserResource($user), 'Tài khoản đã được tạo thành công!', 201);
    }

    /**
     * Cập nhật người dùng
     *
     * Trường position tự động lấy từ role name, không cần gửi.
     *
     * @urlParam user integer required ID người dùng. Example: 1
     *
     * @bodyParam name string Tên người dùng. Example: Nguyễn Văn B
     * @bodyParam email string Email (duy nhất). Example: user@example.com
     * @bodyParam user_name string Tên đăng nhập. Example: nguyenvanb
     * @bodyParam password string Mật khẩu mới. Example: newpassword123
     * @bodyParam password_confirmation string Xác nhận mật khẩu. Example: newpassword123
     * @bodyParam status string Trạng thái: active, inactive, banned. Example: active
     * @bodyParam phone string Số điện thoại. Example: 0901234567
     * @bodyParam zalo_id string Zalo ID. Example: 0901234567
     * @bodyParam role_id integer ID vai trò (đổi role = đổi position). Example: 1
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user = $this->userService->update($user, $request->validated());

        return $this->successResource(new UserResource($user), 'Tài khoản đã được cập nhật!');
    }

    /**
     * Xóa người dùng
     *
     * @urlParam user integer required ID người dùng. Example: 1
     *
     * @response 200 {"success": true, "message": "Tài khoản đã được xóa thành công!"}
     */
    public function destroy(User $user)
    {
        $this->userService->destroy($user);

        return $this->success(null, 'Tài khoản đã được xóa thành công!');
    }

    /**
     * Xóa hàng loạt người dùng
     *
     * @bodyParam ids array required Danh sách ID. Example: [1, 2, 3]
     *
     * @response 200 {"success": true, "message": "Đã xóa thành công các tài khoản được chọn!"}
     */
    public function bulkDestroy(BulkDestroyUserRequest $request)
    {
        $this->userService->bulkDestroy($request->ids);

        return $this->success(null, 'Đã xóa thành công các tài khoản được chọn!');
    }

    /**
     * Cập nhật trạng thái hàng loạt
     *
     * @bodyParam ids array required Danh sách ID. Example: [1, 2, 3]
     * @bodyParam status string required Trạng thái: active, inactive, banned. Example: active
     *
     * @response 200 {"success": true, "message": "Cập nhật trạng thái thành công."}
     */
    public function bulkUpdateStatus(BulkUpdateStatusUserRequest $request)
    {
        $this->userService->bulkUpdateStatus($request->ids, $request->status);

        return $this->success(null, 'Cập nhật trạng thái thành công.');
    }

    /**
     * Xuất danh sách người dùng
     *
     * Xuất ra các trường: id, name, email, user_name, position (từ role), phone, zalo_id, role, status, created_by, updated_by, created_at, updated_at.
     *
     * @queryParam search string Từ khóa tìm kiếm (name, email).
     * @queryParam status string Lọc theo trạng thái: active, inactive, banned.
     * @queryParam sort_by string Sắp xếp theo: id, name, email, created_at.
     * @queryParam sort_order string Thứ tự: asc, desc.
     */
    public function export(FilterRequest $request)
    {
        return $this->userService->export($request->all());
    }

    /**
     * Nhập danh sách người dùng
     *
     * Cột bắt buộc: name, email. Cột không bắt buộc: user_name, password (mặc định "password"), status (mặc định "active").
     *
     * @bodyParam file file required File Excel (xlsx, xls, csv).
     *
     * @response 200 {"success": true, "message": "Import người dùng thành công."}
     */
    public function import(ImportUserRequest $request)
    {
        $this->userService->import($request->file('file'));

        return $this->success(null, 'Import người dùng thành công.');
    }

    /**
     * Thay đổi trạng thái người dùng
     *
     * @urlParam user integer required ID người dùng. Example: 1
     *
     * @bodyParam status string required Trạng thái mới: active, inactive, banned. Example: active
     */
    public function changeStatus(ChangeStatusUserRequest $request, User $user)
    {
        $user = $this->userService->changeStatus($user, $request->status);

        return $this->successResource(new UserResource($user), 'Cập nhật trạng thái thành công!');
    }
}
