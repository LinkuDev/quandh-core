# API Tổ chức (Organization) – Core

Quản lý tổ chức: thống kê, danh sách, cây, chi tiết, CRUD, xóa/bulk status, đổi trạng thái, xuất/nhập Excel. Hỗ trợ cấu trúc cây (parent_id).

**Base path:** `/api/organizations`

---

## Danh sách organization công khai

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/organizations/public` |
| **Auth** | Không (public). |
| **Query** | `search` (name, slug). |
| **Response** | Collection organization active, thứ tự theo cây. |

---

## Danh sách organization công khai cho dropdown

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/organizations/public-options` |
| **Auth** | Không (public). |
| **Query** | `search` (name, slug). |
| **Response** | Dữ liệu tối giản: id, name, description. |

---

## Thống kê

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/organizations/stats` |
| **Query** | `search`, `status` (active \| inactive), `from_date` (Y-m-d), `to_date` (Y-m-d), `sort_by`, `sort_order`, `limit`. |
| **Response** | `{ "total": 10, "active": 5, "inactive": 5 }`. |

---

## Danh sách organization

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/organizations` |
| **Query** | `search` (name, slug), `status` (active \| inactive), `from_date`, `to_date`, `sort_by` (id \| name \| slug \| status \| created_at \| updated_at), `sort_order` (asc \| desc), `limit` (1-100). |
| **Response** | Paginated collection (OrganizationResource). |

---

## Cây organization

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/organizations/tree` |
| **Query** | `status` (active \| inactive). |
| **Response** | Cây đầy đủ theo parent_id, không phân trang. |

---

## Chi tiết organization

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/organizations/{id}` |
| **UrlParam** | `id` — ID organization. |
| **Response** | Object organization (OrganizationResource) kèm parent, children. |

---

## Tạo organization

| | |
|---|---|
| **Method** | POST |
| **Path** | `/api/organizations` |
| **Body** | `name` (required), `slug` (tự sinh nếu không gửi), `description`, `status` (required: active \| inactive), `parent_id` (integer, null = gốc), `sort_order` (integer). |
| **Response** | 201, object organization + `"message": "Organization đã được tạo thành công!"`. |

---

## Cập nhật organization

| | |
|---|---|
| **Method** | PUT / PATCH |
| **Path** | `/api/organizations/{id}` |
| **Body** | `name`, `slug`, `description`, `status`, `parent_id`, `sort_order`. Không cho phép tự tham chiếu (parent_id = id). |
| **Response** | Object organization đã cập nhật. |

---

## Xóa organization

| | |
|---|---|
| **Method** | DELETE |
| **Path** | `/api/organizations/{id}` |
| **Response** | `{ "message": "Organization đã được xóa!" }`. Xóa cascade children. |

---

## Xóa hàng loạt

| | |
|---|---|
| **Method** | POST |
| **Path** | `/api/organizations/bulk-delete` |
| **Body** | `ids` (array) — danh sách ID. |
| **Response** | `{ "message": "Đã xóa thành công các organization được chọn!" }`. |

---

## Cập nhật trạng thái hàng loạt

| | |
|---|---|
| **Method** | PATCH |
| **Path** | `/api/organizations/bulk-status` |
| **Body** | `ids` (array), `status` (required: active \| inactive). |
| **Response** | `{ "message": "Cập nhật trạng thái organization thành công." }`. |

---

## Đổi trạng thái organization

| | |
|---|---|
| **Method** | PATCH |
| **Path** | `/api/organizations/{id}/status` |
| **Body** | `status` (required: active \| inactive). |
| **Response** | Object organization (OrganizationResource). |

---

## Xuất Excel

| | |
|---|---|
| **Method** | GET |
| **Path** | `/api/organizations/export` |
| **Query** | Cùng bộ lọc với index. Xuất ra: id, name, slug, description, status, parent_id, parent_slug, sort_order, depth, created_by, updated_by, created_at, updated_at. |
| **Response** | File `organizations.xlsx`. |

---

## Nhập Excel

| | |
|---|---|
| **Method** | POST |
| **Path** | `/api/organizations/import` |
| **Body** | `file` (required) — xlsx, xls, csv. Cột bắt buộc: name. Cột không bắt buộc: slug, description, status (mặc định "active"), parent_id. |
| **Response** | `{ "message": "Import organization thành công." }`. |
