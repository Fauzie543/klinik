<?php

namespace Database\Factories;

use App\Models\Wilayah;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
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
            'nik' => $this->faker->unique()->numerify('1980##########'),
            'alamat' => $this->faker->address,
            'telepon' => $this->faker->unique()->numerify('1980##########'),
            'wilayah_id' => Wilayah::factory(),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2010-01-01'),
        ];
    }
}