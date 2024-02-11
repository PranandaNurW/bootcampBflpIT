<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = ['post-1.jpg', 'post-2.jpg', 'post-3.jpg', 'post-4.jpg'];
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'image' => $images[array_rand($images)],
            'body' => $this->faker->paragraph(mt_rand(5,10)),
            'user_id' => mt_rand(1,10),
            'category_id' => mt_rand(1,2)
        ];
    }
}
