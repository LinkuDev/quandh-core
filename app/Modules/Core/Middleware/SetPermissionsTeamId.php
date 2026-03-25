<?php

namespace App\Modules\Core\Middleware;

use App\Modules\Core\Models\Department;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sau auth:sanctum: đồng bộ user sang guard web (Spatie dùng chung guard web cho API),
 * và đặt department_id cho Spatie Permission (tính năng teams).
 */
class SetPermissionsTeamId
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            Auth::guard('web')->setUser($user);

            $departmentId = $this->resolveRequestedDepartmentId($request);

            if ($departmentId === null) {
                throw ValidationException::withMessages([
                    'department_id' => ['Vui lòng gửi header X-Department-Id để xác định đơn vị làm việc.'],
                ]);
            }

            $department = Department::query()
                ->whereKey($departmentId)
                ->where('status', 'active')
                ->first();

            if (! $department) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tổ chức không hợp lệ hoặc đã ngừng hoạt động.',
                    'code' => 'FORBIDDEN',
                ], 403);
            }

            if (! $this->userHasDepartmentAccess((int) $user->id, (int) $department->id)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn không có quyền truy cập đơn vị đã chọn.',
                    'code' => 'FORBIDDEN',
                ], 403);
            }

            setPermissionsTeamId((int) $department->id);
        }

        return $next($request);
    }

    protected function resolveRequestedDepartmentId(Request $request): ?int
    {
        $value = $request->header('X-Department-Id')
            ?? $request->header('x-department-id');

        if ($value === null || $value === '') {
            return null;
        }

        if (! is_numeric($value)) {
            return null;
        }

        return (int) $value;
    }

    protected function userHasDepartmentAccess(int $userId, int $departmentId): bool
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $modelMorphKey = $columnNames['model_morph_key'] ?? 'model_id';
        $teamForeignKey = $columnNames['team_foreign_key'] ?? 'department_id';
        $modelHasRolesTable = $tableNames['model_has_roles'] ?? 'model_has_roles';
        $modelHasPermissionsTable = $tableNames['model_has_permissions'] ?? 'model_has_permissions';
        $modelType = \App\Modules\Core\Models\User::class;

        $hasRole = DB::table($modelHasRolesTable)
            ->where($modelMorphKey, $userId)
            ->where('model_type', $modelType)
            ->where($teamForeignKey, $departmentId)
            ->exists();

        if ($hasRole) {
            return true;
        }

        return DB::table($modelHasPermissionsTable)
            ->where($modelMorphKey, $userId)
            ->where('model_type', $modelType)
            ->where($teamForeignKey, $departmentId)
            ->exists();
    }
}
