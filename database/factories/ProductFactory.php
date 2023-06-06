<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->randomElement(['animal', 'vegetable', 'fruit', 'mushroom']),
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'stocks' => mt_rand(2,200),
            'price' => mt_rand(20,300) * 1000,
        ];
    }
}
