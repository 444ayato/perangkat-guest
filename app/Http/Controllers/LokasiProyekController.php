<?php
namespace App\Http\Controllers;

use App\Models\LokasiProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class LokasiProyekController extends Controller
{
    public function index()
    {
        $list = LokasiProyek::with('proyek')->latest()->paginate(10);
        return view('lokasi.index', compact('list'));
    }

    public function create()
    {
        $proyeks = Proyek::pluck('nama_proyek','proyek_id');
        return view('lokasi.create', compact('proyeks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'geojson' => 'nullable|string',
        ]);

        LokasiProyek::create($validated);
        return redirect()->route('lokasi.index')->with('success','Lokasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = LokasiProyek::findOrFail($id);
        $proyeks = Proyek::pluck('nama_proyek','proyek_id');
        return view('lokasi.edit', compact('item','proyeks'));
    }

    public function update(Request $request, $id)
    {
        $item = LokasiProyek::findOrFail($id);

        $validated = $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'geojson' => 'nullable|string',
        ]);

        $item->update($validated);
        return redirect()->route('lokasi.index')->with('success','Lokasi diperbarui.');
    }

    public function destroy($id)
    {
        LokasiProyek::destroy($id);
        return redirect()->route('lokasi.index')->with('success','Lokasi dihapus.');
    }
}
