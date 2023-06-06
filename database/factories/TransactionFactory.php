<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1,10),
            'product_id' => mt_rand(1,5),
            'quantity' => mt_rand(2,5),
            'transaction_time' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
