<?php

namespace Database\Seeders;

use App\Modules\Core\Enums\StatusEnum;
use App\Modules\Core\Models\Organization;
use App\Modules\Core\Models\Permission;
use App\Modules\Core\Models\Role;
use App\Modules\Core\Models\User;
use Illuminate\Database\Seeder;

/**
 * Seed permission, role, organization và phân quyền cho dự án.
 *
 * Permissions tách theo module prefix:
 * - Core: users.*, permissions.*, roles.*, log-activities.*, settings.*
 * - Thường trực: thuong-truc-schedules.*
 * - Văn phòng: van-phong-schedules.* (có thêm approve)
 */
class PermissionSeeder extends Seeder
{
    protected const GUARD = 'web';

    protected Organization $defaultOrganization;

    protected static array $PERMISSIONS = [
        // Core - Users
        'users' => [
            'stats', 'index', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'bulkUpdateStatus', 'changeStatus', 'export', 'import',
        ],
        // Core - Permissions
        'permissions' => [
            'stats', 'index', 'tree', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'export', 'import',
        ],
        // Core - Roles
        'roles' => [
            'stats', 'index', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'export', 'import',
        ],
        // Core - Organizations (cấu trúc cây parent_id)
        'organizations' => [
            'stats', 'index', 'tree', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'bulkUpdateStatus', 'changeStatus', 'export', 'import',
        ],
        // Core - Nhật ký truy cập
        'log-activities' => [
            'stats', 'index', 'show', 'export', 'destroy', 'bulkDestroy',
            'destroyByDate', 'destroyAll',
        ],
        // Core - Cấu hình hệ thống
        'settings' => [
            'index', 'show', 'update',
        ],
        // Module Thường trực — Lịch công tác (tạo → active luôn)
        'thuong-truc-schedules' => [
            'stats', 'index', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'bulkUpdateStatus', 'changeStatus',
            'export', 'exportPdf', 'import', 'reorder',
            'updateAll', 'destroyAll',
        ],
        // Module Văn phòng — Lịch công tác (tạo → pending → approve)
        'van-phong-schedules' => [
            'stats', 'index', 'show', 'store', 'update', 'destroy',
            'approve',
            'bulkDestroy', 'bulkUpdateStatus', 'changeStatus',
            'export', 'exportPdf', 'import', 'reorder',
            'updateAll', 'destroyAll',
        ],
    ];

    public function run(): void
    {
        $this->migrateGuardApiToWeb();
        $this->seedDefaultOrganization();

        // Teams mode: set context trước khi assign roles/permissions
        setPermissionsTeamId($this->defaultOrganization->id);

        $this->seedPermissions();
        $this->seedRoles();
        $this->assignPermissionsToRoles();
        $this->seedFixedUsersAndAssignRoles();
    }

    protected function migrateGuardApiToWeb(): void
    {
        Permission::where('guard_name', 'api')->update(['guard_name' => 'web']);
        Role::where('guard_name', 'api')->update(['guard_name' => 'web']);
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }

    /** Tạo tổ chức mặc định (multi-tenant: mỗi tổ chức có users riêng). */
    protected function seedDefaultOrganization(): void
    {
        $this->defaultOrganization = Organization::firstOrCreate(
            ['slug' => 'default'],
            [
                'name' => 'Tổ chức mặc định',
                'description' => 'Tổ chức mặc định của hệ thống',
                'status' => StatusEnum::Active->value,
            ]
        );
    }

    protected static array $RESOURCE_LABELS = [
        'users' => 'Người dùng',
        'permissions' => 'Quyền',
        'roles' => 'Vai trò',
        'log-activities' => 'Nhật ký truy cập',
        'organizations' => 'Tổ chức',
        'settings' => 'Cấu hình hệ thống',
        'thuong-truc-schedules' => 'Thường trực - Lịch công tác',
        'van-phong-schedules' => 'Văn phòng - Lịch công tác',
    ];

    protected static array $ACTION_LABELS = [
        'stats' => 'Thống kê',
        'index' => 'Danh sách',
        'tree' => 'Cây',
        'show' => 'Chi tiết',
        'store' => 'Tạo mới',
        'update' => 'Cập nhật',
        'destroy' => 'Xóa',
        'approve' => 'Duyệt lịch',
        'bulkDestroy' => 'Xóa hàng loạt',
        'bulkUpdateStatus' => 'Cập nhật trạng thái hàng loạt',
        'changeStatus' => 'Đổi trạng thái',
        'export' => 'Xuất Excel',
        'import' => 'Nhập Excel',
        'destroyByDate' => 'Xóa theo khoảng thời gian',
        'destroyAll' => 'Xóa toàn bộ',
        'exportPdf' => 'Xuất PDF',
        'reorder' => 'Sắp xếp thứ tự',
        'updateAll' => 'Cập nhật tất cả',
    ];

    protected function seedPermissions(): void
    {
        $sortOrder = 0;

        foreach (self::$PERMISSIONS as $resource => $actions) {
            $groupName = "group:{$resource}";
            $groupLabel = self::$RESOURCE_LABELS[$resource] ?? ucfirst($resource);
            $group = Permission::firstOrCreate(
                ['name' => $groupName, 'guard_name' => self::GUARD],
                ['name' => $groupName, 'guard_name' => self::GUARD, 'description' => $groupLabel, 'sort_order' => $sortOrder++, 'parent_id' => null]
            );

            foreach ($actions as $idx => $action) {
                $name = "{$resource}.{$action}";
                $actionLabel = self::$ACTION_LABELS[$action] ?? $action;
                $desc = ($groupLabel ?? '').' - '.$actionLabel;
                Permission::updateOrCreate(
                    ['name' => $name, 'guard_name' => self::GUARD],
                    ['description' => $desc, 'sort_order' => $idx, 'parent_id' => $group->id]
                );
            }
        }

        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }

