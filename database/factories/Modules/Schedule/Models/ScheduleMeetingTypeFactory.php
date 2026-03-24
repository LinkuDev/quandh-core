<?php

namespace Database\Factories\Modules\Schedule\Models;

use App\Modules\Schedule\Models\ScheduleMeetingType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Schedule\Models\ScheduleMeetingType>
 */
class ScheduleMeetingTypeFactory extends Factory
{
    protected $model = ScheduleMeetingType::class;

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
