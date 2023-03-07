<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence,
            'task_id' => \App\Models\Task::factory(),
        ];
    }
}
