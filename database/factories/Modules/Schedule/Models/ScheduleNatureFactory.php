<?php

namespace Database\Factories\Modules\Schedule\Models;

use App\Modules\Schedule\Models\ScheduleNature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Schedule\Models\ScheduleNature>
 */
class ScheduleNatureFactory extends Factory
{
    protected $model = ScheduleNature::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'description' => fake()->optional()->sentence(),
            'status' => 'active',
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}
