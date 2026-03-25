<?php

namespace App\Modules\Core\Services;

use App\Modules\Core\Enums\StatusEnum;
use App\Modules\Core\Exports\DepartmentsExport;
use App\Modules\Core\Imports\DepartmentsImport;
use App\Modules\Core\Models\Department;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DepartmentService
{
    public function publicList(array $filters = []): Collection
    {
        $publicFilters = [
            ...$filters,
            'status' => StatusEnum::Active->value,
            'sort_by' => 'sort_order',
            'sort_order' => 'asc',
        ];

        return $this->getFlatTreeOrdered($publicFilters);
    }

    public function publicOptions(array $filters = []): Collection
    {
        $publicFilters = [
            ...$filters,
            'status' => StatusEnum::Active->value,
            'sort_by' => 'sort_order',
            'sort_order' => 'asc',
        ];

        return Department::query()
            ->select(['id', 'name', 'description'])
            ->filter($publicFilters)
            ->treeOrder()
            ->get();
    }

    public function stats(array $filters): array
    {
        $base = Department::filter($filters);

        return [
            'total' => (clone $base)->count(),
            'active' => (clone $base)->where('status', StatusEnum::Active->value)->count(),
            'inactive' => (clone $base)->where('status', '!=', StatusEnum::Active->value)->count(),
        ];
    }

    public function index(array $filters, int $limit)
    {
        return Department::with(['creator', 'editor', 'parent'])
            ->filter($filters)
            ->treeOrder()
            ->paginate($limit);
    }

    public function tree(?string $status)
    {
        $query = Department::query()
            ->when($status, fn ($q, $value) => $q->where('status', $value));
        $items = $query->orderBy('sort_order')->orderBy('id')->get();

        return $this->buildTree($items);
    }

    public function show(Department $department): Department
    {
        return $department->load(['creator', 'editor', 'parent', 'children' => fn ($q) => $q->orderBy('sort_order')]);
    }

    public function store(array $data): Department
    {
        return Department::create($data);
    }

    public function update(Department $department, array $data): array
    {
        if (isset($data['parent_id']) && (int) $data['parent_id'] !== 0) {
            if ($this->isDescendantOf((int) $data['parent_id'], $department->id)) {
                return [
                    'ok' => false,
                    'message' => 'Không thể chọn department con làm department cha.',
                    'code' => 422,
                    'error_code' => 'CONFLICT',
                ];
            }
        }

        if (array_key_exists('parent_id', $data) && (int) $data['parent_id'] === 0) {
            $data['parent_id'] = null;
        }

        $department->update($data);

        return [
            'ok' => true,
            'department' => $department->fresh(['parent', 'children']),
        ];
    }

    public function destroy(Department $department): void
    {
        $department->delete();
    }

    public function bulkDestroy(array $ids): void
    {
        Department::whereIn('id', $ids)->delete();
    }

    public function bulkUpdateStatus(array $ids, string $status): void
    {
        Department::whereIn('id', $ids)->update(['status' => $status]);
    }

    public function changeStatus(Department $department, string $status): Department
    {
        $department->update(['status' => $status]);

        return $department->load(['parent', 'children']);
    }

    public function export(array $filters): BinaryFileResponse
    {
        return Excel::download(new DepartmentsExport($filters), 'departments.xlsx');
    }

    public function import($file): void
    {
        Excel::import(new DepartmentsImport, $file);
    }

    public function getFlatTreeOrdered(array $filters = []): Collection
    {
        $all = Department::with(['creator', 'editor'])->filter($filters)->get();
        $tree = $this->buildTree($all);
        $result = collect();
        $flatten = function ($nodes) use (&$flatten, &$result) {
            foreach ($nodes as $node) {
                $result->push($node);
                $flatten($node->children);
            }
        };
        $flatten($tree);

        return $result;
    }

    public function getDepth(Department $department): int
    {
        $depth = 0;
        $parentId = $department->parent_id;
        $ids = [$department->id];

        while ($parentId) {
            if (in_array($parentId, $ids)) {
                break;
            }

            $ids[] = $parentId;
            $parent = Department::find($parentId);
            $parentId = $parent ? $parent->parent_id : null;
            $depth++;
        }

        return $depth;
    }

    public function generateUniqueSlug(string $base, ?int $excludeId = null): string
    {
        $slug = $base;
        $query = Department::where('slug', $slug);
        if ($excludeId !== null) {
            $query->where('id', '!=', $excludeId);
        }

        $index = 0;
        while ($query->exists()) {
            $slug = $base.'-'.(++$index);
            $query = Department::where('slug', $slug);
            if ($excludeId !== null) {
                $query->where('id', '!=', $excludeId);
            }
        }

        return $slug;
    }

    public function buildTree(Collection $items): Collection
    {
        $grouped = $items->groupBy('parent_id');
        $builder = function ($parentId) use ($grouped, &$builder) {
            return ($grouped->get($parentId) ?? collect())
                ->map(function ($node) use (&$builder) {
                    $node->setRelation('children', $builder($node->id));

                    return $node;
                })
                ->values();
        };

        return $builder(null);
    }

    private function isDescendantOf(int $candidateId, int $id): bool
    {
        $current = Department::find($id);

        while ($current && $current->parent_id) {
            if ($current->parent_id === $candidateId) {
                return true;
            }

            $current = Department::find($current->parent_id);
        }

        return false;
    }
}
