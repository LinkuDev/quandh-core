# API Department (Core)

Quản lý department (tổ chức) phân cấp theo `parent_id`: thống kê, danh sách, cây, CRUD, xóa/bulk status, đổi trạng thái, xuất/nhập Excel.

**Base path:** `/api/departments`

---

## Thống kê

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/departments/stats` |
| **Query** | `search` (name, slug), `status` (active \| inactive), `from_date` (Y-m-d), `to_date` (Y-m-d), `sort_by`, `sort_order`, `limit` (1-100). Cùng bộ lọc với index. |
| **Response** | `{ "total": 10, "active": 8, "inactive": 2 }` |

---

## Danh sách department

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/departments` |
| **Query** | `search`, `status`, `from_date`, `to_date`, `sort_by` (id \| name \| slug \| status \| created_at \| updated_at), `sort_order` (asc \| desc), `limit` (1-100). Thứ tự theo cây (treeOrder). |
| **Response** | Paginated collection (DepartmentResource), mỗi item có `creator`, `editor`, `parent`. |

---

## Danh sách department công khai

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/departments/public` |
| **Auth** | Không cần |
| **Query** | `search` (name, slug). Chỉ trả dữ liệu `active`, sắp xếp theo thứ tự cây. |
| **Response** | Collection không phân trang (DepartmentResource), phù hợp cho dropdown/chọn department. |

---

## Danh sách department công khai (dropdown tối ưu)

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/departments/public-options` |
| **Auth** | Không cần |
| **Query** | `search` (name, slug). Chỉ trả dữ liệu `active`, sắp xếp theo thứ tự cây. |
| **Response** | Collection không phân trang với 3 trường: `id`, `name`, `description`. |

---

## Cây department

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/departments/tree` |
| **Query** | `status` (active \| inactive). |
| **Response** | Mảng cây (không phân trang), mỗi node có `children` đệ quy — DepartmentTreeResource. |

---

## Chi tiết department

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/departments/{id}` |
| **UrlParam** | `id` — ID department. |
| **Response** | Object department (DepartmentResource), kèm `parent`, `children`. |

---

## Tạo department

| | |
|---|---|
| **Method** | POST |
| **Path** | `/api/departments` |
| **Body** | `name` (required), `slug` (optional, tự sinh từ name), `description` (optional), `status` (required: active \| inactive), `parent_id` (optional, null = gốc), `sort_order` (optional). |
| **Response** | 201, object department + `"message": "Department đã được tạo thành công!"`. |

---

## Cập nhật department

| | |
|---|---|
| **Method** | PUT / PATCH |
| **Path** | `/api/departments/{id}` |
| **Body** | `name`, `slug`, `description`, `status`, `parent_id` (null hoặc 0 = gốc), `sort_order`. Không được chọn department con làm department cha. |
| **Response** | Object department + `"message": "Department đã được cập nhật!"`. |

---

## Xóa department

| | |
|---|---|
| **Method** | DELETE |
| **Path** | `/api/departments/{id}` |
| **Response** | `{ "message": "Department đã được xóa!" }`. |

---

## Xóa hàng loạt

| | |
|---|---|
| **Method** | POST |
| **Path** | `/api/departments/bulk-delete` |
| **Body** | `ids` (array) — danh sách ID department. |
| **Response** | `{ "message": "Đã xóa thành công các department được chọn!" }`. |

---

## Cập nhật trạng thái hàng loạt

| | |
|---|---|
| **Method** | PATCH |
| **Path** | `/api/departments/bulk-status` |
| **Body** | `ids` (array), `status` (required: active \| inactive). |
| **Response** | `{ "message": "Cập nhật trạng thái department thành công." }`. |

---

## Đổi trạng thái department

| | |
|---|---|
| **Method** | PATCH |
| **Path** | `/api/departments/{id}/status` |
| **Body** | `status` (required: active \| inactive). |
| **Response** | `{ "message": "Cập nhật trạng thái thành công!", "data": DepartmentResource }`. |

---

## Xuất Excel

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/departments/export` |
| **Query** | Cùng bộ lọc với index: `search`, `status`, `from_date`, `to_date`, `sort_by`, `sort_order`. |
| **Response** | File `departments.xlsx`. |

---

## Nhập Excel

| | |
|---|---|
| **Method** | POST |
| **Path** | `/api/departments/import` |
| **Body** | `file` (required) — xlsx, xls, csv. Cột: name, slug, description, status. |
| **Response** | `{ "message": "Import department thành công." }`. |

---

## Response mẫu (DepartmentResource)

```json
{
  "id": 1,
  "name": "Công ty A",
  "slug": "cong-ty-a",
  "description": "Mô tả department",
  "status": "active",
  "parent_id": null,
  "sort_order": 0,
  "depth": 0,
  "created_by": "Admin",
  "updated_by": "Admin",
  "created_at": "14:30:00 17/02/2026",
  "updated_at": "14:30:00 17/02/2026"
}
```
