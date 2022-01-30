<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QueryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'subject' => $this->faker->name,
            'message' => $this->faker->realText(1000),
            'phone' => $this->faker->randomDigit(),

        ];
    }
}
