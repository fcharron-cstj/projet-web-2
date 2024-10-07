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
        $hours = rand(0, 23);
        $minutes = rand(0, 59);
        $seconds = rand(0, 59);
        for ($i = 0; $i < 12; $i++) {


            Activity::factory()->create([
                'title' => 'Singer',
                'artists' => 'Meeko',
                'date' => now()->toDateString(). ' ' . $hours . ':' . $minutes . ':' . $seconds,
                'media' => 'medias/ai-festival-img.webp'
            ]);
            $hours = rand(0, 23);
            $minutes = rand(0, 59);
            $seconds = rand(0, 59);

            Activity::factory()->create([
                'title' => 'Singer',
                'artists' => 'Meeko',
                'date' => now()->addDay(1)->toDateString(). ' ' . $hours . ':' . $minutes . ':' . $seconds,
                'media' => 'medias/ai-festival-img.webp'
            ]);
            $hours = rand(0, 23);
            $minutes = rand(0, 59);
            $seconds = rand(0, 59);

            Activity::factory()->create([
                'title' => 'Singer',
                'artists' => 'Meeko',
                'date' => now()->addDay(2)->toDateString(). ' ' . $hours . ':' . $minutes . ':' . $seconds,
                'media' => 'medias/ai-festival-img.webp'
            ]);
            $hours = rand(0, 23);
            $minutes = rand(0, 59);
            $seconds = rand(0, 59);
        }
    }
}
