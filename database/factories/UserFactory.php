<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password = null;

    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),

            'public_id' => (string) Str::ulid(),

            'name' => fake()->name(),

            'first_name' => fake()->firstName(),

            'last_name' => fake()->lastName(),

            'email' => fake()->unique()->safeEmail(),

            'email_verified_at' => now(),

            'password' => static::$password ??= Hash::make('password'),

            'phone' => fake()->phoneNumber(),

            'profile_photo' => null,

            'status' => true,

            'last_login_at' => null,

            'remember_token' => Str::random(10),
        ];
    }
}