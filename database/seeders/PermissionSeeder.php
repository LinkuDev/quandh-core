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
 * Khi thêm module mới hoặc thêm action (stats, index, show, store, ...) vào module,
 * bắt buộc cập nhật danh sách PERMISSIONS bên dưới cho đầy đủ, sau đó chạy lại seed.
 */
class PermissionSeeder extends Seeder
{
    /** Guard thống nhất cho Spatie (web + API Sanctum), tránh nhân đôi permission trong DB. */
    protected const GUARD = 'web';

    /**
     * Danh sách đầy đủ permission theo module và resource.
     * Định dạng: 'resource.action' — resource trùng prefix API.
     * Khi thêm module/chức năng: bổ sung vào đúng nhóm và chạy sail artisan db:seed --class=PermissionSeeder.
     */
    protected static array $PERMISSIONS = [
        // Core - Users
        'users' => [
            'stats', 'index', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'bulkUpdateStatus', 'changeStatus', 'export', 'import',
        ],
        // Core - Permissions (có description, sort_order, parent_id để nhóm frontend)
        'permissions' => [
            'stats', 'index', 'tree', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'export', 'import',
        ],
        // Core - Roles (bảng roles chuẩn Spatie, không có cột status)
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
        // Schedule - Lịch công tác
        'schedules' => [
            'stats', 'index', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'bulkUpdateStatus', 'changeStatus',
            'export', 'exportPdf', 'import', 'reorder',
            'updateAll', 'destroyAll',
        ],
        // Schedule - Loại cuộc họp
        'schedule-meeting-types' => [
            'stats', 'index', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'bulkUpdateStatus', 'changeStatus', 'export', 'import',
        ],
        // Schedule - Tính chất
        'schedule-natures' => [
            'stats', 'index', 'show', 'store', 'update', 'destroy',
            'bulkDestroy', 'bulkUpdateStatus', 'changeStatus', 'export', 'import',
        ],
    ];

    public function run(): void
    {
        $this->migrateGuardApiToWeb();
        $this->seedOrganizations();
        $this->seedPermissions();
        $this->seedRoles();
        $this->assignPermissionsToRoles();
        $this->seedFixedUsersAndAssignRoles();
    }

    /** Chuyển permission/role từ guard api sang web (một lần khi đổi chiến lược guard). */
    protected function migrateGuardApiToWeb(): void
    {
        Permission::where('guard_name', 'api')->update(['guard_name' => 'web']);
        Role::where('guard_name', 'api')->update(['guard_name' => 'web']);
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }

    /** Tạo organization mặc định. */
    protected function seedOrganizations(): void
    {
        Organization::firstOrCreate(
            ['slug' => 'default'],
            [
                'name' => 'Default',
                'description' => 'Organization mặc định của hệ thống',
                'status' => StatusEnum::Active->value,
            ]
        );
    }

    /** Nhãn nhóm permission theo resource (để description). */
    protected static array $RESOURCE_LABELS = [
        'users' => 'Người dùng',
        'permissions' => 'Quyền',
        'roles' => 'Vai trò',
        'organizations' => 'Tổ chức',
        'log-activities' => 'Nhật ký truy cập',
        'settings' => 'Cấu hình hệ thống',
        'schedules' => 'Lịch công tác',
        'schedule-meeting-types' => 'Loại cuộc họp',
        'schedule-natures' => 'Tính chất',
    ];

