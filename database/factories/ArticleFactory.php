<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word,
            'title' => $this->faker->words(3, true),
            'detail' => $this->faker->sentence,
            'body' => $this->faker->text,
            'published' => $this->faker->boolean(),
            'owner_id' => '',
        ];
    }
}
