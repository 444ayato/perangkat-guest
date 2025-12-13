<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontraktor;
use Faker\Factory as Faker;

class KontraktorSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            Kontraktor::create([
                'nama_kontraktor'    => $faker->company(),
                'penanggung_jawab'   => $faker->name(),
                'kontak'             => $faker->phoneNumber(),
                'alamat'             => $faker->address(),
                'email'              => $faker->safeEmail(),
                'telepon'            => $faker->phoneNumber(),
                'npwp'               => $faker->numerify('##.###.###.#-###.###'),
            ]);
        }
    }
}
