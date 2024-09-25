<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'arrival' => fake()->date(),
            'departing' => fake()->date(),
            'user_id' => User::inRandomOrder()->first()->id,
            'package_id' => Package::inRandomOrder()->first()->id
        ];
    }
}
