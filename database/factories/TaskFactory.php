<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'body' => $this->faker->sentence,
            'completed' => $this->faker->boolean(),
            'owner_id' => \App\Models\User::factory(),
        ];
    }
}
