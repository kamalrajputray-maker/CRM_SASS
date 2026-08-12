<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),

            'company_id' => Company::factory(),

            'customer_code' => 'CUS-' . strtoupper(fake()->unique()->bothify('####??')),

            'customer_type' => fake()->randomElement([
                'individual',
                'business',
            ]),

            'first_name' => fake()->firstName(),

            'last_name' => fake()->lastName(),

            'company_name' => fake()->optional()->company(),

            'email' => fake()->unique()->safeEmail(),

            'phone' => fake()->phoneNumber(),

            'website' => fake()->optional()->url(),

            'address' => fake()->address(),

            'city' => fake()->city(),

            'state' => fake()->state(),

            'country' => fake()->country(),

            'postal_code' => fake()->postcode(),

            'assigned_to' => null,

            'created_by' => null,

            'updated_by' => null,

            'status' => true,
        ];
    }
}