<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),

            'company_id' => null,

            'user_id' => null,

            'action' => fake()->randomElement([
                'created',
                'updated',
                'deleted',
                'assigned',
                'completed',
            ]),

            'subject_type' => null,

            'subject_id' => null,

            'properties' => [
                'message' => fake()->sentence(),
            ],

            'ip_address' => fake()->ipv4(),

            'user_agent' => fake()->userAgent(),
        ];
    }
}