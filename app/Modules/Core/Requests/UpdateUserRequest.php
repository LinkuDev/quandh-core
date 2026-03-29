<?php

namespace App\Modules\Core\Requests;

use App\Modules\Core\Enums\UserStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,'.$this->route('user')?->id,
            'user_name' => 'sometimes|nullable|string|max:100|unique:users,user_name,'.$this->route('user')?->id.'|regex:/^[a-zA-Z0-9._-]*$/',
            'password' => 'sometimes|string|min:6|confirmed',
            'status' => ['sometimes', 'in:'.implode(',', UserStatusEnum::values())],
            'phone' => 'sometimes|nullable|string|max:20',
            'zalo_id' => 'sometimes|nullable|string|max:100',
            'role_id' => 'sometimes|integer|exists:roles,id',
            'avatar' => 'nullable|file|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.max' => 'Tên người dùng không được vượt quá 255 ký tự.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'user_name.unique' => 'Tên đăng nhập đã tồn tại.',
            'user_name.regex' => 'Tên đăng nhập chỉ chấp nhận chữ, số, dấu chấm, gạch dưới, gạch ngang.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu không khớp.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'role_id.exists' => 'Vai trò không tồn tại.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => ['description' => 'Tên người dùng', 'example' => 'Nguyễn Văn B'],
            'email' => ['description' => 'Email đăng nhập', 'example' => 'user@example.com'],
            'user_name' => ['description' => 'Tên đăng nhập', 'example' => 'nguyenvanb'],
            'password' => ['description' => 'Mật khẩu mới', 'example' => 'newpassword123'],
            'password_confirmation' => ['description' => 'Xác nhận mật khẩu mới', 'example' => 'newpassword123'],
            'status' => ['description' => 'Trạng thái', 'example' => UserStatusEnum::Active->value],
            'phone' => ['description' => 'Số điện thoại', 'example' => '0901234567'],
            'zalo_id' => ['description' => 'Zalo ID', 'example' => '0901234567'],
            'role_id' => ['description' => 'ID vai trò (đổi role = đổi position)', 'example' => 1],
            'avatar' => ['description' => 'Ảnh đại diện (file upload, tối đa 2MB)'],
        ];
    }
}
