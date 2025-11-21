<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Tampilkan daftar proyek (Guest + Admin)
     * lengkap dengan Search, Filter, dan Pagination.
     */
    public function index(Request $request)
    {
        $query = Proyek::orderBy('created_at', 'desc');

        // Search by Nama Proyek / Kode Proyek
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_proyek', 'like', '%' . $request->search . '%')
                  ->orWhere('kode_proyek', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Tahun
        if ($request->tahun) {
            $query->where('tahun', $request->tahun);
        }

        // Filter Lokasi
        if ($request->lokasi) {
            $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
        }

        // Pagination
        $proyek = $query->paginate(5)->withQueryString();

        // Data dropdown Tahun
        $tahunList = Proyek::select('tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('pages.proyek.index', compact('proyek', 'tahunList'));
    }

    public function create()
    {
        return view('pages.proyek.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_proyek' => 'required|unique:proyek,kode_proyek|max:20',
            'nama_proyek' => 'required|string|max:255',
            'lokasi'      => 'required|string|max:255',
            'tahun'       => 'nullable|digits:4|integer|min:2000|max:' . (date('Y') + 1),
            'anggaran'    => 'nullable|numeric|min:0',
            'sumber_dana' => 'nullable|string|max:100',
            'deskripsi'   => 'nullable|string',
        ]);

        Proyek::create($validated);

        return redirect()
            ->route('proyek.index')
            ->with('success', 'Data proyek berhasil ditambahkan!');
    }

    public function show($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('pages.proyek.show', compact('proyek'));
    }

    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('pages.proyek.edit', compact('proyek'));
    }

    public function update(Request $request, $id)
    {
        $proyek = Proyek::findOrFail($id);

        $validated = $request->validate([
            'kode_proyek' =>
                'required|max:20|unique:proyek,kode_proyek,' . $proyek->proyek_id . ',proyek_id',
            'nama_proyek' => 'required|string|max:255',
            'lokasi'      => 'required|string|max:255',
            'tahun'       => 'nullable|digits:4|integer|min:2000|max:' . (date('Y') + 1),
            'anggaran'    => 'nullable|numeric|min:0',
            'sumber_dana' => 'nullable|string|max:100',
            'deskripsi'   => 'nullable|string',
        ]);

        $proyek->update($validated);

        return redirect()
            ->route('proyek.index')
            ->with('success', 'Data proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Proyek::findOrFail($id)->delete();

        return redirect()
            ->route('proyek.index')
            ->with('success', 'Data proyek berhasil dihapus!');
    }
}
