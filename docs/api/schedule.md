# Schedule - Lịch công tác

## Endpoints

### Public (không cần auth)

| Method | Path | Mô tả |
|--------|------|-------|
| GET | `/api/schedules/public` | Lịch công tác công khai |

### Protected (cần Bearer token + X-Department-Id)

| Method | Path | Permission | Mô tả |
|--------|------|------------|-------|
| GET | `/api/schedules/stats` | schedules.stats | Thống kê (total, active, inactive) |
| GET | `/api/schedules` | schedules.index | Danh sách (phân trang, bộ lọc thông minh) |
| GET | `/api/schedules/{id}` | schedules.show | Chi tiết |
| POST | `/api/schedules` | schedules.store | Tạo mới (kèm participants, notification, attachments) |
| PUT/PATCH | `/api/schedules/{id}` | schedules.update | Cập nhật (Policy: owner hoặc updateAll) |
| DELETE | `/api/schedules/{id}` | schedules.destroy | Xóa (Policy: owner hoặc destroyAll) |
| POST | `/api/schedules/bulk-delete` | schedules.bulkDestroy | Xóa hàng loạt |
| PATCH | `/api/schedules/bulk-status` | schedules.bulkUpdateStatus | Đổi trạng thái hàng loạt |
| PATCH | `/api/schedules/{id}/status` | schedules.changeStatus | Đổi trạng thái |
| GET | `/api/schedules/export` | schedules.export | Xuất Excel |
| GET | `/api/schedules/export-pdf` | schedules.exportPdf | Xuất PDF |
| POST | `/api/schedules/import` | schedules.import | Nhập Excel |
| PATCH | `/api/schedules/{id}/move-up` | schedules.reorder | Di chuyển lên |
| PATCH | `/api/schedules/{id}/move-down` | schedules.reorder | Di chuyển xuống |
| PATCH | `/api/schedules/{id}/insert-above` | schedules.reorder | Chèn phía trên (body: target_id) |
| PATCH | `/api/schedules/{id}/insert-below` | schedules.reorder | Chèn phía dưới (body: target_id) |

## Bộ lọc index (query params)

| Param | Kiểu | Mô tả |
|-------|------|-------|
| search | string | Tìm kiếm theo nội dung |
| status | string | active, inactive |
| event_date | date | Ngày cụ thể (Y-m-d) |
| from_date | date | Từ ngày |
| to_date | date | Đến ngày |
| session | string | sang, chieu, toi |
| department_id | integer | ID tổ chức |
| chairperson_id | integer | ID chủ trì |
| meeting_type_id | integer | ID loại cuộc họp |
| nature_id | integer | ID tính chất |
| position | string | Lọc theo chức danh chủ trì |
| participant_user_id | integer | Lọc theo thành phần tham dự |
| sort_by | string | sort_order, event_date, start_time, created_at |
| sort_dir | string | asc, desc |
| limit | integer | Số bản ghi/trang (1-100) |

## Request body (store/update)

```json
{
  "content": "Họp Ban Thường vụ",
  "event_date": "2026-04-01",
  "session": "sang",
  "department_id": 1,
  "start_time": "08:00",
  "chairperson_id": 1,
  "location": "Phòng họp A",
  "prep_unit": "Văn phòng",
  "driver_info": "Nguyễn Văn A - 30A-12345",
  "meeting_type_id": 1,
  "nature_id": 1,
  "color_code": "#FF5733",
  "participants": [
    { "user_id": 2 },
    { "external_name": "Nguyễn Văn B (Sở Nội vụ)" }
  ],
  "notification": {
    "channel": "website",
    "remind_at": "2026-04-01 07:00:00"
  },
  "attachments": ["(file uploads)"]
}
```

## Response mẫu (show)

```json
{
  "success": true,
  "data": {
    "id": 1,
    "event_date": "01/04/2026",
    "session": "sang",
    "start_time": "08:00",
    "content": "Họp Ban Thường vụ",
    "chairperson": { "id": 1, "name": "Admin", "position": "Bí thư" },
    "meeting_type": { "id": 1, "name": "Họp thường kỳ" },
    "nature": { "id": 1, "name": "Thường" },
    "department": { "id": 1, "name": "Thường trực Thành ủy" },
    "participant_count": 3,
    "participants": [
      { "id": 1, "user_id": 2, "user_name": "Trần Văn C", "external_name": null },
      { "id": 2, "user_id": null, "user_name": null, "external_name": "Nguyễn Văn B" }
    ],
    "notifications": [
      { "id": 1, "user_id": 2, "channel": "website", "remind_at": "07:00:00 01/04/2026", "status": "pending" }
    ],
    "attachments": [
      { "id": 1, "name": "file.pdf", "url": "http://..." }
    ],
    "created_by": "Admin",
    "created_at": "10:30:00 24/03/2026"
  }
}
```
