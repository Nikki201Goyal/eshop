<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>$this->faker->numberBetween(1,10),
            'total' => $this->faker->randomDigit(),
            'Shipping' => $this->faker->randomDigit(),
            'discount' =>$this->faker->randomDigit(),
            'payment_method'=>'esewa',
            'address_id' =>$this->faker->numberBetween(1,10),
            'order_notes' =>$this->faker->text(100),

        ];
    }
}
