<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_id' => null,

            'first_name' => fake()->firstName(),

            'last_name' => fake()->lastName(),

            'email' => fake()->unique()->safeEmail(),

            'phone' => fake()->phoneNumber(),

            'designation' => fake()->randomElement([
                'Manager',
                'Director',
                'CEO',
                'CTO',
                'Sales Manager',
                'Account Manager',
                'HR Manager',
            ]),

            'is_primary' => false,
        ];
    }
}