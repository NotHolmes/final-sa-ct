<?php

namespace Database\Factories;

use App\Models\Maintenance;
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
            // m_id = unique random maintenance.id
            'm_id' => Maintenance::factory()->create()->id,
            'created_at' => $this->faker->dateTimeBetween('2021-01-01', '2021-12-31'),
            // c_datetime need to > created_at
            'c_datetime' => $this->faker->dateTimeBetween($this->faker->dateTimeBetween('2021-01-01', '2021-12-31'), '2021-12-31'),
            'status_id' => $this->faker->numberBetween(2, 4),
        ];
    }
}
