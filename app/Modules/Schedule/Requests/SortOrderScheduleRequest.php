<?php

namespace App\Modules\Schedule\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortOrderScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'target_id' => 'required|integer|exists:schedules,id',
        ];
    }

    public function messages(): array
    {
        return [
            'target_id.required' => 'ID lịch đích không được để trống.',
            'target_id.exists' => 'Lịch đích không tồn tại.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'target_id' => ['description' => 'ID lịch đích để chèn trên/dưới', 'example' => 5],
        ];
    }
}
