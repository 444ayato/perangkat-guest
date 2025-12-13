<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyek;
use Faker\Factory as Faker;

class ProyekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            Proyek::create([
                'kode_proyek' => 'PR' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_proyek' => $faker->sentence(3),
                'tahun'       => $faker->year(),
                'lokasi'      => $faker->city(),
                'anggaran'    => $faker->numberBetween(100000000, 5000000000),
                'sumber_dana' => $faker->randomElement(['APBN', 'APBD', 'Swasta', 'CSR']),
                'deskripsi'   => $faker->paragraph(),
            ]);
        }
    }
}
