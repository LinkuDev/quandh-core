<?php

namespace App\Modules\Core\Models;

use App\Modules\Core\Services\DepartmentService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Model Department – đơn vị (Thường trực Thành ủy, Văn phòng Thành ủy, ...). Dùng cho Spatie Permission teams.
 */
class Department extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Database\Factories\Modules\Core\Models\DepartmentFactory::new();
    }

    protected $table = 'departments';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'parent_id',
        'sort_order',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function parent()
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Department::class, 'parent_id')->orderBy('sort_order');
    }

    protected static function booted()
    {
        static::creating(function (Department $department) {
            $department->created_by = $department->updated_by = auth()->id();
            if (empty($department->slug)) {
                $department->slug = app(DepartmentService::class)->generateUniqueSlug(Str::slug($department->name));
            }
        });

        static::updating(function (Department $department) {
            $department->updated_by = auth()->id();
            if ($department->isDirty('name') && ! $department->isDirty('slug')) {
                $department->slug = app(DepartmentService::class)->generateUniqueSlug(Str::slug($department->name), $department->id);
            }
        });

        static::deleting(function (Department $department) {
            foreach ($department->children as $child) {
                $child->delete();
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($q, $search) {
            $q->where(function ($q2) use ($search) {
                $q2->where('name', 'like', '%'.$search.'%')
                    ->orWhere('slug', 'like', '%'.$search.'%');
            });
        })->when($filters['status'] ?? null, function ($q, $status) {
            $q->where('status', $status);
        })->when(isset($filters['from_date']) && $filters['from_date'], function ($q) use ($filters) {
            $q->whereDate('created_at', '>=', $filters['from_date']);
        })->when(isset($filters['to_date']) && $filters['to_date'], function ($q) use ($filters) {
            $q->whereDate('created_at', '<=', $filters['to_date']);
        })->when($filters['sort_by'] ?? 'id', function ($q, $sortBy) use ($filters) {
            $allowed = ['id', 'name', 'slug', 'status', 'parent_id', 'sort_order', 'created_at', 'updated_at'];
            $column = in_array($sortBy, $allowed) ? $sortBy : 'id';
            $q->orderBy($column, $filters['sort_order'] ?? 'desc');
        });

        return $query;
    }

    public function scopeTreeOrder($query)
    {
        return $query->orderByRaw('COALESCE(parent_id, 0), sort_order, id');
    }

    public function getDepthAttribute(): int
    {
        if (array_key_exists('depth', $this->attributes)) {
            return (int) $this->attributes['depth'];
        }

        return app(DepartmentService::class)->getDepth($this);
    }
}
