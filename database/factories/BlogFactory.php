<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'AuthorPic' =>$this->faker->imageUrl(250,250),
            'author'=>$this->faker->name,
            'title' =>$this->faker->name,
            'description' => $this->faker->realText(1000),
            'slug' => Str::slug($this->faker->name),

        ];
    }
}


