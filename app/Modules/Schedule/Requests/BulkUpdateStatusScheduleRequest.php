<?php

namespace App\Modules\Schedule\Requests;

use App\Modules\Schedule\Enums\ScheduleStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateStatusScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:schedules,id',
            'status' => ['required', ScheduleStatusEnum::rule()],
        ];
    }

    public function messages(): array
    {
        return [
            'ids.required' => 'Danh sách ID không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'ids' => ['description' => 'Danh sách ID lịch', 'example' => [1, 2, 3]],
            'status' => ['description' => 'Trạng thái mới: active, inactive', 'example' => 'active'],
        ];
    }
}
