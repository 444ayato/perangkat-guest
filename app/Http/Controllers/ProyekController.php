<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        $query = Proyek::orderBy('created_at', 'desc');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_proyek', 'like', '%' . $request->search . '%')
                    ->orWhere('kode_proyek', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->tahun) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->lokasi) {
            $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
        }

        $proyek = $query->paginate(5)->withQueryString();

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

            'media.*'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        unset($validated['media']);

        $proyek = Proyek::create($validated);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('media/proyek/', $filename, 'public');

                Media::create([
                    'ref_table' => 'proyek',
                    'ref_id'    => $proyek->proyek_id, // FIX DISINI
                    'file_name' => $filename,
                ]);
            }
        }

        return redirect()->route('proyek.index')
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

            'media.*'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        unset($validated['media']);

        $proyek->update($validated);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('media/proyek/', $filename, 'public');

                Media::create([
                    'ref_table' => 'proyek',
                    'ref_id'    => $proyek->proyek_id, // FIX DISINI
                    'file_name' => $filename,
                ]);
            }
        }

        return redirect()->route('proyek.index')
            ->with('success', 'Data proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Proyek::findOrFail($id)->delete();

        return redirect()->route('proyek.index')
            ->with('success', 'Data proyek berhasil dihapus!');
    }
}
