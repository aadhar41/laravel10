<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(10),
            'content' => fake()->paragraphs(5, true),
            'created_at' => fake()->dateTimeBetween('-3 months'),
            'updated_at' => fake()->dateTimeBetween('-3 months'),
        ];
    }

    /**
     * Indicate that the model's email address should be test.
     */
    public function newTitle(): static
    {
        return $this->state(fn (array $attributes) => [
            'title' => 'New title',
            'content' => 'Content of the blog post.',
        ]);
    }
}