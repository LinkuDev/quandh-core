<?php

namespace App\Modules\Schedule\Models;

use App\Modules\Core\Models\Department;
use App\Modules\Core\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Lịch công tác - bảng trung tâm của module Schedule.
 */
class Schedule extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected static function newFactory()
    {
        return \Database\Factories\Modules\Schedule\Models\ScheduleFactory::new();
    }

    protected $fillable = [
        'event_date',
        'session',
        'start_time',
        'content',
        'chairperson_id',
        'location',
        'prep_unit',
        'driver_info',

        'meeting_type_id',
        'nature_id',
        'color_code',
        'sort_order',
        'department_id',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'event_date' => 'date',

        'sort_order' => 'integer',
    ];

    protected static function booted()
    {
        static::creating(function (Schedule $model) {
            $model->created_by = auth()->id();
            $model->updated_by = auth()->id();
        });

        static::updating(function (Schedule $model) {
            $model->updated_by = auth()->id();
        });
    }

    /* ── Quan hệ ── */

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function chairperson()
    {
        return $this->belongsTo(User::class, 'chairperson_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function meetingType()
    {
        return $this->belongsTo(ScheduleMeetingType::class, 'meeting_type_id');
    }

    public function nature()
    {
        return $this->belongsTo(ScheduleNature::class, 'nature_id');
    }

    public function participants()
    {
        return $this->hasMany(ScheduleParticipant::class);
    }

    public function notifications()
    {
        return $this->hasMany(ScheduleNotification::class);
    }

    public function attachments()
    {
        return $this->media()->where('collection_name', 'schedule-attachments')->orderBy('order_column');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('schedule-attachments');
    }

    /* ── Scope Filter ── */

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($q, $search) {
            $q->where('schedules.content', 'like', '%'.$search.'%');
        })->when($filters['status'] ?? null, fn ($q, $status) => $q->where('schedules.status', $status))
            ->when($filters['event_date'] ?? null, fn ($q, $date) => $q->whereDate('schedules.event_date', $date))
            ->when($filters['from_date'] ?? null, fn ($q, $date) => $q->whereDate('schedules.event_date', '>=', $date))
            ->when($filters['to_date'] ?? null, fn ($q, $date) => $q->whereDate('schedules.event_date', '<=', $date))
            ->when($filters['session'] ?? null, fn ($q, $session) => $q->where('schedules.session', $session))
            ->when($filters['department_id'] ?? null, fn ($q, $orgId) => $q->where('schedules.department_id', $orgId))
            ->when($filters['chairperson_id'] ?? null, fn ($q, $id) => $q->where('schedules.chairperson_id', $id))
            ->when($filters['meeting_type_id'] ?? null, fn ($q, $id) => $q->where('schedules.meeting_type_id', $id))
            ->when($filters['nature_id'] ?? null, fn ($q, $id) => $q->where('schedules.nature_id', $id))
            ->when($filters['position'] ?? null, function ($q, $position) {
                $q->whereHas('chairperson', fn ($sub) => $sub->where('users.position', 'like', '%'.$position.'%'));
            })
            ->when($filters['participant_user_id'] ?? null, function ($q, $userId) {
                $q->whereHas('participants', fn ($sub) => $sub->where('schedule_participants.user_id', $userId));
            })
            ->when($filters['sort_by'] ?? 'sort_order', function ($q, $sortBy) use ($filters) {
                $allowed = ['id', 'event_date', 'start_time', 'sort_order', 'created_at', 'updated_at'];
                $column = in_array($sortBy, $allowed) ? $sortBy : 'sort_order';

                /* Ưu tiên chức danh: Bí thư trước, Phó Bí thư sau, rồi mới đến sort_order */
                if ($column === 'sort_order') {
                    $q->leftJoin('users as chairperson_user', 'schedules.chairperson_id', '=', 'chairperson_user.id')
                        ->orderByRaw('FIELD(chairperson_user.position, ' . collect(self::POSITION_PRIORITY)->map(fn ($p) => "'{$p}'")->implode(',') . ') ASC')
                        ->orderBy('schedules.sort_order', 'asc')
                        ->orderBy('schedules.start_time', 'asc')
                        ->select('schedules.*');
                } else {
                    $q->orderBy("schedules.{$column}", $filters['sort_dir'] ?? 'asc');
                }
            });
    }

    /**
     * Thứ tự ưu tiên chức danh khi sắp xếp lịch.
     * Bí thư xếp trước, Phó Bí thư sau, còn lại theo sort_order.
     * Cập nhật danh sách này khi có thêm chức danh cần ưu tiên.
     */
    public const POSITION_PRIORITY = [
        'Bí thư',
        'Phó Bí thư',
    ];
}
