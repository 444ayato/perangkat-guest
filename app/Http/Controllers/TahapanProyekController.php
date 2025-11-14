<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Models\TahapanProyek;

class TahapanProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TahapanProyek::with('proyek')->get();
        return view('pages/tahapan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyek = Proyek::all();
        return view('pages/tahapan.create', compact('proyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(TahapanProyek $tahapanProyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahapanProyek $id)
    {
        $data = TahapanProyek::findOrFail($id);
        $proyek = Proyek::all();
        return view('pages/tahapan.edit', compact('data', 'proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TahapanProyek $id)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahapanProyek $id)
    {
        TahapanProyek::findOrFail($id)->delete();
        return redirect()->route('tahapan.index')->with('success', 'Data berhasil dihapus!');
    }
}
