# CLAUDE.md - Quy tắc phát triển dự án quandh-core

## Tổng quan

Dự án **quandh-core** là hệ thống quản lý lịch công tác Thành ủy, xây dựng trên Laravel 12 (PHP 8.4) với kiến trúc module hóa (Modular Architecture).

- **Database**: MySQL (tối ưu Index và Query)
- **Môi trường**: Laravel Sail (Docker)
- **Auth**: Laravel Sanctum (Bearer token)
- **Phân quyền**: Spatie Laravel Permission (teams mode, scoped theo organization, guard `web`)
- **Media**: Spatie Laravel Media Library (qua `MediaService`, KHÔNG dùng `Storage` trực tiếp)
- **Import/Export**: Maatwebsite Excel
- **API Docs**: Knuckles Scribe (nội dung tiếng Việt)
- **Ngôn ngữ**: Tiếng Việt cho toàn bộ comment, docs, label, response message, PHPDoc

## Lệnh thường dùng

**BẮT BUỘC**: Luôn dùng `sail` thay cho `php` khi thực thi.

```bash
sail up -d                          # Khởi động Docker
sail down                           # Tắt Docker
sail artisan migrate                # Chạy migration
sail artisan db:seed                # Seed tất cả
sail artisan db:seed --class=PermissionSeeder  # Seed lại permissions
sail artisan scribe:generate        # Generate API docs
sail artisan tinker                 # REPL
sail artisan make:migration xxx     # Tạo migration mới
composer dev                        # Chạy server + queue + logs + vite đồng thời
composer test                       # Chạy test
composer setup                      # Setup dự án lần đầu
```

## Kiến trúc Module

**BẮT BUỘC**: Luôn làm việc theo cấu trúc Modular tại `/app/Modules/`. Namespace phải khớp chính xác với cấu trúc thư mục.

```
app/Modules/<ModuleName>/
├── <Resource>Controller.php         # Nhận request → gọi Service → trả response
├── Models/
│   └── <Resource>.php               # Eloquent model + scope filter() + relations
├── Services/
│   └── <Resource>Service.php        # TOÀN BỘ business logic + transaction
├── Requests/
│   ├── Store<Resource>Request.php
│   ├── Update<Resource>Request.php
│   ├── ChangeStatus<Resource>Request.php
│   ├── BulkDestroy<Resource>Request.php
│   ├── BulkUpdateStatus<Resource>Request.php
│   └── Import<Resource>Request.php
├── Resources/
│   ├── <Resource>Resource.php       # Format single item
│   └── <Resource>Collection.php     # Format paginated list
├── Exports/
│   └── <Resource>sExport.php        # FromCollection, WithHeadings
├── Imports/
│   └── <Resource>sImport.php        # ToModel, WithHeadingRow
├── Enums/
│   └── <Resource>StatusEnum.php     # values(), rule(), label()
└── Routes/
    └── <resource>.php               # Route definitions + permission middleware
```

**Modules hiện có**: Auth, Core, Schedule

## Quy ước đặt tên

| Thành phần | Quy ước | Ví dụ |
|---|---|---|
| Controller | Singular + Controller | `RoleController`, `PostCategoryController` |
| Service | `{Resource}Service` | `RoleService`, `PostService` |
| Model | Singular | `Role`, `PostCategory`, `DocumentType` |
| Table | Plural / snake_case | `roles`, `post_categories`, `document_types` |
| Table danh mục | Tiền tố module | `document_types`, `document_fields`, `post_categories` |
| Pivot table | `{module_resource}_{related}` | `post_post_category`, `document_document_type` |
| Request | `{Action}{Resource}Request` | `StoreRoleRequest`, `BulkDestroyRoleRequest` |
| Resource | `{Resource}Resource` | `RoleResource`, `UserResource` |
| Collection | `{Resource}Collection` | `RoleCollection`, `UserCollection` |
| Enum | `{Resource}StatusEnum` | `UserStatusEnum`, `StatusEnum`, `PostStatusEnum` |
| Export | `{Resources}Export` (plural) | `RolesExport`, `UsersExport` |
| Import | `{Resources}Import` (plural) | `RolesImport`, `UsersImport` |
| Permission | `{resources}.{action}` | `roles.index`, `users.store`, `posts.export` |
| Factory | `Database\Factories\Modules\{Module}\Models\{Model}Factory` | |

