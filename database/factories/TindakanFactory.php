<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tindakan>
 */
class TindakanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->randomElement(['Pemeriksaan Umum', 'Suntik Vaksin', 'Cek Darah', 'Rontgen']),
            'biaya' => $this->faker->numberBetween(50000, 200000),
        ];
    }
}