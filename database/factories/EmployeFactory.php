<?php

namespace Database\Factories;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->numberBetween(1, 999999),
            'nama' => fake('id_ID')->name(),
            'alamat' => fake('id_ID')->city(),
            'gender' => fake()->randomElement(['L', 'P']),
            'gaji' => fake()->randomElement([100000, 80000, 250000]),
        ];
    }
}