## Controller Pattern

Controller kế thừa `App\Http\Controllers\Controller` (đã use `RespondsWithJson` trait). Controller **CHỈ** điều phối: nhận request → validate (FormRequest) → gọi Service → trả response. **KHÔNG** đặt nghiệp vụ xử lý dữ liệu phức tạp trong Controller.

**Inject service qua constructor**:
```php
public function __construct(private RoleService $roleService) {}
```

**Các method chuẩn (11 method bắt buộc mỗi module)**:
1. `stats(FilterRequest)` → `$this->success($data)`
2. `index(FilterRequest)` → `$this->successCollection(new Collection(...))`
3. `show(Model)` → `$this->successResource(new Resource(...))`
4. `store(StoreRequest)` → `$this->successResource(new Resource(...), 'message', 201)`
5. `update(UpdateRequest, Model)` → `$this->successResource(new Resource(...), 'message')`
6. `destroy(Model)` → `$this->success(null, 'message')`
7. `bulkDestroy(BulkDestroyRequest)` → `$this->success(null, 'message')`
8. `bulkUpdateStatus(BulkUpdateStatusRequest)` → `$this->success(null, 'message')`
9. `changeStatus(ChangeStatusRequest, Model)` → `$this->successResource(new Resource(...), 'message')`
10. `export(FilterRequest)` → trả trực tiếp từ service (BinaryFileResponse)
11. `import(ImportRequest)` → `$this->success(null, 'message')`

**Method bổ sung (nếu cần)**:
- `public(FilterRequest)` → dữ liệu công khai đầy đủ (`@unauthenticated`)
- `publicOptions(FilterRequest)` → dropdown tối giản id, name, description (`@unauthenticated`)
- `tree(Request)` → dữ liệu cây (permissions, post-categories)
- `incrementView(Model)` → tăng lượt xem (posts)

### PHPDoc Scribe cho Controller (BẮT BUỘC)

```php
/**
 * @group Core - Role
 *
 * Quản lý vai trò: stats, index, show, store, update, destroy, bulk delete, export, import.
 */
class RoleController extends Controller {}
```

**Trên từng method** (BẮT BUỘC):
- Mô tả ngắn bằng tiếng Việt
- `@queryParam` cho search, status, sort_by, sort_order, limit, from_date, to_date
- `@urlParam` cho tham số đường dẫn ({user}, {id})
- `@bodyParam` cho request body (POST/PUT/PATCH)
- Action **export**: mô tả "Xuất ra các trường: id, [liệt kê], created_at, updated_at"
- Action **import**: mô tả "Cột bắt buộc: [...]. Cột không bắt buộc: [... mặc định ...]"
- Endpoint public: `@unauthenticated`
- Tham khảo style: `app/Modules/Post/PostController.php`, `app/Modules/Post/PostCategoryController.php`

## Service Pattern

**Mỗi method trong service tương ứng 1 method trong controller**. Service chứa toàn bộ business logic.

```php
class ResourceService
{
    public function stats(array $filters): array
    {
        $base = Model::filter($filters);
        return [
            'total' => (clone $base)->count(),
            'active' => (clone $base)->where('status', 'active')->count(),
            'inactive' => (clone $base)->where('status', 'inactive')->count(),
        ];
    }

    public function index(array $filters, int $limit)
    {
        return Model::with([...])->filter($filters)->paginate($limit);
    }

    public function show(Model $model): Model
    {
        return $model->load([...]);
    }

    public function store(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $model = Model::create($data);
            // sync relationships nếu cần
            return $model->load([...]);
        });
    }

    public function update(Model $model, array $data): Model
    {
        return DB::transaction(function () use ($model, $data) {
            $model->update($data);
            // sync relationships nếu cần
            return $model->load([...]);
        });
    }

    public function destroy(Model $model): void { $model->delete(); }
    public function bulkDestroy(array $ids): void { Model::whereIn('id', $ids)->delete(); }
    public function bulkUpdateStatus(array $ids, string $status): void { Model::whereIn('id', $ids)->update(['status' => $status]); }
    public function changeStatus(Model $model, string $status): Model { $model->update(['status' => $status]); return $model; }

    public function export(array $filters): BinaryFileResponse
    {
        return Excel::download(new ResourcesExport($filters), 'resources.xlsx');
    }

    public function import($file): void
    {
        Excel::import(new ResourcesImport, $file);
    }
}
```

