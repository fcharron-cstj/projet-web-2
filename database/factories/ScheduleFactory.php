<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Day;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activity_id' => Activity::inRandomOrder()->first()->id,
            'day_id' => Day::inRandomOrder()->first()->id
        ];
    }
}
