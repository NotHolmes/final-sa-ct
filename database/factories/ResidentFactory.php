<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::select('id')->distinct()->get()->random()->id,
            'r_room_number' => fake()->unique()->numberBetween(1, 100),
            'r_name' => fake()->name(),
            'r_tel' => fake()->phoneNumber()
        ];
    }
}
