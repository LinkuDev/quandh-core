<?php

namespace App\Modules\Core\Resources;

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
            'position' => $this->position,
            'phone' => $this->phone,
            'zalo_id' => $this->zalo_id,
            'role' => $this->currentRole(),
            'status' => $this->status,
            'created_by' => $this->creator?->name ?? 'N/A',
            'updated_by' => $this->editor?->name ?? 'N/A',
            'created_at' => $this->created_at?->format('H:i:s d/m/Y'),
            'updated_at' => $this->updated_at?->format('H:i:s d/m/Y'),
        ];
    }

    protected function currentRole(): ?array
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $modelHasRolesTable = $tableNames['model_has_roles'] ?? 'model_has_roles';
        $rolePivotKey = $columnNames['role_pivot_key'] ?? 'role_id';
        $modelMorphKey = $columnNames['model_morph_key'] ?? 'model_id';

        $row = DB::table($modelHasRolesTable)
            ->where($modelMorphKey, $this->id)
            ->where('model_type', \App\Modules\Core\Models\User::class)
            ->select($rolePivotKey.' as role_id')
            ->first();

        if (! $row) {
            return null;
        }

        $role = Role::find($row->role_id, ['id', 'name']);

        return $role ? ['id' => $role->id, 'name' => $role->name] : null;
    }
}
