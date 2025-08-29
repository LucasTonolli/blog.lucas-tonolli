<?php

namespace Database\Factories;

use App\Enum\PostStatusEnum;
use App\Models\Category;
use App\Models\Tag;
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
            'category_id' => Category::factory()->create()->id,
            'content' => fake()->text(),
            'status' => fake()->randomElement(PostStatusEnum::cases()),
            'published_at' => fake()->boolean() ? fake()->dateTime() : null,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($post) {
            $post->tags()->attach(Tag::factory()->count(3)->create());
        });
    }
}
