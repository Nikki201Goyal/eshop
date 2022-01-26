<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_Id'=>$this->faker->numberBetween(1,10),
            'product_Id'=>$this->faker->numberBetween(1,50),
        ];
    }
}
