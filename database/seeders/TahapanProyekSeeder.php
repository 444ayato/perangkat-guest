<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahapanProyekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $proyekIDs = DB::table('proyek')->pluck('proyek_id')->toArray();

        if (empty($proyekIDs)) return;

        $data = [];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'proyek_id'     => $faker->randomElement($proyekIDs),
                'nama_tahap'    => 'Tahap ' . $faker->word(),
                'target_persen' => rand(1, 100),
                'tgl_mulai'     => $faker->date(),
                'tgl_selesai'   => $faker->date(),
            ];
        }

        DB::table('tahapan_proyek')->insert($data);
    }
}
