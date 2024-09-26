<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand = rand(10, 200);
        return [
            'title' => fake()->title(),
            'description' => fake()->sentence($rand),
            'date' => fake()->date(),
            'media' => "https://placehold.co/600x400"
        ];
    }
}