    protected function seedRoles(): void
    {
        $roles = [
            'Super Admin',
            'Lãnh đạo',
            'Thư ký',
            'Công chức tổng hợp',
            'Cán bộ công chức',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role, 'guard_name' => self::GUARD],
            );
        }
    }

    protected function assignPermissionsToRoles(): void
    {
        $allPermissionNames = $this->getAllPermissionNames();

        // Super Admin: toàn quyền
        $superAdmin = Role::where('name', 'Super Admin')->where('guard_name', self::GUARD)->first();
        if ($superAdmin) {
            $superAdmin->syncPermissions($allPermissionNames);
        }

        // Lãnh đạo: xem lịch cả 2 module
        $lanhDao = Role::where('name', 'Lãnh đạo')->where('guard_name', self::GUARD)->first();
        if ($lanhDao) {
            $lanhDao->syncPermissions([
                'thuong-truc-schedules.stats', 'thuong-truc-schedules.index', 'thuong-truc-schedules.show',
                'van-phong-schedules.stats', 'van-phong-schedules.index', 'van-phong-schedules.show',
            ]);
        }

        // Thư ký: CRUD lịch Thường trực (owner check qua Policy)
        $thuKy = Role::where('name', 'Thư ký')->where('guard_name', self::GUARD)->first();
        if ($thuKy) {
            $thuKy->syncPermissions([
                'thuong-truc-schedules.stats', 'thuong-truc-schedules.index', 'thuong-truc-schedules.show',
                'thuong-truc-schedules.store', 'thuong-truc-schedules.update', 'thuong-truc-schedules.destroy',
                'thuong-truc-schedules.changeStatus', 'thuong-truc-schedules.export', 'thuong-truc-schedules.exportPdf',
                'thuong-truc-schedules.reorder',
            ]);
        }

        // Công chức tổng hợp: toàn quyền lịch Văn phòng (bypass owner check)
        $congChucTongHop = Role::where('name', 'Công chức tổng hợp')->where('guard_name', self::GUARD)->first();
        if ($congChucTongHop) {
            $vpPermissions = [];
            foreach (self::$PERMISSIONS['van-phong-schedules'] as $action) {
                $vpPermissions[] = "van-phong-schedules.{$action}";
            }
            $congChucTongHop->syncPermissions($vpPermissions);
        }

        // Cán bộ công chức: CRUD lịch Văn phòng (owner check qua Policy, không có approve)
        $canBo = Role::where('name', 'Cán bộ công chức')->where('guard_name', self::GUARD)->first();
        if ($canBo) {
            $canBo->syncPermissions([
                'van-phong-schedules.stats', 'van-phong-schedules.index', 'van-phong-schedules.show',
                'van-phong-schedules.store', 'van-phong-schedules.update', 'van-phong-schedules.destroy',
                'van-phong-schedules.changeStatus', 'van-phong-schedules.export',
            ]);
        }
    }

    /**
     * Tạo user cố định để đăng nhập kiểm tra:
     * - admin@example.com => Super Admin
     * - thuky@example.com => Thư ký
     * - tonghop@example.com => Công chức tổng hợp
     * - canbo@example.com => Cán bộ công chức
     */
    protected function seedFixedUsersAndAssignRoles(): void
    {
        $superAdminRole = Role::where('name', 'Super Admin')->where('guard_name', self::GUARD)->first();
        $thuKyRole = Role::where('name', 'Thư ký')->where('guard_name', self::GUARD)->first();
        $tongHopRole = Role::where('name', 'Công chức tổng hợp')->where('guard_name', self::GUARD)->first();
        $canBoRole = Role::where('name', 'Cán bộ công chức')->where('guard_name', self::GUARD)->first();

        // Super Admin
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Quản trị viên',
                'user_name' => 'admin',
                'password' => '123123',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $adminUser->forceFill(['created_by' => $adminUser->id, 'updated_by' => $adminUser->id])->save();
        if ($superAdminRole) {
            $adminUser->syncRoles([$superAdminRole]);
        }

        // Thư ký
        $thuKyUser = User::updateOrCreate(
            ['email' => 'thuky@example.com'],
            [
                'name' => 'Nguyễn Văn Thư',
                'user_name' => 'thuky',
                'password' => '123123',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $thuKyUser->forceFill(['created_by' => $adminUser->id, 'updated_by' => $adminUser->id])->save();
        if ($thuKyRole) {
            $thuKyUser->syncRoles([$thuKyRole]);
        }

        // Công chức tổng hợp
        $tongHopUser = User::updateOrCreate(
            ['email' => 'tonghop@example.com'],
            [
                'name' => 'Trần Thị Tổng Hợp',
                'user_name' => 'tonghop',
                'password' => '123123',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $tongHopUser->forceFill(['created_by' => $adminUser->id, 'updated_by' => $adminUser->id])->save();
        if ($tongHopRole) {
            $tongHopUser->syncRoles([$tongHopRole]);
        }

        // Cán bộ công chức
        $canBoUser = User::updateOrCreate(
            ['email' => 'canbo@example.com'],
            [
                'name' => 'Lê Văn Cán Bộ',
                'user_name' => 'canbo',
                'password' => '123123',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $canBoUser->forceFill(['created_by' => $adminUser->id, 'updated_by' => $adminUser->id])->save();
        if ($canBoRole) {
            $canBoUser->syncRoles([$canBoRole]);
        }

    }

    protected function getAllPermissionNames(): array
    {
        $names = [];
        foreach (self::$PERMISSIONS as $resource => $actions) {
            foreach ($actions as $action) {
                $names[] = "{$resource}.{$action}";
            }
        }

        return $names;
    }
}
