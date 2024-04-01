<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['Male', 'Female']);
    
        $firstName = ($gender == 'Male') ? fake()->firstNameMale() : fake()->firstNameFemale();
    
        return [
            'document' => fake()->randomNumber(9, true),
            'fullname' => $firstName . " " . fake()->lastName(),
            'gender'    => $gender, 
            'birthdate' => fake()->dateTimeBetween('1980-01-01','2002-12-31'),
            'photo' => fake()->image('public\images',640,480, null, false),
            'phone'    => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('12345'),
            'remember_token' => Str::random(10),
        ];
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
