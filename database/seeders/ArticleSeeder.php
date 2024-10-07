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
            'media' => 'medias/doodle_artist.jpg',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'graphitis by the main scene',
            'description' => 'Music, dance.. and graphitis!',
            'media' => 'medias/graphiti_artist.jpg',
            'created_by' => 2
        ]);
        Article::factory()->create([
            'title' => 'Fire dancers',
            'description' => 'fire and dancers.. yep!',
            'media' => 'medias/fire-dancer.webp',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Article title',
            'description' => 'Article description .dwdsagawgsa ',
            'media' => 'medias/ai-festival-img.webp',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Article title',
            'description' => 'Article description .dwdsagawgsa ',
            'media' => 'medias/ai-festival-img.webp',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Article title',
            'description' => 'Article description .dwdsagawgsa ',
            'media' => 'medias/ai-festival-img.webp',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Article title',
            'description' => 'Article description .dwdsagawgsa ',
            'media' => 'medias/ai-festival-img.webp',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Article title',
            'description' => 'Article description .dwdsagawgsa ',
            'media' => 'medias/ai-festival-img.webp',
            'created_by' => 1
        ]);
    }
}