### Quy tắc Transaction & Media

- **DB::transaction()**: Dùng cho luồng ghi có từ 2 bước phụ thuộc nhau (create + sync, update + sync). **KHÔNG** dùng cho read hoặc single-write đơn lẻ.
- **Media upload**: Luôn qua `App\Modules\Core\Services\MediaService`. KHÔNG gọi trực tiếp `addMedia()`, `Storage::put/delete`.
- **File cleanup khi lỗi**:
```php
$storedFiles = [];
try {
    return DB::transaction(function () use ($data, &$storedFiles) {
        $storedFiles = $this->mediaService->uploadMany(...);
        // ...
    });
} catch (\Throwable $e) {
    $this->cleanupStoredMediaFiles($storedFiles);
    throw $e;
}
```

**MediaService methods**: `uploadOne()`, `uploadMany()`, `removeByIds()`, `cleanupStoredFiles()`
**Collections đang dùng**: `post-attachments`, `document-attachments`

## Model Pattern

**Cột chuẩn**: `id`, `name`, `status`, `sort_order`, `created_by`, `updated_by`, `created_at`, `updated_at`

**Auto-track người tạo/sửa**:
```php
protected static function booted()
{
    static::creating(fn ($m) => $m->created_by = $m->updated_by = auth()->id());
    static::updating(fn ($m) => $m->updated_by = auth()->id());
}
```

**Scope filter bắt buộc** (mọi model đều phải có):
```php
public function scopeFilter($query, array $filters)
{
    $query->when($filters['search'] ?? null, function ($q, $search) {
        $q->where('name', 'like', '%'.$search.'%');
    })->when($filters['status'] ?? null, fn($q, $status) =>
        $q->where('status', $status)
    )->when(isset($filters['from_date']) && $filters['from_date'], fn($q) =>
        $q->whereDate('created_at', '>=', $filters['from_date'])
    )->when(isset($filters['to_date']) && $filters['to_date'], fn($q) =>
        $q->whereDate('created_at', '<=', $filters['to_date'])
    )->when($filters['sort_by'] ?? 'id', function ($q, $sortBy) use ($filters) {
        $allowed = ['id', 'name', 'created_at', 'updated_at']; // thêm trường phù hợp
        $column = in_array($sortBy, $allowed) ? $sortBy : 'id';
        $q->orderBy($column, $filters['sort_order'] ?? 'desc');
    });
}
```

**Bộ lọc index bắt buộc**: search (tên/trường chính), status, from_date, to_date, sort_by, sort_order, limit.

**Model dùng `HasFactory`** phải có factory đúng namespace: `Database\Factories\Modules\{Module}\Models\{Model}Factory`.

## Request Validation Pattern

```php
class StoreResourceRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:table,name',
            'status' => ['required', StatusEnum::rule()],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống.',
            // Tất cả message bằng tiếng Việt
        ];
    }

    // BẮT BUỘC cho Scribe docs
    public function bodyParameters(): array { return [...]; }
}
```

- **FilterRequest dùng chung** (`Core/Requests/FilterRequest`) cho: index, stats, export, public, publicOptions. Có cả `queryParameters()` và `bodyParameters()` cho Scribe.
- **Import request**: validate `file` — `required|file|mimes:xlsx,xls,csv|max:10240`
- **BẮT BUỘC**: Mọi FormRequest dùng cho API phải có `bodyParameters()`. Request chỉ dùng query thì trả `[]`.

## Resource / Collection Pattern

