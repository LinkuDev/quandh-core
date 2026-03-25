<?php

namespace App\Modules\Core\Requests;

use App\Modules\Core\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $department = $this->route('department');
        $departmentId = is_object($department) ? $department->id : $department;

        return [
            'name' => 'sometimes|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('departments', 'slug')->ignore($departmentId)],
            'description' => 'nullable|string',
            'status' => ['nullable', StatusEnum::rule()],
            'parent_id' => [
                'nullable',
                Rule::notIn([$departmentId]),
                Rule::when($this->filled('parent_id') && (int) $this->input('parent_id') !== 0, ['exists:departments,id']),
            ],
            'sort_order' => 'nullable|integer|min:0',
        ];
    }

    public function bodyParameters(): array
    {
        return [];
    }
}
