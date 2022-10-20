<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'r_room_number' => fake()->numberBetween(1, 100),
            'r_name' => fake()->name(),
            'r_tel' => fake()->phoneNumber()
        ];
    }
}
