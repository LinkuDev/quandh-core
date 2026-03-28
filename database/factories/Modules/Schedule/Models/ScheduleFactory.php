<?php

namespace Database\Factories\Modules\Schedule\Models;

use App\Modules\Schedule\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Schedule\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition(): array
    {
        return [
            'event_date' => fake()->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
            'session' => fake()->randomElement(['sang', 'chieu', 'toi']),
            'start_time' => fake()->time('H:i'),
            'content' => fake()->sentence(6),
            'chairperson_id' => null,
            'location' => fake()->optional()->address(),
            'prep_unit' => fake()->optional()->company(),
            'driver_info' => fake()->optional()->name(),
            'meeting_type' => fake()->randomElement(['hop_thuong_ky', 'hop_dot_xuat', 'hop_chuyen_de', 'hoi_nghi', 'tiep_khach', 'di_cong_tac', 'khac']),
            'nature' => fake()->randomElement(['thuong', 'quan_trong', 'mat']),
            'color_code' => fake()->optional()->hexColor(),
            'sort_order' => fake()->numberBetween(0, 100),
            'schedule_type' => fake()->randomElement(['thuong_truc', 'van_phong']),
            'status' => fake()->randomElement(['active', 'inactive']),
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}
