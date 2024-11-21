<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log; // Import the Log facade

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
        $createdAt = fake()->dateTimeBetween('-2 years');
        $updatedAt = (clone $createdAt)->modify('+'.fake()->numberBetween(0,365).'days');
        if ($updatedAt < $createdAt) {
            $updatedAt = (clone $createdAt)->modify('+1 day'); // Fallback
        }

        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ];

    }

}
