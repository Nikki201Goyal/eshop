<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'image' =>$this->faker->imageUrl(250,250),
            'author'=>$this->faker->name,
            'title' =>$this->faker->name,
            'description' => $this->faker->realText(1000),

        ];
    }
}


