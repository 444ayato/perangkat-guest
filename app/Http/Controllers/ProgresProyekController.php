<?php

namespace App\Http\Controllers;

use App\Models\ProgresProyek;
use App\Models\Proyek;
use App\Models\TahapanProyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgresProyekController extends Controller
{
    public function index(Request $request)
    {
        // Start query builder
        $query = ProgresProyek::with(['proyek', 'tahapan']);
        
        // 🔍 SEARCH FUNCTIONALITY
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('proyek', function($q) use ($search) {
                    $q->where('nama_proyek', 'like', "%{$search}%")
                      ->orWhere('kode_proyek', 'like', "%{$search}%");
                })
                ->orWhereHas('tahapan', function($q) use ($search) {
                    $q->where('nama_tahapan', 'like', "%{$search}%");
                })
                ->orWhere('catatan', 'like', "%{$search}%");
            });
        }
        
        // 📅 DATE RANGE FILTER
        if ($request->filled('start_date')) {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }
        
        if ($request->filled('end_date')) {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }
        
        // 📊 PROGRESS RANGE FILTER
        if ($request->filled('progress_min')) {
            $query->where('persen_real', '>=', $request->progress_min);
        }
        
        if ($request->filled('progress_max')) {
            $query->where('persen_real', '<=', $request->progress_max);
        }
        
        // 🏗️ PROJECT FILTER
        if ($request->filled('proyek_id')) {
            $query->where('proyek_id', $request->proyek_id);
        }
        
        // 📋 SORTING
        $sortColumn = $request->get('sort', 'tanggal');
        $sortDirection = $request->get('direction', 'desc');
        
        $allowedSortColumns = ['tanggal', 'persen_real', 'created_at'];
        if (in_array($sortColumn, $allowedSortColumns)) {
            $query->orderBy($sortColumn, $sortDirection);
        } else {
            $query->orderBy('tanggal', 'desc');
        }
        
        // 📄 PAGINATION
        $perPage = $request->get('per_page', 15);
        $progres = $query->paginate($perPage);
        
        // Preserve query parameters in pagination
        $progres->appends($request->except('page'));
        
        // Get projects for filter dropdown
        $proyeks = Proyek::all();
        
        return view('pages.progres.index', compact('progres', 'proyeks'));
    }

    public function create()
    {
        $proyeks = Proyek::all();
        $tahapans = TahapanProyek::all();
        
        return view('pages.progres.create', compact('proyeks', 'tahapans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'tahap_id' => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string|max:500',
            'foto_progres' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto_progres')) {
            $path = $request->file('foto_progres')->store('progres_proyek', 'public');
            $validated['foto_progres'] = $path;
        }

        ProgresProyek::create($validated);

        return redirect()->route('progres.index')
            ->with('success', 'Data progres proyek berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Eager load relasi dengan null checking
        $progres = ProgresProyek::with([
            'proyek' => function($query) {
                $query->withDefault([
                    'nama_proyek' => 'Proyek tidak ditemukan',
                    'kode_proyek' => 'N/A'
                ]);
            },
            'tahapan' => function($query) {
                $query->withDefault([
                    'nama_tahapan' => 'Tahapan tidak ditemukan'
                ]);
            }
        ])->findOrFail($id);
        
        return view('pages.progres.show', compact('progres'));
    }

    // PERBAIKAN: Parameter harus 'progre' untuk match dengan route
    public function edit($progre)  // Ubah dari $progres ke $progre
    {
        $progres = ProgresProyek::with(['proyek', 'tahapan'])->findOrFail($progre);
        
        $proyeks = Proyek::all();
        $tahapans = TahapanProyek::all();
        
        return view('pages.progres.edit', compact('progres', 'proyeks', 'tahapans'));
    }

    // PERBAIKAN: Parameter harus 'progre' untuk match dengan route
    public function update(Request $request, $progre)  // Ubah dari $progres ke $progre
    {
        $progres = ProgresProyek::findOrFail($progre);
        
        $validated = $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'tahap_id' => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string|max:500',
            'foto_progres' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto_progres')) {
            // Hapus foto lama jika ada
            if ($progres->foto_progres) {
                Storage::disk('public')->delete($progres->foto_progres);
            }
            
            $path = $request->file('foto_progres')->store('progres_proyek', 'public');
            $validated['foto_progres'] = $path;
        }

        $progres->update($validated);

        return redirect()->route('progres.index')
            ->with('success', 'Data progres proyek berhasil diperbarui.');
    }

    // PERBAIKAN: Parameter harus 'progre' untuk match dengan route
    public function destroy($progre)  // Ubah dari $progres ke $progre
    {
        $progres = ProgresProyek::findOrFail($progre);
        
        // Hapus foto jika ada
        if ($progres->foto_progres) {
            Storage::disk('public')->delete($progres->foto_progres);
        }
        
        $progres->delete();

        return redirect()->route('progres.index')
            ->with('success', 'Data progres proyek berhasil dihapus.');
    }
}