```php
class ResourceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'relation' => $this->whenLoaded('relation', fn() => [...]),
            'created_at' => $this->created_at?->format('H:i:s d/m/Y'),
            'updated_at' => $this->updated_at?->format('H:i:s d/m/Y'),
        ];
    }
}

class ResourceCollection extends ResourceCollection
{
    public $collects = ResourceResource::class;
}
```

**Format ngày giờ**:
- DateTime (created_at, updated_at): `H:i:s d/m/Y`
- Date only (birthday, ngay_ban_hanh): `d/m/Y`

**Dùng `whenLoaded`** cho tất cả relationship để tránh N+1.

## Route Pattern

**File route module**: `app/Modules/{Module}/Routes/{resource}.php`

### Đăng ký trong `routes/api.php`

```php
// Public routes (không auth) - ĐẶT NGOÀI group auth:sanctum
Route::get('/{resources}/public', [Controller::class, 'public'])->middleware('log.activity');
Route::get('/{resources}/public-options', [Controller::class, 'publicOptions'])->middleware('log.activity');

// Protected routes
Route::middleware(['auth:sanctum', 'set.permissions.team', 'log.activity'])->group(function () {
    Route::prefix('resources')->group(fn() => require base_path('app/Modules/.../Routes/resource.php'));
});
```

### Thứ tự route trong file module (QUAN TRỌNG - route cụ thể trước route có param)

```php
Route::get('/export', [..., 'export'])->middleware('permission:resources.export,web');
Route::post('/import', [..., 'import'])->middleware('permission:resources.import,web');
Route::post('/bulk-delete', [..., 'bulkDestroy'])->middleware('permission:resources.bulkDestroy,web');
Route::patch('/bulk-status', [..., 'bulkUpdateStatus'])->middleware('permission:resources.bulkUpdateStatus,web');
Route::get('/stats', [..., 'stats'])->middleware('permission:resources.stats,web');
Route::get('/', [..., 'index'])->middleware('permission:resources.index,web');
Route::get('/{model}', [..., 'show'])->middleware('permission:resources.show,web');
Route::post('/', [..., 'store'])->middleware('permission:resources.store,web');
Route::put('/{model}', [..., 'update'])->middleware('permission:resources.update,web');
Route::patch('/{model}', [..., 'update'])->middleware('permission:resources.update,web');
Route::delete('/{model}', [..., 'destroy'])->middleware('permission:resources.destroy,web');
Route::patch('/{model}/status', [..., 'changeStatus'])->middleware('permission:resources.changeStatus,web');
```

## Enum Pattern

```php
enum ResourceStatusEnum: string
{
    case Active = 'active';
    case Inactive = 'inactive';

    public static function values(): array { return array_column(self::cases(), 'value'); }
    public static function rule(): string { return 'in:'.implode(',', self::values()); }
    public function label(): string { return match ($this) { self::Active => 'Đang hoạt động', self::Inactive => 'Không hoạt động' }; }
}
```

## Migration Pattern

```php
Schema::create('resources', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->string('status')->default('active');
    $table->unsignedInteger('sort_order')->default(0);
    $table->foreignId('parent_id')->nullable()->constrained('resources')->nullOnDelete();
    $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
    $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
    $table->timestamps();
});
```

**Pivot table** (tiền tố module rõ ràng):
```php
Schema::create('document_document_type', function (Blueprint $table) {
    $table->id();
    $table->foreignId('document_id')->constrained()->cascadeOnDelete();
    $table->foreignId('document_type_id')->constrained()->cascadeOnDelete();
    $table->timestamps();
    $table->unique(['document_id', 'document_type_id']);
});
```

## Export / Import Pattern

### Export (BẮT BUỘC xuất đầy đủ fields giống Resource index)

```php
class ResourcesExport implements FromCollection, WithHeadings
{
    public function __construct(protected array $filters = []) {}

    public function collection()
    {
        return Model::with(['creator', 'updater'])->filter($this->filters)->get()->map(fn($m) => [
            'id' => $m->id,
            'name' => $m->name,
            'status' => $m->status,
            // Các trường quan hệ: created_by, categories, ... PHẢI CÓ
            'created_by' => $m->creator?->name,
            'updated_by' => $m->updater?->name,
            'created_at' => $m->created_at?->format('H:i:s d/m/Y'),
            'updated_at' => $m->updated_at?->format('H:i:s d/m/Y'),
        ]);
    }

    public function headings(): array { return ['ID', 'Tên', 'Trạng thái', 'Người tạo', 'Người sửa', 'Ngày tạo', 'Ngày cập nhật']; }
}
```

