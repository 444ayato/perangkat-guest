<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\ProgresProyek;
use App\Models\Proyek;
use App\Models\TahapanProyek;

class ProgresProyekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $proyeks = Proyek::all();
        $tahapans = TahapanProyek::all();

        if ($proyeks->isEmpty() || $tahapans->isEmpty()) {
            return;
        }

        $fotoList = [
            'foto progres proyek 1.jpeg',
            'foto progres proyek 2.jpeg',
            'foto progres proyek 3.jpeg',
            'foto progres proyek 4.jpeg',
        ];

        for ($i = 1; $i <= 50; $i++) {
            ProgresProyek::create([
                'proyek_id'    => $proyeks->random()->proyek_id,
                'tahap_id'     => $tahapans->random()->tahap_id,
                'persen_real'  => rand(1, 100),
                'tanggal'      => $faker->date(),
                'catatan'      => $faker->sentence(),
                // pakai 4 foto berulang
                'foto_progres' => $fotoList[($i - 1) % 4],
            ]);
        }
    }
}
