<?php

namespace App\Modules\Schedule\Models;

use App\Modules\Core\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Thành phần tham dự lịch công tác (M-N giữa Schedule và User + external).
 */
class ScheduleParticipant extends Model
{
    protected $fillable = [
        'schedule_id',
        'user_id',
        'external_name',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