    /** Nhãn action (để description). */
    protected static array $ACTION_LABELS = [
        'stats' => 'Thống kê',
        'index' => 'Danh sách',
        'tree' => 'Cây',
        'show' => 'Chi tiết',
        'store' => 'Tạo mới',
        'update' => 'Cập nhật',
        'destroy' => 'Xóa',
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

    /** Tạo đầy đủ permission từ danh sách PERMISSIONS (kèm description, sort_order, parent_id). */
    protected function seedPermissions(): void
    {
        $sortOrder = 0;
        $parentIds = [];

        foreach (self::$PERMISSIONS as $resource => $actions) {
            $groupName = "group:{$resource}";
            $groupLabel = self::$RESOURCE_LABELS[$resource] ?? ucfirst($resource);
            $group = Permission::firstOrCreate(
                ['name' => $groupName, 'guard_name' => self::GUARD],
                ['name' => $groupName, 'guard_name' => self::GUARD, 'description' => $groupLabel, 'sort_order' => $sortOrder++, 'parent_id' => null]
            );
            $parentIds[$resource] = $group->id;

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

    /** Tạo các role mặc định. */
    protected function seedRoles(): void
    {
        // Role global: không gắn organization_id trực tiếp trên bảng roles.
        Role::firstOrCreate(
            ['name' => 'Super Admin', 'guard_name' => self::GUARD],
            ['organization_id' => null]
        );
        Role::firstOrCreate(
            ['name' => 'Admin', 'guard_name' => self::GUARD],
            ['organization_id' => null]
        );
        Role::firstOrCreate(
            ['name' => 'Editor', 'guard_name' => self::GUARD],
            ['organization_id' => null]
        );
        Role::firstOrCreate(
            ['name' => 'Vai trò mẫu', 'guard_name' => self::GUARD],
            ['organization_id' => null]
        );

        // Chuẩn hóa dữ liệu cũ nếu còn role theo organization.
        Role::query()->update(['organization_id' => null]);
    }

    /** Gán permission cho từng role. */
    protected function assignPermissionsToRoles(): void
    {
        $allPermissionNames = $this->getAllPermissionNames();
        $superAdmin = Role::where('name', 'Super Admin')->where('guard_name', self::GUARD)->first();
        if ($superAdmin) {
            $superAdmin->syncPermissions($allPermissionNames);
        }

        $admin = Role::where('name', 'Admin')->where('guard_name', self::GUARD)->first();
        if ($admin) {
            $admin->syncPermissions($allPermissionNames);
        }

        $editorPermissionNames = $this->getEditorPermissionNames();
        $editor = Role::where('name', 'Editor')->where('guard_name', self::GUARD)->first();
        if ($editor) {
            $editor->syncPermissions($editorPermissionNames);
        }

        $samplePermissionNames = $this->getSamplePermissionNames();
        $sampleRole = Role::where('name', 'Vai trò mẫu')->where('guard_name', self::GUARD)->first();
        if ($sampleRole) {
            $sampleRole->syncPermissions($samplePermissionNames);
        }
    }

    /**
     * Tạo user cố định để đăng nhập kiểm tra và gán role:
     * - admin@example.com => Super Admin
     * - basic@example.com => Vai trò mẫu (quyền cơ bản)
     */
    protected function seedFixedUsersAndAssignRoles(): void
    {
        $defaultOrganization = Organization::where('slug', 'default')->first();
        if (! $defaultOrganization) {
            return;
        }
        setPermissionsTeamId($defaultOrganization->id);

        $superAdmin = Role::where('name', 'Super Admin')->where('guard_name', self::GUARD)->first();
        $sampleRole = Role::where('name', 'Vai trò mẫu')->where('guard_name', self::GUARD)->first();

        $superAdminUser = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'admin',
                'user_name' => 'admin',
                'password' => 'quandcore**11',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $superAdminUser->forceFill([
            'created_by' => $superAdminUser->id,
            'updated_by' => $superAdminUser->id,
        ])->save();

        if ($superAdmin) {
            $superAdminUser->syncRoles([$superAdmin]);
        }

        $basicUser = User::updateOrCreate(
            ['email' => 'basic@example.com'],
            [
                'name' => 'basic',
                'user_name' => 'basic',
                'password' => 'quandcore**11',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $basicUser->forceFill([
            'created_by' => $superAdminUser->id,
            'updated_by' => $superAdminUser->id,
        ])->save();

        if ($sampleRole) {
            $basicUser->syncRoles([$sampleRole]);
        }
    }

    /** Lấy toàn bộ tên permission (resource.action). */
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

    /** Permission cho role Editor: quản lý lịch công tác + danh mục. */
    protected function getEditorPermissionNames(): array
    {
        $names = [];
        foreach (['schedules', 'schedule-meeting-types', 'schedule-natures'] as $resource) {
            if (isset(self::$PERMISSIONS[$resource])) {
                foreach (self::$PERMISSIONS[$resource] as $action) {
                    $names[] = "{$resource}.{$action}";
                }
            }
        }

        return $names;
    }

    /** Permission cho Vai trò mẫu: chỉ xem lịch công tác. */
    protected function getSamplePermissionNames(): array
    {
        return [
            'schedules.stats',
            'schedules.index',
            'schedules.show',
            'schedule-meeting-types.stats',
            'schedule-meeting-types.index',
            'schedule-meeting-types.show',
            'schedule-natures.stats',
            'schedule-natures.index',
            'schedule-natures.show',
        ];
    }
}
