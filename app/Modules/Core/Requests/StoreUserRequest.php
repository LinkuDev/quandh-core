<?php

namespace App\Modules\Core\Requests;

use App\Modules\Core\Enums\UserStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        if ($this->has('user_name') && trim((string) $this->user_name) === '') {
            $this->merge(['user_name' => null]);
        }
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'user_name' => 'nullable|string|max:100|unique:users,user_name|regex:/^[a-zA-Z0-9._-]*$/',
            'password' => 'required|string|min:6|confirmed',
            'status' => ['nullable', 'in:'.implode(',', UserStatusEnum::values())],
            'position' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'zalo_id' => 'nullable|string|max:100',
            'department_id' => 'required|integer|exists:departments,id',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên người dùng không được để trống.',
            'name.max' => 'Tên người dùng không được vượt quá 255 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'user_name.unique' => 'Tên đăng nhập đã tồn tại.',
            'user_name.regex' => 'Tên đăng nhập chỉ chấp nhận chữ, số, dấu chấm, gạch dưới, gạch ngang.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu không khớp.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'department_id.required' => 'Đơn vị không được để trống.',
            'department_id.exists' => 'Đơn vị không tồn tại.',
            'role_id.required' => 'Vai trò không được để trống.',
            'role_id.exists' => 'Vai trò không tồn tại.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => ['description' => 'Tên người dùng', 'example' => 'Nguyễn Văn A'],
            'email' => ['description' => 'Email đăng nhập', 'example' => 'user@example.com'],
            'user_name' => ['description' => 'Tên đăng nhập', 'example' => 'nguyenvana'],
            'password' => ['description' => 'Mật khẩu (tối thiểu 6 ký tự)', 'example' => 'password123'],
            'password_confirmation' => ['description' => 'Xác nhận mật khẩu', 'example' => 'password123'],
            'status' => ['description' => 'Trạng thái', 'example' => UserStatusEnum::Active->value],
            'position' => ['description' => 'Chức vụ', 'example' => 'Chuyên viên'],
            'phone' => ['description' => 'Số điện thoại', 'example' => '0901234567'],
            'zalo_id' => ['description' => 'Zalo ID', 'example' => '0901234567'],
            'department_id' => ['description' => 'ID đơn vị', 'example' => 1],
            'role_id' => ['description' => 'ID vai trò', 'example' => 1],
        ];
    }
}
