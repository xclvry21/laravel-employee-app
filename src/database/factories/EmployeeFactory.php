<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'gender' => fake()->randomElement(Gender::cases()),
            'birthday' => fake()->dateTimeBetween('-60 years', '-18 years'),
            'monthly_salary' => fake()->numberBetween(20000, 100000),
        ];
    }
}
