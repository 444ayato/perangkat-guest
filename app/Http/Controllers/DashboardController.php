<?php

namespace App\Http\Controllers;

use App\Models\Kontraktor;
use App\Models\LokasiProyek;
use App\Models\ProgresProyek;
use App\Models\Proyek;
use App\Models\TahapanProyek;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Total data dengan default 0 jika null
        $totalProyek     = Proyek::count() ?? 0;
        $totalLokasi     = LokasiProyek::count() ?? 0;
        $totalKontraktor = Kontraktor::count() ?? 0;
        $totalTahapan    = TahapanProyek::count() ?? 0;
        $totalUser       = User::count() ?? 0;

        // Rata-rata progres dengan default 0
        $rataProgres = ProgresProyek::avg('persen_real') ?? 0;
        $rataProgres = round($rataProgres, 2); // Format 2 decimal

        // Grafik jumlah proyek per lokasi - dengan pengecekan null
        $lokasiLabels = LokasiProyek::pluck('nama_lokasi') ?? collect();
        $lokasiCounts = LokasiProyek::withCount('proyek')->pluck('proyek_count') ?? collect();

        return view('pages.dashboard', [
            'totalProyek'     => $totalProyek,
            'totalLokasi'     => $totalLokasi,
            'totalKontraktor' => $totalKontraktor,
            'totalTahapan'    => $totalTahapan,
            'totalUser'       => $totalUser,
            'rataProgres'     => $rataProgres,
            'lokasiLabels'    => $lokasiLabels,
            'lokasiCounts'    => $lokasiCounts
        ]);
    }
}