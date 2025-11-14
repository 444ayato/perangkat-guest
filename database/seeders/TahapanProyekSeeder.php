<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TahapanProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahapan_proyek')->insert([
            [
                'proyek_id' => 1,
                'nama_tahap' => 'Perencanaan',
                'target_persen' => 20,
                'tgl_mulai' => '2024-01-10',
                'tgl_selesai' => '2024-02-10',
            ]
        ]);
    }
}
