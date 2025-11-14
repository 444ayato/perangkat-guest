<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyekSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('proyek')->insert([
            [
                'kode_proyek' => 'PR001',
                'nama_proyek' => 'Pembangunan Jembatan',
                'tahun' => 2024,
                'lokasi' => 'Padang',
                'anggaran' => 500000000,
                'sumber_dana' => 'APBD',
                'deskripsi' => 'Proyek infrastruktur jembatan'
            ]
        ]);
    }
}
