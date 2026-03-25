<?php

namespace App\Modules\Auth\Services;

use App\Modules\Core\Enums\UserStatusEnum;
use App\Modules\Core\Models\Department;
use App\Modules\Core\Models\User;
use App\Modules\Core\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthService
{
    public function login(string $login, string $password): array
    {
        $user = User::where('email', $login)
            ->orWhere('user_name', $login)
            ->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            return [
                'ok' => false,
                'type' => 'unauthorized',
                'message' => 'Thông tin đăng nhập không chính xác',
            ];
        }

        if ($user->status !== UserStatusEnum::Active->value) {
            return [
                'ok' => false,
                'type' => 'forbidden',
                'message' => 'Tài khoản của bạn đã bị khóa',
            ];
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $departments = $this->getAccessibleDepartments($user);
        $currentDepartment = $departments[0] ?? null;
        $currentDepartmentId = $currentDepartment['id'] ?? null;
        $rolesAndPermissions = $this->getRolesAndPermissionsForDepartment($user, $currentDepartmentId);

        return [
            'ok' => true,
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => (new UserResource($user))->resolve(),
                'available_departments' => $departments,
                'current_department_id' => $currentDepartmentId,
                'roles' => $rolesAndPermissions['roles'],
                'permissions' => $rolesAndPermissions['permissions'],
                'abilities' => $rolesAndPermissions['abilities'],
            ],
        ];
    }

    public function logout($user): void
    {
        $user->currentAccessToken()->delete();
    }

    public function forgotPassword(string $email): bool
    {
        return Password::sendResetLink(['email' => $email]) === Password::RESET_LINK_SENT;
    }

    public function resetPassword(string $email, string $password, string $token): bool
    {
        $status = Password::reset(
            ['email' => $email, 'password' => $password, 'token' => $token],
            function (User $user, string $newPassword) {
                $user->forceFill(['password' => Hash::make($newPassword)])->save();
            }
        );

        return $status === Password::PASSWORD_RESET;
    }

    public function switchDepartment(User $user, int $departmentId): array
    {
        $department = Department::query()
            ->whereKey($departmentId)
            ->where('status', 'active')
            ->first();

        if (! $department) {
            return [
                'ok' => false,
                'type' => 'forbidden',
                'message' => 'Tổ chức không hợp lệ hoặc đã ngừng hoạt động.',
            ];
        }

        if (! $this->hasDepartmentAccess((int) $user->id, (int) $department->id)) {
            return [
                'ok' => false,
                'type' => 'forbidden',
                'message' => 'Bạn không có quyền truy cập đơn vị đã chọn.',
            ];
        }

        $rolesAndPermissions = $this->getRolesAndPermissionsForDepartment($user, (int) $department->id);

        return [
            'ok' => true,
            'data' => [
                'current_department_id' => (int) $department->id,
                'current_department' => [
                    'id' => (int) $department->id,
                    'name' => $department->name,
                    'description' => $department->description,
                ],
                'roles' => $rolesAndPermissions['roles'],
                'permissions' => $rolesAndPermissions['permissions'],
                'abilities' => $rolesAndPermissions['abilities'],
            ],
        ];
    }

    protected function getAccessibleDepartments(User $user): array
    {
        $departmentIds = $this->getAccessibleDepartmentIds((int) $user->id);
        if (empty($departmentIds)) {
            return [];
        }

        return Department::query()
            ->whereIn('id', $departmentIds)
            ->where('status', 'active')
            ->orderBy('name')
            ->get(['id', 'name', 'description'])
            ->map(fn (Department $department) => [
                'id' => (int) $department->id,
                'name' => $department->name,
                'description' => $department->description,
            ])
            ->values()
            ->all();
    }

    protected function getAccessibleDepartmentIds(int $userId): array
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $modelMorphKey = $columnNames['model_morph_key'] ?? 'model_id';
        $teamForeignKey = $columnNames['team_foreign_key'] ?? 'department_id';
        $modelType = \App\Modules\Core\Models\User::class;

        $roleOrgIds = DB::table($tableNames['model_has_roles'] ?? 'model_has_roles')
            ->where($modelMorphKey, $userId)
            ->where('model_type', $modelType)
            ->whereNotNull($teamForeignKey)
            ->pluck($teamForeignKey)
            ->map(fn ($id) => (int) $id)
            ->all();

        $permissionOrgIds = DB::table($tableNames['model_has_permissions'] ?? 'model_has_permissions')
            ->where($modelMorphKey, $userId)
            ->where('model_type', $modelType)
            ->whereNotNull($teamForeignKey)
            ->pluck($teamForeignKey)
            ->map(fn ($id) => (int) $id)
            ->all();

        return array_values(array_unique(array_merge($roleOrgIds, $permissionOrgIds)));
    }

    protected function hasDepartmentAccess(int $userId, int $departmentId): bool
    {
        return in_array($departmentId, $this->getAccessibleDepartmentIds($userId), true);
    }

    /**
     * Lấy danh sách vai trò và quyền hạn của user trong đơn vị, dùng cho Vue Casl.
     */
    protected function getRolesAndPermissionsForDepartment(User $user, ?int $departmentId): array
    {
        if ($departmentId === null) {
            return ['roles' => [], 'permissions' => [], 'abilities' => []];
        }

        setPermissionsTeamId($departmentId);
        $user->unsetRelation('roles');
        $user->unsetRelation('permissions');

        // getAllPermissions() = direct + từ vai trò; getPermissionNames() chỉ direct
        $permissions = $user->getAllPermissions()->pluck('name')->values()->unique()->all();

        return [
            'roles' => $user->getRoleNames()->values()->all(),
            'permissions' => $permissions,
            'abilities' => CaslAbilityConverter::toCaslAbilities($permissions),
        ];
    }
}
