<?php

namespace Database\Factories\Modules\Schedule\Models;

use App\Modules\Core\Models\User;
use App\Modules\Schedule\Models\Schedule;
use App\Modules\Schedule\Models\ScheduleNotification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Schedule\Models\ScheduleNotification>
 */
class ScheduleNotificationFactory extends Factory
{
    protected $model = ScheduleNotification::class;

    public function definition(): array
    {
        return [
            'schedule_id' => Schedule::factory(),
            'user_id' => User::factory(),
            'channel' => fake()->randomElement(['sms', 'zalo', 'website', 'app']),
            'remind_at' => fake()->dateTimeBetween('now', '+7 days'),
            'status' => 'pending',
            'sent_at' => null,
            'read_at' => null,
            'created_by' => null,
        ];
    }
}
