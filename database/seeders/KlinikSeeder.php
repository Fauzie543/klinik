<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Wilayah, Pegawai, Pasien, Tindakan, Obat, Tagihan, ResepObat};
use Illuminate\Support\Str;

class KlinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Wilayah
        Wilayah::factory()->count(5)->create();

        // 2. Pegawai
        Pegawai::factory()->count(10)->create();

        // 3. Pasien
        $pasiens = Pasien::factory()->count(20)->create();

        // 4. Tindakan
        $tindakans = Tindakan::factory()->count(5)->create();

        // 5. Obat
        $obats = Obat::factory()->count(10)->create();

        // 6. Tagihan & Resep Obat
        foreach ($pasiens as $pasien) {
            $tindakan = $tindakans->random();
            $tagihan = Tagihan::create([
                'pasien_id' => $pasien->id,
                'tindakan_id' => $tindakan->id,
                'status' => fake()->randomElement(['lunas', 'belum']),
                'total' => 0, // akan dihitung setelah obat
            ]);

            $totalObat = 0;
            // Tambah 1-3 resep obat
            for ($i = 0; $i < rand(1, 3); $i++) {
                $obat = $obats->random();
                $jumlah = rand(1, 5);
                ResepObat::create([
                    'tindakan_id' => $tindakan->id,
                    'obat_id' => $obat->id,
                    'jumlah' => $jumlah,
                    'catatan' => 'Dikonsumsi setelah makan',
                ]);

                $totalObat += $obat->harga * $jumlah;
            }

            $tagihan->update([
                'total' => ($tindakan->biaya ?? 0) + $totalObat,
            ]);
        }
    }
}