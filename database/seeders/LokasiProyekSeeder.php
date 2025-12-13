<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LokasiProyek;
use App\Models\Proyek;
use Faker\Factory as Faker;

class LokasiProyekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $foto = [
            'foto lokasi 1.jpeg',
            'foto lokasi 2.jpeg',
            'foto lokasi 3.jpeg',
        ];

        $proyeks = Proyek::take(20)->get();

        foreach ($proyeks as $index => $proyek) {
            LokasiProyek::create([
                'proyek_id'   => $proyek->proyek_id,
                'nama_lokasi' => 'Lokasi Proyek ' . $proyek->kode_proyek,
                'lat'         => $faker->latitude(),
                'lng'         => $faker->longitude(),
                'geojson'     => null,
                'gambar'      => $foto[$index % 3], // 🔁 pakai 3 foto berulang
            ]);
        }
    }
}
