<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => Str::random(10, "abcdefghijklmnopqrstuvwxyz0123456789"),
            'user_id' => fake()->numberBetween(1, 10),
            'category_id' => fake()->numberBetween(1, 8),
            'url' => fake()->url(),
            'likes_count' => fake()->numberBetween(1, 100),
            'stars' => fake()->numberBetween(1, 5),
            'stars_count' => fake()->numberBetween(1, 5),
        ];
    }
}
