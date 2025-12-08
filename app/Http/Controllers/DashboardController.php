<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Proyek;
use App\Models\Kontraktor;
use App\Models\LokasiProyek;
use App\Models\TahapanProyek;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // === DATA TOTAL DASHBOARD ===
        $total_proyek     = Proyek::count();
        $total_lokasi     = LokasiProyek::count();
        $total_kontraktor = Kontraktor::count();
        $total_tahapan    = TahapanProyek::count();
        $total_user       = User::count();

        // === GRAFIK 1: JUMLAH PROYEK PER LOKASI ===
        $lokasi = LokasiProyek::withCount('proyek')->get();
        $lokasiLabel = $lokasi->pluck('nama_lokasi');
        $lokasiJumlah = $lokasi->pluck('proyek_count');

        // === GRAFIK 2: RATA-RATA PROGRES PROYEK ===
        $proyek = Proyek::all();
        $rataProgres = $proyek->avg('progres') ?? 0;

        // === GRAFIK 3: PROYEK SELESAI VS BELUM ===
        $proyek_selesai = Proyek::where('progres', 100)->count();
        $proyek_belum = Proyek::where('progres', '<', 100)->count();

        return view('pages.dashboard', compact(
            'total_proyek',
            'total_lokasi',
            'total_kontraktor',
            'total_tahapan',
            'total_user',
            'lokasiLabel',
            'lokasiJumlah',
            'rataProgres',
            'proyek_selesai',
            'proyek_belum'
        ));
    }

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    //
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    //
}

/**
 * Display the specified resource.
 */
public function show(string $id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    //
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    //
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    //
}
};
