<?php

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SwitchDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'department_id' => 'required|integer|exists:departments,id',
        ];
    }

    public function messages(): array
    {
        return [
            'department_id.required' => 'Tổ chức là bắt buộc.',
            'department_id.integer' => 'ID đơn vị phải là số nguyên.',
            'department_id.exists' => 'Tổ chức không tồn tại.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'department_id' => [
                'description' => 'ID đơn vị muốn chuyển ngữ cảnh làm việc',
                'example' => 2,
            ],
        ];
    }
}
