<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
{
    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),

            'company_id' => null,

            'lead_id' => null,

            'customer_id' => null,

            'title' => fake()->sentence(4),

            'amount' => fake()->randomFloat(2, 5000, 500000),

            'stage' => fake()->randomElement([
                'proposal',
                'negotiation',
                'won',
                'lost',
            ]),

            'expected_close_date' => fake()->dateTimeBetween(
                'now',
                '+3 months'
            ),

            'assigned_to' => null,

            'created_by' => null,

            'updated_by' => null,
        ];
    }
}