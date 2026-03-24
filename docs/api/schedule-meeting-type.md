# Schedule - Loại cuộc họp

## Endpoints

### Public

| Method | Path | Mô tả |
|--------|------|-------|
| GET | `/api/schedule-meeting-types/public` | Danh sách công khai |
| GET | `/api/schedule-meeting-types/public-options` | Dropdown (id, name, description) |

### Protected

| Method | Path | Permission | Mô tả |
|--------|------|------------|-------|
| GET | `/api/schedule-meeting-types/stats` | schedule-meeting-types.stats | Thống kê |
| GET | `/api/schedule-meeting-types` | schedule-meeting-types.index | Danh sách |
| GET | `/api/schedule-meeting-types/{id}` | schedule-meeting-types.show | Chi tiết |
| POST | `/api/schedule-meeting-types` | schedule-meeting-types.store | Tạo mới |
| PUT/PATCH | `/api/schedule-meeting-types/{id}` | schedule-meeting-types.update | Cập nhật |
| DELETE | `/api/schedule-meeting-types/{id}` | schedule-meeting-types.destroy | Xóa |
| POST | `/api/schedule-meeting-types/bulk-delete` | schedule-meeting-types.bulkDestroy | Xóa hàng loạt |
| PATCH | `/api/schedule-meeting-types/bulk-status` | schedule-meeting-types.bulkUpdateStatus | Đổi trạng thái hàng loạt |
| PATCH | `/api/schedule-meeting-types/{id}/status` | schedule-meeting-types.changeStatus | Đổi trạng thái |
| GET | `/api/schedule-meeting-types/export` | schedule-meeting-types.export | Xuất Excel |
| POST | `/api/schedule-meeting-types/import` | schedule-meeting-types.import | Nhập Excel |

## Request body (store)

```json
{
  "name": "Họp thường kỳ",
  "description": "Cuộc họp định kỳ hàng tuần",
  "status": "active"
}
```
