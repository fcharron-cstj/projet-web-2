<?php

namespace Database\Seeders;

use App\Models\ArtistSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArtistSchedule::factory()->create([
            'schedule_id' => 1,
            'artist_id' => 1,
        ]);
    }
}
