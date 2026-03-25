<?php

namespace App\Modules\Core\Resources;

use App\Modules\Core\Models\Department;
use App\Modules\Core\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'user_name' => $this->user_name,
            'status' => $this->status,
            'created_by' => $this->creator?->name ?? 'N/A',
            'updated_by' => $this->editor?->name ?? 'N/A',
            'assignments' => $this->roleAssignments(),
            'created_at' => $this->created_at?->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at?->format('d/m/Y H:i:s'),
        ];
    }

    protected function roleAssignments(): array
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $modelHasRolesTable = $tableNames['model_has_roles'] ?? 'model_has_roles';
        $rolePivotKey = $columnNames['role_pivot_key'] ?? 'role_id';
        $modelMorphKey = $columnNames['model_morph_key'] ?? 'model_id';
        $teamForeignKey = $columnNames['team_foreign_key'] ?? 'department_id';

        $rows = DB::table($modelHasRolesTable)
            ->where($modelMorphKey, $this->id)
            ->where('model_type', \App\Modules\Core\Models\User::class)
            ->select([$teamForeignKey.' as department_id', $rolePivotKey.' as role_id'])
            ->get();

        if ($rows->isEmpty()) {
            return [];
        }

        $roleIds = $rows->pluck('role_id')->unique()->values();
        $departmentIds = $rows->pluck('department_id')->unique()->values();

        $roles = Role::whereIn('id', $roleIds)
            ->get(['id', 'name'])
            ->keyBy('id');

        $departments = Department::whereIn('id', $departmentIds)
            ->get(['id', 'name'])
            ->keyBy('id');

        return $rows
            ->groupBy('role_id')
            ->map(function ($items, $roleId) use ($roles, $departments) {
                $role = $roles->get((int) $roleId);

                return [
                    'role_id' => (int) $roleId,
                    'role_name' => $role?->name,
                    'department_ids' => $items
                        ->pluck('department_id')
                        ->map(fn ($id) => (int) $id)
                        ->unique()
                        ->values()
                        ->all(),
                    'departments' => $items
                        ->pluck('department_id')
                        ->map(fn ($id) => (int) $id)
                        ->unique()
                        ->values()
                        ->map(fn ($id) => [
                            'id' => $id,
                            'name' => $departments->get($id)?->name,
                        ])
                        ->all(),
                ];
            })
            ->values()
            ->all();
    }
}
