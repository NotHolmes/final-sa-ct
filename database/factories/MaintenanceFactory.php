<?php

namespace Database\Factories;

use App\Models\Checklist;
use App\Models\Resident;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->where('resident_id', '!=', null)->get()->first();
        return [
            'user_id' => $user->id,
            'resident_id' => $user->resident_id,
            'checklist_id' => null,
            'm_image' => null,
            'm_detail' => fake()->realText(200),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
