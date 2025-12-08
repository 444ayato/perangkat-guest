<?php
namespace App\Http\Controllers;

use App\Models\ProgresProyek;
use App\Models\Proyek;
use App\Models\TahapanProyek;
use Illuminate\Http\Request;

class ProgresProyekController extends Controller
{
    public function index()
    {
        $items = ProgresProyek::with(['proyek','tahap'])->latest()->paginate(10);
        return view('progres.index', compact('items'));
    }

    public function create()
    {
        $proyeks = Proyek::pluck('nama_proyek','proyek_id');
        $tahaps = TahapanProyek::pluck('nama_tahap','tahap_id');
        return view('progres.create', compact('proyeks','tahaps'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'tahap_id' => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        ProgresProyek::create($validated);
        return redirect()->route('progres.index')->with('success','Progres disimpan.');
    }

    public function edit($id)
    {
        $item = ProgresProyek::findOrFail($id);
        $proyeks = Proyek::pluck('nama_proyek','proyek_id');
        $tahaps = TahapanProyek::pluck('nama_tahap','tahap_id');
        return view('progres.edit', compact('item','proyeks','tahaps'));
    }

    public function update(Request $request, $id)
    {
        $item = ProgresProyek::findOrFail($id);

        $validated = $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'tahap_id' => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $item->update($validated);
        return redirect()->route('progres.index')->with('success','Progres diperbarui.');
    }

    public function destroy($id)
    {
        ProgresProyek::destroy($id);
        return redirect()->route('progres.index')->with('success','Progres dihapus.');
    }
}
