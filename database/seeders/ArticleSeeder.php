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
            'title' => 'Live Doodle artist!',
            'description' => 'Saturday at 3 live performer Alec...',
            'media' => asset('medias/doodle_artist.jpg'),
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'graphitis by the main scene',
            'description' => 'Music, dance.. and graphitis!',
            'media' => asset('medias/graphiti_artist.jpg'),
            'created_by' => 2
        ]);
    }
}
