<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'specialty' => fake()->randomElement(['surgery','Family medicine']),
            'time' => '2023-07-24T18:00:00,2023-07-30T18:00:00',
            'image' => asset('/images/doc.jpg'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
