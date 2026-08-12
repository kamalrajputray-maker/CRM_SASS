<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),

            'company_id' => null,

            'customer_id' => null,

            'title' => fake()->sentence(4),

            'amount' => fake()->randomFloat(2, 5000, 500000),

            'stage' => fake()->randomElement([
                'new',
                'contacted',
                'qualified',
                'proposal',
                'negotiation',
                'won',
                'lost',
            ]),

            'probability' => fake()->numberBetween(10, 100),

            'expected_close_date' => fake()->dateTimeBetween(
                'now',
                '+3 months'
            ),

            'assigned_to' => null,

            'created_by' => null,
        ];
    }
}