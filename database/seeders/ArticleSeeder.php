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
            'title' => 'Article 1',
            'description' => 'Description of Article 1',
            'media' => 'https://placehold.co/600x400',
        ]);
        Article::factory()->create([
            'id' => 2,
            'title' => 'Article 2',
            'description' => 'Description of Article 2',
            'media' => 'https://placehold.co/600x400',
        ]);
    }
}
