<?php

namespace App\Modules\Schedule\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'File không được để trống.',
            'file.mimes' => 'File phải có định dạng xlsx, xls hoặc csv.',
            'file.max' => 'File không được vượt quá 10MB.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'file' => ['description' => 'File Excel (xlsx, xls, csv)', 'example' => 'schedules.xlsx'],
        ];
    }
}
