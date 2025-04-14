<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'nip' => $this->faker->unique()->numerify('1980##########'),
            'jabatan' => $this->faker->randomElement(['Dokter', 'Perawat', 'Apoteker']),
            'email' => $this->faker->unique()->safeEmail,
            'telepon' => $this->faker->unique()->numerify('1980##########'),
        ];
    }
}