### Import (cột file khớp chuẩn Export)

```php
class ResourcesImport implements ToModel, WithHeadingRow
{
    public function model(array $row) { return new Model([...]); }
}
```

Validate: `file` — `required|file|mimes:xlsx,xls,csv|max:10240`

## Response Format (RespondsWithJson Trait)

```json
// Success
{ "success": true, "message": "optional", "data": {...} }

// Error
{ "success": false, "message": "Lỗi...", "errors": {...}, "code": "VALIDATION_ERROR" }
```

| Method | Dùng cho | Status |
|---|---|---|
| `success($data, $message)` | stats, destroy, bulk, import | 200 |
| `successResource(Resource, $message, $code)` | show, store(201), update, changeStatus | 200/201 |
| `successCollection(Collection, $message)` | index, tree | 200 |
| `error($message, $code, $errors, $errorCode)` | lỗi chung | 4xx |
| `unauthorized()` / `forbidden()` / `notFound()` / `conflict()` | shortcuts | 401/403/404/409 |

**Error codes**: `VALIDATION_ERROR`, `UNAUTHORIZED`, `FORBIDDEN`, `NOT_FOUND`, `CONFLICT`

## Phân quyền (Permission System)

- Spatie Permission với **Teams mode ON** (scoped theo organization)
- Guard: `web` (dùng chung cho web và API Sanctum)
- `team_foreign_key`: `organization_id` — user truy cập org nào thì có role/permission trong org đó (qua pivot tables)
- Format: `{resource}.{action}` — resource trùng prefix API
- Middleware trên route: `permission:{resource}.{action},web`

### Flow kiểm tra quyền

```
Request → auth:sanctum → set.permissions.team → log.activity → permission:{resource}.{action},web → Controller
```

**Middleware `set.permissions.team`**:
1. Đồng bộ user sang guard web (Spatie dùng chung)
2. Đọc header `X-Organization-Id` → nếu không có → throw ValidationException (bắt buộc header)
3. Check organization tồn tại + active
4. Check user có role/permission trong org đó (query `model_has_roles` + `model_has_permissions`)
5. `setPermissionsTeamId(organizationId)`

### CASL Ability Converter (cho Frontend)

```
Permission "posts.index" → { action: "index", subject: "Post" }
Permission "post-categories.tree" → { action: "tree", subject: "PostCategory" }
```

Quy tắc: resource name → PascalCase (bỏ dấu gạch, viết hoa chữ đầu)

### Khi thêm module mới → Cập nhật PermissionSeeder

```php
// database/seeders/PermissionSeeder.php
'schedules' => ['stats', 'index', 'show', 'store', 'update', 'destroy', 'bulkDestroy', 'bulkUpdateStatus', 'changeStatus', 'export', 'import'],
```

Sau đó: `sail artisan db:seed --class=PermissionSeeder`

## Public Catalog APIs

- **BẮT BUỘC** với danh mục dùng cho form/dropdown: có endpoint public riêng, không auth
- `GET /api/{resource}/public` — dữ liệu công khai đầy đủ
- `GET /api/{resource}/public-options` — tối giản: chỉ select `id`, `name`, `description`, lọc `status=active`, sort `name asc`
- Dùng `App\Modules\Core\Resources\PublicOptionResource` cho dropdown
- Endpoint public PHẢI có `@unauthenticated` trong PHPDoc (nếu không Scribe sẽ hiển thị sai)

## Scribe API Documentation

- Config: `config/scribe.php` với `auth.enabled=true`, `auth.default=true`
- Generate: `sail artisan scribe:generate`
- Xem tại: `http://localhost:8000/docs`
- Sau khi chỉnh route/controller/request → chạy generate lại và kiểm tra `.scribe/endpoints/*.yaml`

