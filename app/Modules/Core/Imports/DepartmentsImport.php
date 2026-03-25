<?php

namespace App\Modules\Core\Imports;

use App\Modules\Core\Enums\StatusEnum;
use App\Modules\Core\Models\Department;
use App\Modules\Core\Services\DepartmentService;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DepartmentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $parentSlug = $row['parent_slug'] ?? $row['parent slug'] ?? '';
        $parent = $parentSlug ? Department::where('slug', $parentSlug)->first() : null;
        $name = $row['name'] ?? $row['name_'] ?? '';
        $status = $row['status'] ?? StatusEnum::Active->value;

        return new Department([
            'name' => $name,
            'slug' => app(DepartmentService::class)->generateUniqueSlug($row['slug'] ?? Str::slug($name)),
            'description' => $row['description'] ?? null,
            'status' => in_array($status, StatusEnum::values()) ? $status : StatusEnum::Active->value,
            'parent_id' => $parent?->id,
            'sort_order' => (int) ($row['sort_order'] ?? 0),
        ]);
    }
}
