<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Tampilkan daftar proyek.
     */
    public function index()
    {
        $proyek = Proyek::orderBy('created_at', 'desc')->get();
        return view('guest.proyek.index', compact('proyek'));
    }

    /**
     * Tampilkan form tambah proyek.
     */
    public function create()
    {
        return view('guest.proyek.create');
    }

    /**
     * Simpan proyek baru ke database.
     */
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

    /**
     * Tampilkan detail proyek.
     */
    public function show($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('guest.proyek.show', compact('proyek'));
    }

    /**
     * Tampilkan form edit proyek.
     */
    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('guest.proyek.edit', compact('proyek'));
    }

    /**
     * Update data proyek.
     */
    public function update(Request $request, $id)
    {
        $proyek = Proyek::findOrFail($id);

        $validated = $request->validate([
            'kode_proyek' => 'required|max:20|unique:proyek,kode_proyek,' . $proyek->proyek_id . ',proyek_id',
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

    /**
     * Hapus proyek.
     */
    public function destroy($id)
    {
        Proyek::findOrFail($id)->delete();

        return redirect()
            ->route('proyek.index')
            ->with('success', 'Data proyek berhasil dihapus!');
    }
}