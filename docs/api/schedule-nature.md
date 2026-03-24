# Schedule - Tính chất

## Endpoints

### Public

| Method | Path | Mô tả |
|--------|------|-------|
| GET | `/api/schedule-natures/public` | Danh sách công khai |
| GET | `/api/schedule-natures/public-options` | Dropdown (id, name, description) |

### Protected

| Method | Path | Permission | Mô tả |
|--------|------|------------|-------|
| GET | `/api/schedule-natures/stats` | schedule-natures.stats | Thống kê |
| GET | `/api/schedule-natures` | schedule-natures.index | Danh sách |
| GET | `/api/schedule-natures/{id}` | schedule-natures.show | Chi tiết |
| POST | `/api/schedule-natures` | schedule-natures.store | Tạo mới |
| PUT/PATCH | `/api/schedule-natures/{id}` | schedule-natures.update | Cập nhật |
| DELETE | `/api/schedule-natures/{id}` | schedule-natures.destroy | Xóa |
| POST | `/api/schedule-natures/bulk-delete` | schedule-natures.bulkDestroy | Xóa hàng loạt |
| PATCH | `/api/schedule-natures/bulk-status` | schedule-natures.bulkUpdateStatus | Đổi trạng thái hàng loạt |
| PATCH | `/api/schedule-natures/{id}/status` | schedule-natures.changeStatus | Đổi trạng thái |
| GET | `/api/schedule-natures/export` | schedule-natures.export | Xuất Excel |
| POST | `/api/schedule-natures/import` | schedule-natures.import | Nhập Excel |

## Request body (store)

```json
{
  "name": "Họp mật",
  "description": "Cuộc họp có tính chất bảo mật",
  "status": "active"
}
```
