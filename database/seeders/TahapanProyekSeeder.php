<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TahapanProyekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'proyek_id'     => rand(1, 100),
                'nama_tahap'    => 'Tahapan ' . $faker->word(),
                'target_persen' => rand(1, 100),
                'tgl_mulai'     => $faker->dateTimeBetween('-1 year', 'now'),
                'tgl_selesai'   => $faker->dateTimeBetween('now', '+1 year'),
            ];
        }

        DB::table('tahapan_proyek')->insert($data);
    }
}
