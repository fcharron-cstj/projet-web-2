<?php

namespace Database\Seeders;

use App\Models\Day;
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
        Day::factory()->create([
            'id' => 1,
            'activity' => 'Schedule 1',
            'date' => now(),
        ]);
    }
}
