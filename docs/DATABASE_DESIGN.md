# Sơ đồ thiết kế cơ sở dữ liệu

Tài liệu mô tả chi tiết cấu trúc các bảng trong hệ thống, đồng bộ với migration Laravel.

---

## 1. Người dùng & xác thực

### `users`
Bảng người dùng (Laravel Auth).

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| name | varchar(255) | No | — | |
| email | varchar(255) | No | — | UNIQUE |
| user_name | varchar(100) | Yes | null | UNIQUE, dùng để đăng nhập cùng email |
| email_verified_at | timestamp | Yes | null | |
| password | varchar(255) | No | — | |
| remember_token | varchar(100) | Yes | null | |
| status | varchar(255) | No | 'active' | active, inactive, banned |
| position | varchar(255) | Yes | null | Chức danh (dùng để lọc lịch theo chức danh) |
| phone | varchar(20) | Yes | null | Số điện thoại (dùng cho SMS notification) |
| zalo_id | varchar(100) | Yes | null | ID Zalo (dùng cho Zalo notification) |
| created_by | bigint unsigned | Yes | null | FK → users.id |
| updated_by | bigint unsigned | Yes | null | FK → users.id |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

### `password_reset_tokens`
Token đặt lại mật khẩu.

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| email | varchar(255) | No | — | PK |
| token | varchar(255) | No | — | |
| created_at | timestamp | Yes | null | |

### `sessions`
Phiên đăng nhập (session).

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | varchar(255) | No | — | PK |
| user_id | bigint unsigned | Yes | null | INDEX |
| ip_address | varchar(45) | Yes | null | |
| user_agent | text | Yes | null | |
| payload | longtext | No | — | |
| last_activity | int | No | — | INDEX |

### `personal_access_tokens`
Token API (Sanctum): tokenable_type, tokenable_id (morphs).

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| tokenable_type | varchar(255) | No | — | Polymorphic |
| tokenable_id | bigint unsigned | No | — | Polymorphic, INDEX |
| name | text | No | — | |
| token | varchar(64) | No | — | UNIQUE |
| abilities | text | Yes | null | |
| last_used_at | timestamp | Yes | null | |
| expires_at | timestamp | Yes | null | INDEX |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

---

## 2. Cache & Queue (Laravel)

### `cache`
| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| key | varchar(255) | No | — | PK |
| value | mediumtext | No | — | |
| expiration | int | No | — | INDEX |

### `cache_locks`
| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| key | varchar(255) | No | — | PK |
| owner | varchar(255) | No | — | |
| expiration | int | No | — | INDEX |

### `jobs` / `job_batches` / `failed_jobs`
Bảng queue chuẩn Laravel. Cấu trúc mặc định.

---

## 3. Core – Permission, Role, Organization (Spatie Laravel Permission)

### `organizations`
Bảng tổ chức (dùng cho Spatie Permission teams mode). Ví dụ: "Thường trực Thành ủy", "Văn phòng Thành ủy".

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| name | varchar(255) | No | — | |
| slug | varchar(255) | Yes | null | UNIQUE |
| description | text | Yes | null | |
| status | varchar(255) | No | 'active' | active, inactive |
| parent_id | bigint unsigned | Yes | null | FK → organizations.id (cha) |
| sort_order | int unsigned | No | 0 | |
| created_by | bigint unsigned | Yes | null | FK → users.id |
| updated_by | bigint unsigned | Yes | null | FK → users.id |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

### `permissions`
Quyền (Spatie). Bổ sung description, sort_order, parent_id để nhóm frontend.

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| name | varchar(255) | No | — | UNIQUE(name, guard_name) |
| guard_name | varchar(255) | No | — | |
| description | text | Yes | null | |
| sort_order | int unsigned | No | 0 | |
| parent_id | bigint unsigned | Yes | null | FK → permissions.id |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

### `roles`
Vai trò (Spatie, teams mode).

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| organization_id | bigint unsigned | Yes | null | FK → organizations.id |
| name | varchar(255) | No | — | UNIQUE(organization_id, name, guard_name) |
| guard_name | varchar(255) | No | — | |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

### Pivot tables (Spatie)
- `model_has_permissions`: permission_id, model_type, model_id, organization_id
- `model_has_roles`: role_id, model_type, model_id, organization_id
- `role_has_permissions`: permission_id, role_id

### `log_activities`
Nhật ký truy cập.

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| description | varchar(255) | No | — | |
| user_type | varchar(255) | No | 'Guest' | |
| user_id | bigint unsigned | Yes | null | FK → users.id |
| organization_id | bigint unsigned | Yes | null | FK → organizations.id |
| route | varchar(255) | No | — | |
| method_type | varchar(255) | No | — | |
| status_code | int | No | — | |
| ip_address | varchar(255) | No | — | |
| country | varchar(255) | Yes | null | |
| user_agent | text | Yes | null | |
| request_data | json | Yes | null | |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

### `settings`
Cấu hình hệ thống (key-value).

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| key | varchar(255) | No | — | UNIQUE |
| value | text | Yes | null | |
| group | varchar(100) | No | 'general' | general, admin_page, org_select_page, social, api, email, sms, zalo, chat, log |
| is_public | boolean | No | true | |
| type | varchar(50) | No | 'string' | string, text, integer, boolean, json |
| label | varchar(255) | Yes | null | |
| sort_order | int unsigned | No | 0 | |
| created_by | bigint unsigned | Yes | null | FK → users.id |
| updated_by | bigint unsigned | Yes | null | FK → users.id |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

