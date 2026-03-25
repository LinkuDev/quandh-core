<?php

namespace Database\Seeders;

use App\Modules\Core\Enums\StatusEnum;
use App\Modules\Core\Models\Department;
use App\Modules\Core\Models\Permission;
use App\Modules\Core\Models\Role;
use App\Modules\Core\Models\User;
use Illuminate\Database\Seeder;

/**
 * Seed permission, role, department và phân quyền cho dự án.
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
        // Core - Departments (cấu trúc cây parent_id)
        'departments' => [
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
        $this->seedDepartments();
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

    /** Tạo departments theo cơ cấu Thành ủy. */
    protected function seedDepartments(): void
    {
        Department::firstOrCreate(
            ['slug' => 'thuong-truc-thanh-uy'],
            [
                'name' => 'Thường trực Thành ủy',
                'description' => 'Thường trực Thành ủy',
                'status' => StatusEnum::Active->value,
            ]
        );

        Department::firstOrCreate(
            ['slug' => 'van-phong-thanh-uy'],
            [
                'name' => 'Văn phòng Thành ủy',
                'description' => 'Văn phòng Thành ủy',
                'status' => StatusEnum::Active->value,
            ]
        );
    }

    /** Nhãn nhóm permission theo resource (để description). */
    protected static array $RESOURCE_LABELS = [
        'users' => 'Người dùng',
        'permissions' => 'Quyền',
        'roles' => 'Vai trò',
        'departments' => 'Đơn vị',
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

    /** Tạo các role mặc định theo nghiệp vụ Thành ủy. */
    protected function seedRoles(): void
    {
        // Role global: không gắn department_id trực tiếp trên bảng roles.
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
                ['department_id' => null]
            );
        }

        // Chuẩn hóa dữ liệu cũ nếu còn role theo department.
        Role::query()->update(['department_id' => null]);
    }

    /** Gán permission cho từng role theo nghiệp vụ Thành ủy. */
    protected function assignPermissionsToRoles(): void
    {
        $allPermissionNames = $this->getAllPermissionNames();

        // Super Admin: toàn quyền
        $superAdmin = Role::where('name', 'Super Admin')->where('guard_name', self::GUARD)->first();
        if ($superAdmin) {
            $superAdmin->syncPermissions($allPermissionNames);
        }

        // Lãnh đạo: xem lịch công tác + danh mục
        $lanhDao = Role::where('name', 'Lãnh đạo')->where('guard_name', self::GUARD)->first();
        if ($lanhDao) {
            $lanhDao->syncPermissions($this->getViewOnlyPermissionNames());
        }

        // Thư ký: quản lý lịch cho Lãnh đạo (CRUD lịch + xem danh mục)
        $thuKy = Role::where('name', 'Thư ký')->where('guard_name', self::GUARD)->first();
        if ($thuKy) {
            $thuKy->syncPermissions($this->getSecretaryPermissionNames());
        }

        // Công chức tổng hợp: điều chỉnh tất cả lịch + quản lý danh mục
        $congChucTongHop = Role::where('name', 'Công chức tổng hợp')->where('guard_name', self::GUARD)->first();
        if ($congChucTongHop) {
            $congChucTongHop->syncPermissions($this->getCoordinatorPermissionNames());
        }

        // Cán bộ công chức: CRUD lịch của mình + xem danh mục
        $canBo = Role::where('name', 'Cán bộ công chức')->where('guard_name', self::GUARD)->first();
        if ($canBo) {
            $canBo->syncPermissions($this->getOfficerPermissionNames());
        }
    }

    /**
     * Tạo user cố định để đăng nhập kiểm tra và gán role:
     * - admin@example.com => Super Admin (Thường trực Thành ủy)
     * - thuky@example.com => Thư ký (Thường trực Thành ủy)
     * - tonghop@example.com => Công chức tổng hợp (Văn phòng Thành ủy)
     * - canbo@example.com => Cán bộ công chức (Văn phòng Thành ủy)
     */
    protected function seedFixedUsersAndAssignRoles(): void
    {
        $thuongTruc = Department::where('slug', 'thuong-truc-thanh-uy')->first();
        $vanPhong = Department::where('slug', 'van-phong-thanh-uy')->first();

        if (! $thuongTruc || ! $vanPhong) {
            return;
        }

        $superAdminRole = Role::where('name', 'Super Admin')->where('guard_name', self::GUARD)->first();
        $thuKyRole = Role::where('name', 'Thư ký')->where('guard_name', self::GUARD)->first();
        $tongHopRole = Role::where('name', 'Công chức tổng hợp')->where('guard_name', self::GUARD)->first();
        $canBoRole = Role::where('name', 'Cán bộ công chức')->where('guard_name', self::GUARD)->first();

        // Super Admin — Thường trực Thành ủy
        setPermissionsTeamId($thuongTruc->id);

        $adminUser = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Quản trị viên',
                'user_name' => 'admin',
                'password' => '123123',
                'position' => 'Quản trị hệ thống',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $adminUser->forceFill(['created_by' => $adminUser->id, 'updated_by' => $adminUser->id])->save();
        if ($superAdminRole) {
            $adminUser->syncRoles([$superAdminRole]);
        }

        // Thư ký — Thường trực Thành ủy
        $thuKyUser = User::updateOrCreate(
            ['email' => 'thuky@example.com'],
            [
                'name' => 'Nguyễn Văn Thư',
                'user_name' => 'thuky',
                'password' => 'quandcore**11',
                'position' => 'Thư ký Thường trực',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $thuKyUser->forceFill(['created_by' => $adminUser->id, 'updated_by' => $adminUser->id])->save();
        if ($thuKyRole) {
            $thuKyUser->syncRoles([$thuKyRole]);
        }

        // Công chức tổng hợp — Văn phòng Thành ủy
        setPermissionsTeamId($vanPhong->id);

        $tongHopUser = User::updateOrCreate(
            ['email' => 'tonghop@example.com'],
            [
                'name' => 'Trần Thị Tổng Hợp',
                'user_name' => 'tonghop',
                'password' => 'quandcore**11',
                'position' => 'Công chức tổng hợp',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $tongHopUser->forceFill(['created_by' => $adminUser->id, 'updated_by' => $adminUser->id])->save();
        if ($tongHopRole) {
            $tongHopUser->syncRoles([$tongHopRole]);
        }

        // Cán bộ công chức — Văn phòng Thành ủy
        $canBoUser = User::updateOrCreate(
            ['email' => 'canbo@example.com'],
            [
                'name' => 'Lê Văn Cán Bộ',
                'user_name' => 'canbo',
                'password' => 'quandcore**11',
                'position' => 'Chuyên viên',
                'status' => StatusEnum::Active->value,
                'email_verified_at' => now(),
            ]
        );
        $canBoUser->forceFill(['created_by' => $adminUser->id, 'updated_by' => $adminUser->id])->save();
        if ($canBoRole) {
            $canBoUser->syncRoles([$canBoRole]);
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

    /** Permission cho Lãnh đạo: chỉ xem lịch công tác + danh mục. */
    protected function getViewOnlyPermissionNames(): array
    {
        return [
            'schedules.stats', 'schedules.index', 'schedules.show',
            'schedule-meeting-types.stats', 'schedule-meeting-types.index', 'schedule-meeting-types.show',
            'schedule-natures.stats', 'schedule-natures.index', 'schedule-natures.show',
        ];
    }

    /** Permission cho Thư ký: CRUD lịch + xem danh mục. */
    protected function getSecretaryPermissionNames(): array
    {
        return [
            'schedules.stats', 'schedules.index', 'schedules.show',
            'schedules.store', 'schedules.update', 'schedules.destroy',
            'schedules.changeStatus', 'schedules.export', 'schedules.exportPdf',
            'schedules.reorder',
            'schedule-meeting-types.stats', 'schedule-meeting-types.index', 'schedule-meeting-types.show',
            'schedule-natures.stats', 'schedule-natures.index', 'schedule-natures.show',
        ];
    }

    /** Permission cho Công chức tổng hợp: toàn quyền lịch + quản lý danh mục. */
    protected function getCoordinatorPermissionNames(): array
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

    /** Permission cho Cán bộ công chức: CRUD lịch của mình + xem danh mục. */
    protected function getOfficerPermissionNames(): array
    {
        return [
            'schedules.stats', 'schedules.index', 'schedules.show',
            'schedules.store', 'schedules.update', 'schedules.destroy',
            'schedules.changeStatus', 'schedules.export',
            'schedule-meeting-types.stats', 'schedule-meeting-types.index', 'schedule-meeting-types.show',
            'schedule-natures.stats', 'schedule-natures.index', 'schedule-natures.show',
        ];
    }
}
