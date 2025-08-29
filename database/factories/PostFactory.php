<?php

namespace Database\Factories;

use App\Enum\PostStatusEnum;
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
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'slug' => fake()->slug(),
            'content' => fake()->text(),
            'status' => fake()->randomElement(PostStatusEnum::cases()),
            'published_at' => fake()->boolean() ? fake()->dateTime() : null,
        ];
    }
}
