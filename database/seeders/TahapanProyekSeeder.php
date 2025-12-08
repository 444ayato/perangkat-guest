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

        // Ambil hanya ID proyek yang benar-benar ada
        $proyekIDs = DB::table('proyek')->pluck('proyek_id')->toArray();

        if (empty($proyekIDs)) {
            $this->command->error("Tabel proyek kosong! Jalankan ProyekSeeder dulu.");
            return;
        }

        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'proyek_id'     => $faker->randomElement($proyekIDs),
                'nama_tahap'    => 'Tahapan ' . $faker->word(),
                'target_persen' => rand(1, 100),
                'tgl_mulai'     => $faker->dateTimeBetween('-1 year', 'now'),
                'tgl_selesai'   => $faker->dateTimeBetween('now', '+1 year'),
            ];
        }

        DB::table('tahapan_proyek')->insert($data);
    }
}