## LogActivity Middleware

Khi thêm resource/action mới, **BẮT BUỘC** cập nhật `app/Modules/Core/Middleware/LogActivity.php`:
- `resourceLabel()` — thêm label tiếng Việt cho resource mới
- `actionLabels` — thêm label cho action mới
- `pathActions` — mapping path → action
- Route params

**Resource labels hiện có**: users=người dùng, posts=bài viết, post-categories=danh mục bài viết, permissions=quyền, roles=vai trò, documents=văn bản, document-types=loại văn bản, issuing-agencies=cơ quan ban hành, issuing-levels=cấp ban hành, document-signers=người ký, document-fields=lĩnh vực, settings=cấu hình hệ thống, log-activities=nhật ký truy cập, schedules=lịch công tác, schedule-notifications=thông báo lịch

## Tài liệu & Thiết kế

Khi có thay đổi:
- **BẮT BUỘC**: Cập nhật `DATABASE_DESIGN.md` khi có Migration mới
- **BẮT BUỘC**: Cập nhật `STRUCTURE_DESIGN.md` khi có file/thư mục mới
- **BẮT BUỘC**: Cập nhật `/docs/api/` khi tạo/cập nhật Controller
- Lưu phân tích, giải thích kiến trúc vào `/docs/answer/`

## User demo để test

```
admin@example.com / 123123        → Super Admin (toàn quyền)
thuky@example.com / 123123        → Thư ký (lập lịch Thường trực cho Lãnh đạo)
tonghop@example.com / 123123      → Công chức tổng hợp (điều chỉnh tất cả lịch Văn phòng)
canbo@example.com / 123123        → Cán bộ công chức (lập lịch Văn phòng của mình)
```

## Checklist khi thêm Module mới

1. [ ] Tạo migration + model (fillable, casts, relations, scope filter, booted auto-track)
2. [ ] Tạo Enum status (values, rule, label tiếng Việt)
3. [ ] Tạo Service (11 methods chuẩn + DB::transaction cho multi-step writes)
4. [ ] Tạo Controller (validate → service → response chuẩn RespondsWithJson + PHPDoc Scribe đầy đủ)
5. [ ] Tạo FormRequests (Store, Update, ChangeStatus, BulkDestroy, BulkUpdateStatus, Import) + bodyParameters()
6. [ ] Tạo Resource + Collection (format date: H:i:s d/m/Y, whenLoaded cho relations)
7. [ ] Tạo Export (FromCollection, WithHeadings, fields giống Resource, có trường quan hệ)
8. [ ] Tạo Import (ToModel, WithHeadingRow, cột khớp chuẩn Export)
9. [ ] Tạo Routes (middleware permission:{resource}.{action},web, thứ tự đúng)
10. [ ] Đăng ký routes trong routes/api.php (public ngoài auth, protected trong group)
11. [ ] Thêm permissions vào PermissionSeeder → `sail artisan db:seed --class=PermissionSeeder`
12. [ ] Cập nhật LogActivity middleware (resourceLabel, actionLabels, pathActions, route params)
13. [ ] Thêm PHPDoc Scribe đầy đủ → `sail artisan scribe:generate`
14. [ ] Cập nhật DATABASE_DESIGN.md
15. [ ] Cập nhật STRUCTURE_DESIGN.md
16. [ ] Public endpoints nếu cần (public, publicOptions + @unauthenticated)
17. [ ] Tạo Factory đúng namespace cho Scribe model examples

## Checklist review PR (Service & Transaction)

- [ ] Controller không chứa nghiệp vụ phức tạp; chỉ validate → gọi service → trả response
- [ ] Mỗi endpoint nghiệp vụ có method tương ứng trong Service
- [ ] Luồng ghi nhiều bước đã được bọc `DB::transaction()`
- [ ] Không lạm dụng transaction cho read/single-write đơn giản
- [ ] Luồng có thao tác file trong transaction có cơ chế cleanup khi lỗi
- [ ] Upload media sử dụng `Core\Services\MediaService`, không xử lý file trực tiếp
- [ ] Response format và HTTP status code đúng chuẩn
