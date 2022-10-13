<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\Tag;
use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'status_id' => Status::inRandomOrder()->first()->id,
            'title' => fake()->realText(30),
            'description' => fake()->realText(200)
        ];
    }
}
