<?php

namespace App\Modules\Schedule\Models;

use App\Modules\Core\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Danh mục loại cuộc họp (catalog pattern).
 */
class ScheduleMeetingType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    protected static function booted()
    {
        static::creating(fn (ScheduleMeetingType $model) => $model->created_by = $model->updated_by = auth()->id());
        static::updating(fn (ScheduleMeetingType $model) => $model->updated_by = auth()->id());
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'meeting_type_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, fn ($q, $search) => $q->where('name', 'like', '%'.$search.'%'))
            ->when($filters['status'] ?? null, fn ($q, $status) => $q->where('status', $status))
            ->when($filters['from_date'] ?? null, fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
            ->when($filters['to_date'] ?? null, fn ($q, $date) => $q->whereDate('created_at', '<=', $date))
            ->when($filters['sort_by'] ?? 'created_at', function ($q, $sortBy) use ($filters) {
                $allowed = ['id', 'name', 'created_at', 'updated_at'];
                $column = in_array($sortBy, $allowed) ? $sortBy : 'created_at';
                $q->orderBy($column, $filters['sort_order'] ?? 'desc');
            });
    }
}
