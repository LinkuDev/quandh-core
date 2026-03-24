<?php

namespace App\Modules\Schedule\Requests;

use App\Modules\Schedule\Enums\ScheduleStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateStatusCatalogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer',
            'status' => ['required', ScheduleStatusEnum::rule()],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'ids' => ['description' => 'Danh sách ID.', 'example' => [1, 2, 3]],
            'status' => ['description' => 'Trạng thái mới: active, inactive.', 'example' => 'inactive'],
        ];
    }
}
