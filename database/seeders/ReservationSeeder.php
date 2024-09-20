<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::factory()->create([
            'id' => 1,
            'arrival' => now(),
            'departing' => now(),
            'package_id' => 1,
            'user_id' => 1,
        ]);
    }
}
