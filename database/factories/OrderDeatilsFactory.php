<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDeatilsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1,10),
            'price' =>$this->faker->randomDigit(),
            'quantity' =>$this->faker->randomDigit(),
            'order_id' => $this->faker->numberBetween(1,10),
            'status' =>$this->faker->boolean(true),

        ];
    }
}
