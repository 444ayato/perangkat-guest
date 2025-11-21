<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProyekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'kode_proyek' => 'PR' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_proyek' => 'Proyek ' . $faker->streetName(),
                'tahun'       => rand(2015, 2025),
                'lokasi'      => $faker->city(),
                'anggaran'    => rand(100_000_000, 5_000_000_000),
                'sumber_dana' => $faker->randomElement(['APBD', 'APBN', 'CSR', 'Mandiri']),
                'deskripsi'   => $faker->sentence(8),
            ];
        }

        DB::table('proyek')->insert($data);
    }
}
