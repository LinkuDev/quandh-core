<?php

namespace App\Modules\Schedule\Models;

use App\Modules\Core\Models\User;
use App\Modules\Schedule\Enums\MeetingTypeEnum;
use App\Modules\Schedule\Enums\ScheduleNatureEnum;
use App\Modules\Schedule\Enums\ScheduleTypeEnum;
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

        'meeting_type',
        'nature',
        'color_code',
        'sort_order',
        'schedule_type',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'event_date' => 'date',
        'meeting_type' => MeetingTypeEnum::class,
        'nature' => ScheduleNatureEnum::class,
        'schedule_type' => ScheduleTypeEnum::class,
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
            ->when($filters['schedule_type'] ?? null, fn ($q, $type) => $q->where('schedules.schedule_type', $type))
            ->when($filters['chairperson_id'] ?? null, fn ($q, $id) => $q->where('schedules.chairperson_id', $id))
            ->when($filters['meeting_type'] ?? null, fn ($q, $val) => $q->where('schedules.meeting_type', $val))
            ->when($filters['nature'] ?? null, fn ($q, $val) => $q->where('schedules.nature', $val))
            ->when($filters['position'] ?? null, function ($q, $position) {
                $q->whereHas('chairperson', fn ($sub) => $sub->where('users.position', 'like', '%'.$position.'%'));
            })
            ->when($filters['participant_user_id'] ?? null, function ($q, $userId) {
                $q->whereHas('participants', fn ($sub) => $sub->where('schedule_participants.user_id', $userId));
            })
            ->orderBy('schedules.event_date', 'asc')
            ->orderBy('schedules.sort_order', 'asc');
    }
}
