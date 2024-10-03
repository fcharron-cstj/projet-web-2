<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds fir developpement
     */
    public function run(): void
    {
        for ($i = 0; $i < 12; $i++) {
            Activity::factory()->create([
                'title' => 'Singer',
                'artists' => 'Meeko',
                'date' => '2024-10-03 10:51:06',
                'media' => 'medias/ai-festival-img.webp'
            ]);
            Activity::factory()->create([
                'title' => 'Singer',
                'artists' => 'Meeko',
                'date' => '2024-10-04 21:51:06',
                'media' => 'medias/ai-festival-img.webp'
            ]);
            Activity::factory()->create([
                'title' => 'Singer',
                'artists' => 'Meeko',
                'date' => '2024-10-05 05:51:06',
                'media' => 'medias/ai-festival-img.webp'
            ]);
        }
    }
}
