<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Maybe delete this seeder, might be not necessary
        Schedule::factory()->create([
            'activity_id' => 1,
            'day_id' => 1,
        ]);
    }
}