### `media`
Spatie Media Library (polymorphic, dùng chung).

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| model_type | varchar(255) | No | — | Polymorphic |
| model_id | bigint unsigned | No | — | Polymorphic |
| uuid | char(36) | Yes | null | UNIQUE |
| collection_name | varchar(255) | No | — | vd: `schedule-attachments` |
| name | varchar(255) | No | — | |
| file_name | varchar(255) | No | — | |
| mime_type | varchar(255) | Yes | null | |
| disk | varchar(255) | No | — | |
| conversions_disk | varchar(255) | Yes | null | |
| size | bigint unsigned | No | — | |
| manipulations | json | No | — | |
| custom_properties | json | No | — | |
| generated_conversions | json | No | — | |
| responsive_images | json | No | — | |
| order_column | int unsigned | Yes | null | INDEX |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

---

## 4. Lịch công tác (Module Schedule)

### `schedule_meeting_types`
Danh mục loại cuộc họp.

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| name | varchar(255) | No | — | |
| description | text | Yes | null | |
| status | varchar(255) | No | 'active' | active, inactive |
| created_by | bigint unsigned | Yes | null | FK → users.id |
| updated_by | bigint unsigned | Yes | null | FK → users.id |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

### `schedule_natures`
Danh mục tính chất cuộc họp. Cấu trúc giống `schedule_meeting_types`.

### `schedules`
Bảng trung tâm — lịch công tác.

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| event_date | date | No | — | Ngày diễn ra |
| session | varchar(20) | No | — | Buổi: sang, chieu, toi |
| start_time | time | Yes | null | Giờ bắt đầu |
| content | text | No | — | Nội dung lịch. FULLTEXT INDEX |
| chairperson_id | bigint unsigned | Yes | null | FK → users.id (chủ trì) |
| location | varchar(255) | Yes | null | Địa điểm |
| prep_unit | varchar(255) | Yes | null | Đơn vị chuẩn bị |
| driver_info | varchar(255) | Yes | null | Thông tin lái xe |
| meeting_type_id | bigint unsigned | Yes | null | FK → schedule_meeting_types.id |
| nature_id | bigint unsigned | Yes | null | FK → schedule_natures.id |
| color_code | varchar(20) | Yes | null | Mã màu hiển thị (#FF5733) |
| sort_order | int unsigned | No | 0 | Thứ tự trong cùng ngày+tổ chức |
| organization_id | bigint unsigned | Yes | null | FK → organizations.id (Thường trực / Văn phòng) |
| status | varchar(255) | No | 'active' | active, inactive |
| created_by | bigint unsigned | Yes | null | FK → users.id (người lập = chủ sở hữu) |
| updated_by | bigint unsigned | Yes | null | FK → users.id |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

**Index:** (event_date, organization_id), (event_date, session, organization_id), FULLTEXT(content)

**Quan hệ:**
- belongsTo: organization, chairperson, meetingType, nature, creator, editor
- hasMany: participants, notifications
- morphMany: media (collection `schedule-attachments`)

**Logic đặc biệt:**
- sort_order scoped theo (event_date, organization_id)
- Ưu tiên chức danh khi sort: Bí thư trước, Phó Bí thư sau (POSITION_PRIORITY)
- Owner permission: chỉ created_by mới sửa/xóa (trừ role có schedules.updateAll/destroyAll)

### `schedule_participants`
Thành phần tham dự (M-N giữa Schedule và User + external).

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| schedule_id | bigint unsigned | No | — | FK → schedules.id, CASCADE |
| user_id | bigint unsigned | Yes | null | FK → users.id, CASCADE (null = external) |
| external_name | varchar(255) | Yes | null | Tên thành phần bên ngoài hệ thống |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

**Logic:** Nếu user_id có giá trị → participant là user hệ thống. Nếu null + external_name → participant bên ngoài. participant_count tự đếm từ bảng này.

### `schedule_notifications`
Thông báo nhắc lịch.

| Cột | Kiểu | Nullable | Mặc định | Ràng buộc / Ghi chú |
|-----|------|----------|----------|---------------------|
| id | bigint unsigned | No | — | PK, auto increment |
| schedule_id | bigint unsigned | No | — | FK → schedules.id, CASCADE |
| user_id | bigint unsigned | No | — | FK → users.id, CASCADE (người nhận) |
| channel | varchar(20) | No | — | sms, zalo, website, app |
| remind_at | datetime | No | — | Thời gian gửi thông báo |
| status | varchar(20) | No | 'pending' | pending, sent, failed |
| sent_at | timestamp | Yes | null | Thời điểm đã gửi |
| read_at | timestamp | Yes | null | Thời điểm đã đọc (cho badge) |
| created_by | bigint unsigned | Yes | null | FK → users.id |
| created_at | timestamp | Yes | null | |
| updated_at | timestamp | Yes | null | |

**Index:** (status, remind_at), schedule_id, (user_id, read_at)

**Logic:** Tự động tạo cho tất cả participants có user_id khi lập lịch. Job `ProcessScheduleNotifications` chạy mỗi phút xử lý pending → sent.

---

## Sơ đồ quan hệ (Module Schedule)

```
organizations ──── 1-n ──► schedules
users ──┬── chairperson_id ──► schedules
        ├── created_by ──► schedules
        ├── user_id ──► schedule_participants
        └── user_id ──► schedule_notifications

schedules ──┬── 1-n ──► schedule_participants
            ├── 1-n ──► schedule_notifications
            ├── n-1 ──► schedule_meeting_types
            ├── n-1 ──► schedule_natures
            └── 1-n (polymorphic) ──► media (schedule-attachments)
```

---

*File được cập nhật theo migration trong `database/migrations/`.*
