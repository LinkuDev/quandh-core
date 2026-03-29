# Schedule - Lịch công tác

## Endpoints

### Public (không cần auth)

| Method | Path | Mô tả |
|--------|------|-------|
| GET | `/api/schedules/public` | Lịch công tác công khai |

### Protected (cần Bearer token)

| Method | Path | Permission | Mô tả |
|--------|------|------------|-------|
| GET | `/api/schedules/stats` | thuong-truc-schedules.stats \| van-phong-schedules.stats | Thống kê (total, active, inactive) |
| GET | `/api/schedules` | thuong-truc-schedules.index \| van-phong-schedules.index | Danh sách (phân trang, bộ lọc thông minh) |
| GET | `/api/schedules/{id}` | thuong-truc-schedules.show \| van-phong-schedules.show | Chi tiết |
| POST | `/api/schedules` | thuong-truc-schedules.store \| van-phong-schedules.store | Tạo mới (kèm participants, notification, attachments) |
| PUT/PATCH | `/api/schedules/{id}` | thuong-truc-schedules.update \| van-phong-schedules.update | Cập nhật (Policy: owner hoặc updateAll) |
| DELETE | `/api/schedules/{id}` | thuong-truc-schedules.destroy \| van-phong-schedules.destroy | Xóa (Policy: owner hoặc destroyAll) |
| POST | `/api/schedules/bulk-delete` | thuong-truc-schedules.bulkDestroy \| van-phong-schedules.bulkDestroy | Xóa hàng loạt |
| PATCH | `/api/schedules/bulk-status` | thuong-truc-schedules.bulkUpdateStatus \| van-phong-schedules.bulkUpdateStatus | Đổi trạng thái hàng loạt |
| PATCH | `/api/schedules/{id}/status` | thuong-truc-schedules.changeStatus \| van-phong-schedules.changeStatus | Đổi trạng thái |
| GET | `/api/schedules/export` | thuong-truc-schedules.export \| van-phong-schedules.export | Xuất Excel |
| GET | `/api/schedules/export-pdf` | thuong-truc-schedules.exportPdf \| van-phong-schedules.exportPdf | Xuất PDF |
| POST | `/api/schedules/import` | thuong-truc-schedules.import \| van-phong-schedules.import | Nhập Excel |
| PATCH | `/api/schedules/{id}/move-up` | thuong-truc-schedules.reorder \| van-phong-schedules.reorder | Di chuyển lên |
| PATCH | `/api/schedules/{id}/move-down` | thuong-truc-schedules.reorder \| van-phong-schedules.reorder | Di chuyển xuống |
| PATCH | `/api/schedules/{id}/insert-above` | thuong-truc-schedules.reorder \| van-phong-schedules.reorder | Chèn phía trên (body: target_id) |
| PATCH | `/api/schedules/{id}/insert-below` | thuong-truc-schedules.reorder \| van-phong-schedules.reorder | Chèn phía dưới (body: target_id) |

## Bộ lọc index (query params)

| Param | Kiểu | Mô tả |
|-------|------|-------|
| search | string | Tìm kiếm theo nội dung |
| status | string | active, inactive |
| event_date | date | Ngày cụ thể (Y-m-d) |
| from_date | date | Từ ngày |
| to_date | date | Đến ngày |
| session | string | sang, chieu, toi |
| schedule_type | string | thuong_truc (Thường trực), van_phong (Văn phòng) |
| chairperson_id | integer | ID chủ trì |
| meeting_type | string | Loại cuộc họp |
| nature | string | Tính chất |
| position | string | Lọc theo chức danh chủ trì |
| participant_user_id | integer | Lọc theo thành phần tham dự |
| sort_by | string | sort_order, event_date, start_time, created_at |
| sort_order | string | asc, desc |
| limit | integer | Số bản ghi/trang (1-100) |

## Request body (store/update)

```json
{
  "content": "Họp Ban Thường vụ",
  "event_date": "2026-04-01",
  "session": "sang",
  "schedule_type": "thuong_truc",
  "start_time": "08:00",
  "chairperson_id": 1,
  "location": "Phòng họp A",
  "prep_unit": "Văn phòng",
  "driver_info": "Nguyễn Văn A - 30A-12345",
  "meeting_type": "hop_thuong_ky",
  "nature": "thuong",
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
    "meeting_type": "hop_thuong_ky",
    "meeting_type_label": "Họp thường kỳ",
    "nature": "thuong",
    "nature_label": "Thường",
    "schedule_type": "thuong_truc",
    "schedule_type_label": "Thường trực Thành ủy",
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
