<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    public function definition(): array
    {
        $companyName = fake()->company();

        return [
            'public_id' => (string) Str::ulid(),

            'name' => $companyName,

            'slug' => Str::slug($companyName),

            'email' => fake()->unique()->companyEmail(),

            'phone' => fake()->phoneNumber(),

            'website' => fake()->url(),

            'logo' => null,

            'address' => fake()->address(),

            'city' => fake()->city(),

            'state' => fake()->state(),

            'country' => fake()->country(),

            'postal_code' => fake()->postcode(),

            'timezone' => fake()->timezone(),

            'currency' => fake()->currencyCode(),

            'status' => true,
        ];
    }
}