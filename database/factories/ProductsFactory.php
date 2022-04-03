<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductsFactory extends Factory
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
            'image' =>$this->faker->imageUrl(250,250),
            'cover' =>$this->faker->imageUrl(500,250),
            'price' =>$this->faker->randomDigit(),
            'status' =>$this->faker->boolean(true),
            'description' => $this->faker->realText(1000),
            'slug' => Str::slug($this->faker->name),
            'stock' => $this->faker->numberBetween(0,100),

        ];
    }
}
