<?php
namespace App\Http\Controllers;

use App\Models\LokasiProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class LokasiProyekController extends Controller
{
    public function index(Request $request)
    {
                                               // Query dasar dengan relasi proyek
        $query = LokasiProyek::with('proyek'); // Ganti dari load ke with

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lokasi', 'like', '%' . $request->search . '%')
                    ->orWhereHas('proyek', function ($q2) use ($request) {
                        $q2->where('nama_proyek', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // Sorting
        $sort      = $request->get('sort', 'nama_lokasi');
        $direction = $request->get('direction', 'asc');

        if (in_array($sort, ['nama_lokasi', 'created_at'])) {
            $query->orderBy($sort, $direction);
        } else {
            $query->orderBy('nama_lokasi', 'asc');
        }

        // Pagination
        $perPage = $request->get('per_page', 10);
        $lokasis = $query->paginate($perPage);

        // Get stats
        $totalLokasi       = LokasiProyek::count();
        $totalProyek       = Proyek::count();
        $proyekTanpaLokasi = Proyek::doesntHave('lokasi')->count();

        // Proyek terbaru dengan lokasi
        $recentProjects = Proyek::with('lokasi')
            ->latest()
            ->limit(6)
            ->get();

        return view('pages.lokasi.index', compact(
            'lokasis',
            'totalLokasi',
            'totalProyek',
            'proyekTanpaLokasi',
            'recentProjects'
        ));
    }

    public function create()
    {
        // Ambil proyek yang belum punya lokasi
        $proyekTanpaLokasi = Proyek::doesntHave('lokasi')
            ->orderBy('nama_proyek', 'asc')
            ->get();

        return view('pages.lokasi.create', compact('proyekTanpaLokasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyek_id'   => 'required|exists:proyek,proyek_id',
            'nama_lokasi' => 'required|string|max:255',
            'lat'         => 'nullable|numeric|between:-90,90',
            'lng'         => 'nullable|numeric|between:-180,180',
            'geojson'     => 'nullable|string',
        ]);

        // Cek apakah proyek sudah punya lokasi
        $existingLocation = LokasiProyek::where('proyek_id', $validated['proyek_id'])->first();
        if ($existingLocation) {
            return back()
                ->withInput()
                ->with('error', 'Proyek ini sudah memiliki data lokasi.');
        }

        LokasiProyek::create($validated);

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi proyek berhasil ditambahkan.');
    }

    public function show(LokasiProyek $lokasi)
    {
        // Load proyek dengan kontraktor dan progress
        $lokasi->load(['proyek' => function ($query) {
            $query->with(['kontraktor', 'progres' => function ($q) {
                $q->latest()->limit(5);
            }]);
        }]);

        return view('pages.lokasi.show', compact('lokasi'));
    }

    public function edit(LokasiProyek $lokasi)
    {
        // Ambil semua proyek untuk dropdown
        $semuaProyek = Proyek::orderBy('nama_proyek', 'asc')->get();

        return view('pages.lokasi.edit', compact('lokasi', 'semuaProyek'));
    }

    public function update(Request $request, LokasiProyek $lokasi)
    {
        $validated = $request->validate([
            'proyek_id'   => 'required|exists:proyek,proyek_id',
            'nama_lokasi' => 'required|string|max:255',
            'lat'         => 'nullable|numeric|between:-90,90',
            'lng'         => 'nullable|numeric|between:-180,180',
            'geojson'     => 'nullable|string',
        ]);

        // Cek jika proyek_id diubah ke proyek yang sudah punya lokasi lain
        if ($validated['proyek_id'] != $lokasi->proyek_id) {
            $existingLocation = LokasiProyek::where('proyek_id', $validated['proyek_id'])
                ->where('lokasi_id', '!=', $lokasi->lokasi_id)
                ->first();

            if ($existingLocation) {
                return back()
                    ->withInput()
                    ->with('error', 'Proyek yang dipilih sudah memiliki data lokasi.');
            }
        }

        $lokasi->update($validated);

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi proyek berhasil diperbarui.');
    }

    public function destroy(LokasiProyek $lokasi)
    {
        $lokasi->delete();

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi proyek berhasil dihapus.');
    }
}
