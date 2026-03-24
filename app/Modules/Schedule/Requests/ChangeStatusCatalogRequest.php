<?php

namespace App\Modules\Schedule\Requests;

use App\Modules\Schedule\Enums\ScheduleStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class ChangeStatusCatalogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', ScheduleStatusEnum::rule()],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'status' => ['description' => 'Trạng thái mới: active, inactive.', 'example' => 'inactive'],
        ];
    }
}
