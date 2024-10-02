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
            'date' => now()->addDays(1)->format('Y-m-d')
        ]);
        Day::factory()->create([
            'date' => now()->addDays(2)->format('Y-m-d')
        ]);
        Day::factory()->create([
            'date' => now()->addDays(3)->format('Y-m-d')
        ]);
    }
}
