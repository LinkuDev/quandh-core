# Schedule - Thông báo lịch

## Endpoints (Protected - cần Bearer token)

| Method | Path | Mô tả |
|--------|------|-------|
| GET | `/api/schedule-notifications/unread-count` | Số thông báo chưa đọc (badge) |
| GET | `/api/schedule-notifications` | Danh sách thông báo của user hiện tại |
| PATCH | `/api/schedule-notifications/{id}/read` | Đánh dấu 1 thông báo đã đọc |
| PATCH | `/api/schedule-notifications/read-all` | Đánh dấu tất cả đã đọc |

## Response mẫu

### GET /unread-count
```json
{
  "success": true,
  "data": { "unread_count": 5 }
}
```

### GET / (danh sách)
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "schedule": {
        "id": 10,
        "content": "Họp Ban Thường vụ",
        "event_date": "01/04/2026",
        "session": "sang",
        "schedule_type": "Thường trực Thành ủy"
      },
      "channel": "website",
      "status": "sent",
      "remind_at": "07:00:00 01/04/2026",
      "sent_at": "07:00:15 01/04/2026",
      "read_at": null,
      "is_read": false
    }
  ]
}
```
