<?php

namespace App\Modules\Schedule\Requests;

use App\Modules\Schedule\Enums\ScheduleStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:65535',
            'status' => ['required', ScheduleStatusEnum::rule()],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => ['description' => 'Tên danh mục.', 'example' => 'Họp thường kỳ'],
            'description' => ['description' => 'Mô tả danh mục.'],
            'status' => ['description' => 'Trạng thái: active, inactive.', 'example' => 'active'],
        ];
    }
}
