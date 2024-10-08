<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Day::factory()->create([
            'date' => "2025-04-04"
        ]);
        Day::factory()->create([
            'date' => "2025-04-05"
        ]);
        Day::factory()->create([
            'date' => "2025-04-06"
        ]);
    }
}
