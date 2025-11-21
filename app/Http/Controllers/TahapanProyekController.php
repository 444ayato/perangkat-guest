<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Models\TahapanProyek;

class TahapanProyekController extends Controller
{
    /**
     * Display a listing of the resource (Pagination + Search + Filter).
     */
    public function index(Request $request)
    {
        // Ambil parameter search & filter
        $search = $request->search;
        $filterProyek = $request->proyek_id;

        // Query dasar
        $query = TahapanProyek::with('proyek');

        // Search (nama tahap & nama proyek)
        if (!empty($search)) {
            $query->where('nama_tahap', 'like', "%$search%")
                ->orWhereHas('proyek', function ($q) use ($search) {
                    $q->where('nama_proyek', 'like', "%$search%");
                });
        }

        // Filter berdasarkan proyek
        if (!empty($filterProyek)) {
            $query->where('proyek_id', $filterProyek);
        }

        // Pagination 10 data per halaman
        $data = $query->orderBy('tgl_mulai', 'desc')->paginate(10);

        // Untuk dropdown filter
        $proyek = Proyek::all();

        return view('pages.tahapan.index', compact('data', 'proyek', 'search', 'filterProyek'));
    }

    public function create()
    {
        $proyek = Proyek::all();
        return view('pages.tahapan.create', compact('proyek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required',
            'nama_tahap' => 'required',
            'target_persen' => 'required|numeric',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
        ]);

        TahapanProyek::create($request->all());

        return redirect()->route('tahapan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = TahapanProyek::findOrFail($id);
        $proyek = Proyek::all();
        return view('pages.tahapan.edit', compact('data', 'proyek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'proyek_id' => 'required',
            'nama_tahap' => 'required',
            'target_persen' => 'required|numeric',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
        ]);

        $data = TahapanProyek::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('tahapan.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        TahapanProyek::findOrFail($id)->delete();
        return redirect()->route('tahapan.index')->with('success', 'Data berhasil dihapus!');
    }
}
