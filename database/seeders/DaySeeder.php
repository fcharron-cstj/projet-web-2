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
            'date' => '4 Avril'
        ]);
        Day::factory()->create([
            'date' => '5 Avril'
        ]);
        Day::factory()->create([
            'date' => '6 Avril'
        ]);
    }
}
