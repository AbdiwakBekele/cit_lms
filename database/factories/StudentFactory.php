<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'age' => $this->faker->numberBetween(18, 40),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'city' => $this->faker->address(),
            'subcity' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'house_no' => $this->faker->numberBetween(18, 40),

            'level_of_education' => $this->faker->randomElement(['Degree', 'Masters']),
            'work_status' => $this->faker->randomElement(['Employeed', 'UnEmployeed']),
            'current_occupation' => $this->faker->randomElement(['Doctor', 'Teacher']),
            'work_experience' => $this->faker->randomElement(['2 years', '1 year']),

            'password' => bcrypt('password'),
        ];
    }
}