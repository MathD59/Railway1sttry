<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => Str::random(40, "abcdefghijklmnopqrstuvwxyz0123456789"),
            'post_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),
            // 'likes_count' => fake()->numberBetween(1, 100),
            // 'dislikes_count' => fake()->numberBetween(1, 100),
            // 'alerts_comment_count' => fake()->numberBetween(1, 100),
        ];
    }
}
