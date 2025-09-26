<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestProyekController extends Controller
{
    public function index()
    {
        $proyek = [
            [
                'proyek_id' => 1,
                'kode_proyek' => 'PRJ001',
                'nama_proyek' => 'Pembangunan Jalan Desa',
                'tahun' => 2024,
                'lokasi' => 'Desa Mekar Jaya',
                'anggaran' => 350000000,
                'sumber_dana' => 'APBD',
                'deskripsi' => 'Pembangunan jalan desa sepanjang 5 km'
            ],
            [
                'proyek_id' => 2,
                'kode_proyek' => 'PRJ002',
                'nama_proyek' => 'Renovasi Pasar Tradisional',
                'tahun' => 2025,
                'lokasi' => 'Kecamatan Sukamaju',
                'anggaran' => 750000000,
                'sumber_dana' => 'Dana Desa',
                'deskripsi' => 'Renovasi pasar tradisional agar lebih bersih dan tertata'
            ]
        ];

        return view('guest.proyek', compact('proyek'));
    }
}