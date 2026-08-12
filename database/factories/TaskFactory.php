<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        $status = fake()->randomElement([
            'pending',
            'in_progress',
            'completed',
        ]);

        return [
            'public_id' => (string) Str::ulid(),

            'company_id' => null,

            'deal_id' => null,

            'customer_id' => null,

            'title' => fake()->sentence(4),

            'description' => fake()->optional()->paragraph(),

            'priority' => fake()->randomElement([
                'low',
                'medium',
                'high',
                'urgent',
            ]),

            'status' => $status,

            'due_date' => fake()->dateTimeBetween(
                'now',
                '+30 days'
            ),

            'completed_at' => $status === 'completed'
                ? now()
                : null,

            'assigned_to' => null,

            'created_by' => null,

            'updated_by' => null,
        ];
    }
}