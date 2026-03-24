<?php

namespace App\Modules\Schedule\Requests;

use App\Modules\Schedule\Enums\ScheduleStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCatalogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string|max:65535',
            'status' => ['sometimes', ScheduleStatusEnum::rule()],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => ['description' => 'Tên danh mục.'],
            'description' => ['description' => 'Mô tả danh mục.'],
            'status' => ['description' => 'Trạng thái: active, inactive.', 'example' => 'active'],
        ];
    }
}
