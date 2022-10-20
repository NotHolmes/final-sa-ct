<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Checklist>
 */
class ChecklistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'c_datetime' => $this->faker->dateTimeBetween('-3 month', 'now'),
            'status_id' => $this->faker->numberBetween(2, 3),
        ];
    }
}
