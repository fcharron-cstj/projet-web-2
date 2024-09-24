<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->create([
            'id' => 1,
            'title' => 'Live Doodle artist!',
            'description' => 'Saturday at 3 live performer Alec...',
            'media' => asset('medias/doodle_artist.jpg'),
        ]);
        Article::factory()->create([
            'id' => 2,
            'title' => 'graphitis by the main scene',
            'description' => 'Music, dance.. and graphitis!',
            'media' => asset('medias/graphiti_artist.jpg'),
        ]);
    }
}
