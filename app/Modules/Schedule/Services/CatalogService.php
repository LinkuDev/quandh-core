<?php

namespace App\Modules\Schedule\Services;

use App\Modules\Schedule\Enums\ScheduleStatusEnum;
use App\Modules\Schedule\Exports\CatalogExport;
use App\Modules\Schedule\Imports\CatalogImport;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CatalogService
{
    public function publicCatalog(string $modelClass, array $filters)
    {
        $model = app($modelClass);

        $publicFilters = [
            ...$filters,
            'status' => ScheduleStatusEnum::Active->value,
            'sort_by' => $filters['sort_by'] ?? 'name',
            'sort_order' => $filters['sort_order'] ?? 'asc',
        ];

        return $model->newQuery()->filter($publicFilters)->get();
    }

    public function publicOptions(string $modelClass, array $filters)
    {
        $model = app($modelClass);

        $publicFilters = [
            ...$filters,
            'status' => ScheduleStatusEnum::Active->value,
            'sort_by' => $filters['sort_by'] ?? 'name',
            'sort_order' => $filters['sort_order'] ?? 'asc',
        ];

        return $model->newQuery()
            ->select(['id', 'name', 'description'])
            ->filter($publicFilters)
            ->get();
    }

    public function stats(string $modelClass, array $filters): array
    {
        $model = app($modelClass);
        $base = $model->newQuery()->filter($filters);

        return [
            'total' => (clone $base)->count(),
            'active' => (clone $base)->where('status', ScheduleStatusEnum::Active->value)->count(),
            'inactive' => (clone $base)->where('status', ScheduleStatusEnum::Inactive->value)->count(),
        ];
    }

    public function index(string $modelClass, array $filters, int $limit)
    {
        $model = app($modelClass);

        return $model->newQuery()
            ->with(['creator', 'editor'])
            ->filter($filters)
            ->paginate($limit);
    }

    public function show(Model $model): Model
    {
        return $model->load(['creator', 'editor']);
    }

    public function store(string $modelClass, array $validated): Model
    {
        $model = app($modelClass);

        return $model->newQuery()->create($validated)->load(['creator', 'editor']);
    }

    public function update(Model $model, array $validated): Model
    {
        $model->update($validated);

        return $model->load(['creator', 'editor']);
    }

    public function destroy(Model $model): void
    {
        $model->delete();
    }

    public function bulkDestroy(string $modelClass, array $ids): void
    {
        $model = app($modelClass);
        $model->newQuery()->whereIn('id', $ids)->delete();
    }

    public function bulkUpdateStatus(string $modelClass, array $ids, string $status): void
    {
        $model = app($modelClass);
        $model->newQuery()->whereIn('id', $ids)->update(['status' => $status]);
    }

    public function changeStatus(Model $model, string $status): Model
    {
        $model->update(['status' => $status]);

        return $model->load(['creator', 'editor']);
    }

    public function export(string $modelClass, array $filters, string $fileName): BinaryFileResponse
    {
        return Excel::download(new CatalogExport($modelClass, $filters), $fileName);
    }

    public function import(string $modelClass, $file): void
    {
        Excel::import(new CatalogImport($modelClass), $file);
    }
}
