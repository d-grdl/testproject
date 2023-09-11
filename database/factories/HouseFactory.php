<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'bedrooms' => fake()->randomNumber(1),
            'bathrooms' => fake()->randomNumber(1),
            'storeys' => fake()->randomNumber(1),
            'garages' => fake()->randomNumber(1),
            'price' => fake()->randomNumber(5),
        ];
    }
}
