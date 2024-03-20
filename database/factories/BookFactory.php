<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $author = Author::create([
            'description' => fake()->text(40),
            'user_id' => 12,
        ]);

        return [
            'isbn' => fake()->randomNumber().fake()->randomNumber(),
            'title' => fake()->jobTitle(),
            'description' => fake()->text(50),
            'pages_amount' => fake()->numberBetween(2, 500),
            'author_id' => $author->id,
        ];
    }
}
