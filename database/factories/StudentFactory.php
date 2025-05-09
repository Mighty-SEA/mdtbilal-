<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'nis' => $this->faker->unique()->numerify('2024####'),
            'birth_date' => $this->faker->date('Y-m-d', '-6 years'),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
        ];
    }
}
