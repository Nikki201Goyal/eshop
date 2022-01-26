<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
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
            'photo' =>$this->faker->imageUrl(250,250),
            'cover' =>$this->faker->imageUrl(250,250),
            'description' => $this->faker->realText(1000),
            'slug' => Str::slug($this->faker->name),
        ];
    }
}
