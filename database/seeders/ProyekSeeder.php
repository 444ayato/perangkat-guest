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
                'kode_proyek'=>'124',
                'nama_proyek'=>'Gedung Serbaguna',
                'tahun'=>2025,
                'lokasi'=>'Kecamatan A',
                'anggaran'=>250000000,
                'sumber_dana'=>'APBD',
                'deskripsi'=>'Pembangunan gedung',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}