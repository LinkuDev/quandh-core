<?php

namespace App\Modules\Core\Services;

use App\Modules\Core\Enums\UserStatusEnum;
use App\Modules\Core\Exports\UsersExport;
use App\Modules\Core\Imports\UsersImport;
use App\Modules\Core\Models\Role;
use App\Modules\Core\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserService
{
    public function __construct(private MediaService $mediaService) {}

    public function stats(array $filters): array
    {
        $base = User::filter($filters);

        return [
            'total' => (clone $base)->count(),
            'active' => (clone $base)->where('status', UserStatusEnum::Active->value)->count(),
            'inactive' => (clone $base)->where('status', '!=', UserStatusEnum::Active->value)->count(),
        ];
    }

    public function index(array $filters, int $limit)
    {
        return User::filter($filters)->paginate($limit);
    }

    public function show(User $user): User
    {
        return $user->fresh();
    }

    public function store(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $roleId = $data['role_id'] ?? null;
            $avatar = $data['avatar'] ?? null;
            unset($data['role_id'], $data['avatar']);

            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);

            if ($roleId) {
                $this->syncRole($user, (int) $roleId);
            }

            if ($avatar) {
                $this->mediaService->uploadOne($user, $avatar, 'avatar', ['disk' => 'public']);
            }

            return $user->fresh();
        });
    }

    public function update(User $user, array $data): User
    {
        return DB::transaction(function () use ($user, $data) {
            $hasRole = array_key_exists('role_id', $data);
            $roleId = $data['role_id'] ?? null;
            $avatar = $data['avatar'] ?? null;
            unset($data['role_id'], $data['avatar']);

            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }

            $user->update($data);

            if ($hasRole) {
                $this->syncRole($user, $roleId ? (int) $roleId : null);
            }

            if ($avatar) {
                $this->mediaService->uploadOne($user, $avatar, 'avatar', ['disk' => 'public']);
            }

            return $user->fresh();
        });
    }

    public function destroy(User $user): void
    {
        $user->delete();
    }

    public function bulkDestroy(array $ids): void
    {
        User::destroy($ids);
    }

    public function bulkUpdateStatus(array $ids, string $status): void
    {
        User::whereIn('id', $ids)->update(['status' => $status]);
    }

    public function changeStatus(User $user, string $status): User
    {
        $user->update(['status' => $status]);

        return $user;
    }

    public function export(array $filters): BinaryFileResponse
    {
        return Excel::download(new UsersExport($filters), 'users.xlsx');
    }

    public function import($file): void
    {
        Excel::import(new UsersImport, $file);
    }

    /**
     * Gán role cho user (không cần team context vì teams mode đã tắt).
     */
    protected function syncRole(User $user, ?int $roleId): void
    {
        if ($roleId) {
            $role = Role::findById($roleId, 'web');
            $user->syncRoles([$role]);
        } else {
            $user->syncRoles([]);
        }
    }
}
