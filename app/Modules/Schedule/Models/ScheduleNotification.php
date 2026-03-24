<?php

namespace App\Modules\Schedule\Models;

use App\Modules\Core\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Thông báo nhắc lịch công tác.
 */
class ScheduleNotification extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Database\Factories\Modules\Schedule\Models\ScheduleNotificationFactory::new();
    }

    protected $fillable = [
        'schedule_id',
        'user_id',
        'channel',
        'remind_at',
        'status',
        'sent_at',
        'read_at',
        'created_by',
    ];

    protected $casts = [
        'remind_at' => 'datetime',
        'sent_at' => 'datetime',
        'read_at' => 'datetime',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
