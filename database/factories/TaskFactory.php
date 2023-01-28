<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $time_start = fake()->dateTimeBetween('-7 days', '+2 days');
        if ($time_start > Carbon::now()) {
            $time_end = fake()->dateTimeBetween('+2 days', '+10days');
        } else {
            $time_end = Carbon::now();
        }
        return [
            'name' => fake()->name(),
            'description' => fake()->boolean(50) ? fake()->paragraph() : null,
            'status' => $time_end > Carbon::now() ? fake()->numberBetween(1, 2) : 3,
            'priority' => fake()->numberBetween(1, 3),
            'time_start' => $time_start,
            'time_end' => $time_end
        ];
    }
}
