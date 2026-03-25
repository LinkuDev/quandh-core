<?php

namespace App\Modules\Core\Requests;

use App\Modules\Core\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:departments,slug',
            'description' => 'nullable|string',
            'status' => ['required', StatusEnum::rule()],
            'parent_id' => 'nullable|exists:departments,id',
            'sort_order' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên department không được để trống.',
            'slug.unique' => 'Slug department đã tồn tại.',
            'status.in' => 'Trạng thái chỉ chấp nhận active, inactive.',
        ];
    }

    public function bodyParameters(): array
    {
        return [];
    }
}
