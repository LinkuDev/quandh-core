<?php

namespace App\Modules\Auth\Services;

use App\Modules\Core\Enums\UserStatusEnum;
use App\Modules\Core\Models\User;
use App\Modules\Core\Resources\UserResource;
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
        $rolesAndPermissions = $this->getRolesAndPermissions($user);

        return [
            'ok' => true,
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => (new UserResource($user))->resolve(),
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

    public function me(User $user): array
    {
        $rolesAndPermissions = $this->getRolesAndPermissions($user);

        return [
            'user' => (new UserResource($user))->resolve(),
            'roles' => $rolesAndPermissions['roles'],
            'permissions' => $rolesAndPermissions['permissions'],
            'abilities' => $rolesAndPermissions['abilities'],
        ];
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

    /**
     * Lấy roles và permissions của user (global, không phân biệt team).
     */
    protected function getRolesAndPermissions(User $user): array
    {
        $user->unsetRelation('roles');
        $user->unsetRelation('permissions');

        $permissions = $user->getAllPermissions()->pluck('name')->values()->unique()->all();

        return [
            'roles' => $user->getRoleNames()->values()->all(),
            'permissions' => $permissions,
            'abilities' => CaslAbilityConverter::toCaslAbilities($permissions),
        ];
    }
}
