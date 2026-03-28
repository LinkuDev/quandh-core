# Thiết kế cấu trúc dự án

Tài liệu mô tả cấu trúc thư mục hiện tại của hệ thống theo hướng modular.

## 1) Tổng quan thư mục gốc

```text
quandh-core/
├── app/
├── bootstrap/
├── config/
├── database/
├── docs/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── artisan
├── compose.yaml
├── composer.json
├── package.json
└── phpunit.xml
```

## 2) Cấu trúc module trong `app/Modules`

```text
app/Modules/
├── Auth/
│   ├── AuthController.php
│   ├── Requests/
│   │   ├── ForgotPasswordRequest.php
│   │   ├── LoginRequest.php
│   │   ├── ResetPasswordRequest.php
│   │   └── SwitchDepartmentRequest.php
│   ├── Routes/
│   │   └── auth.php
│   └── Services/
│       ├── AuthService.php
│       └── CaslAbilityConverter.php
├── Core/
│   ├── Enums/
│   │   ├── SettingGroupEnum.php
│   │   ├── StatusEnum.php
│   │   └── UserStatusEnum.php
│   ├── Exports/
│   │   ├── LogActivitiesExport.php
│   │   ├── PermissionsExport.php
│   │   ├── RolesExport.php
│   │   └── UsersExport.php
│   ├── Imports/
│   │   ├── PermissionsImport.php
│   │   ├── RolesImport.php
│   │   └── UsersImport.php
│   ├── Middleware/
│   │   ├── LogActivity.php
│   │   └── SetPermissionsTeamId.php
│   ├── Models/
│   │   ├── LogActivity.php
│   │   ├── Organization.php
│   │   ├── Permission.php
│   │   ├── Role.php
│   │   ├── Setting.php
│   │   └── User.php
│   ├── Requests/
│   │   └── ... (Store, Update, BulkDestroy, Filter, Import, ChangeStatus...)
│   ├── Resources/
│   │   └── ... (Resource, Collection, TreeResource, PublicOptionResource)
│   ├── Routes/
│   │   ├── log_activity.php
│   │   ├── permission.php
│   │   ├── role.php
│   │   ├── setting.php
│   │   └── user.php
│   ├── Services/
│   │   ├── LogActivityService.php
│   │   ├── MediaService.php
│   │   ├── PermissionService.php
│   │   ├── RoleService.php
│   │   └── SettingService.php
│   ├── Traits/
│   │   └── RespondsWithJson.php
│   ├── LogActivityController.php
│   ├── PermissionController.php
│   ├── RoleController.php
│   └── SettingController.php
└── Schedule/
    ├── Enums/
    │   ├── NotificationChannelEnum.php
    │   ├── NotificationStatusEnum.php
    │   ├── ScheduleSessionEnum.php
    │   ├── ScheduleStatusEnum.php
    │   └── ScheduleTypeEnum.php
    ├── Exports/
    │   ├── CatalogExport.php
    │   └── SchedulesExport.php
    ├── Imports/
    │   ├── CatalogImport.php
    │   └── SchedulesImport.php
    ├── Jobs/
    │   └── ProcessScheduleNotifications.php
    ├── Models/
    │   ├── Schedule.php
    │   ├── ScheduleMeetingType.php
    │   ├── ScheduleNature.php
    │   ├── ScheduleNotification.php
    │   └── ScheduleParticipant.php
    ├── Policies/
    │   └── SchedulePolicy.php
    ├── Requests/
    │   ├── BulkDestroyCatalogRequest.php
    │   ├── BulkDestroyScheduleRequest.php
    │   ├── BulkUpdateStatusCatalogRequest.php
    │   ├── BulkUpdateStatusScheduleRequest.php
    │   ├── ChangeStatusCatalogRequest.php
    │   ├── ChangeStatusScheduleRequest.php
    │   ├── ImportCatalogRequest.php
    │   ├── ImportScheduleRequest.php
    │   ├── SortOrderScheduleRequest.php
    │   ├── StoreCatalogRequest.php
    │   ├── StoreScheduleRequest.php
    │   ├── UpdateCatalogRequest.php
    │   └── UpdateScheduleRequest.php
    ├── Resources/
    │   ├── CatalogCollection.php
    │   ├── CatalogResource.php
    │   ├── ScheduleCollection.php
    │   ├── ScheduleNotificationCollection.php
    │   ├── ScheduleNotificationResource.php
    │   └── ScheduleResource.php
    ├── Routes/
    │   ├── schedule.php
    │   ├── schedule_meeting_type.php
    │   ├── schedule_nature.php
    │   └── schedule_notification.php
    ├── Services/
    │   ├── CatalogService.php
    │   ├── ScheduleNotificationService.php
    │   └── ScheduleService.php
    ├── ScheduleController.php
    ├── ScheduleMeetingTypeController.php
    ├── ScheduleNatureController.php
    └── ScheduleNotificationController.php
```

## 3) Quy ước luồng xử lý

- `Controller`: nhận request, gọi `FormRequest` validate, điều phối `Service`, trả response chuẩn.
- `Service`: xử lý nghiệp vụ và transaction.
- `Model`: định nghĩa quan hệ + scope filter/sort.
- `Resource`: chuẩn hóa output API.
- `Routes`: tách riêng theo module và resource.
- `Policy`: phân quyền theo bản ghi (owner permission).

## 4) Vị trí tài liệu liên quan

- Tài liệu API: `docs/api`.
- Phân tích nghiệp vụ/đề xuất: `docs/answer`.
- Thiết kế cơ sở dữ liệu: `docs/DATABASE_DESIGN.md`.

## 5) Kiểm tra cập nhật tài liệu khi thay đổi kiến trúc

Khi thêm module mới hoặc thay đổi cấu trúc lớn, cần cập nhật đồng thời:

- `STRUCTURE_DESIGN.md` (file này).
- `docs/DATABASE_DESIGN.md` nếu có migration mới.
- `docs/api/*.md` và tài liệu Scribe nếu thay đổi controller/endpoint API.
