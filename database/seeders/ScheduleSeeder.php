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
        for ($i = 1; $i <= 36; $i++) {
            if ($i <= 12) {
                $day = 1;
            }
            if ($i > 12 && $i <= 24) {
                $day = 2;
            }
            if ($i > 24 && $i <= 36) {
                $day = 3;
            }
            Schedule::factory()->create([
                'activity_id' => $i,
                'day_id' => $day,
            ]);
        }
    }
}
