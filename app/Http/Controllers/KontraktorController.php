<?php
namespace App\Http\Controllers;

use App\Models\Kontraktor;
use App\Models\Proyek;
use Illuminate\Http\Request;

class KontraktorController extends Controller
{
    public function index()
    {
        $kontraktors = Kontraktor::with('proyek')->latest()->paginate(10);
        return view('kontraktor.index', compact('kontraktors'));
    }

    public function create()
    {
        $proyeks = Proyek::orderBy('nama_proyek')->pluck('nama_proyek','proyek_id');
        return view('kontraktor.create', compact('proyeks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'nama' => 'required|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'alamat' => 'nullable|string',
        ]);

        Kontraktor::create($validated);

        return redirect()->route('kontraktor.index')->with('success','Kontraktor berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kontraktor = Kontraktor::with('proyek')->findOrFail($id);
        return view('kontraktor.show', compact('kontraktor'));
    }

    public function edit($id)
    {
        $kontraktor = Kontraktor::findOrFail($id);
        $proyeks = Proyek::orderBy('nama_proyek')->pluck('nama_proyek','proyek_id');
        return view('kontraktor.edit', compact('kontraktor','proyeks'));
    }

    public function update(Request $request, $id)
    {
        $kontraktor = Kontraktor::findOrFail($id);

        $validated = $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'nama' => 'required|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'alamat' => 'nullable|string',
        ]);

        $kontraktor->update($validated);

        return redirect()->route('kontraktor.index')->with('success','Kontraktor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Kontraktor::destroy($id);
        return redirect()->route('kontraktor.index')->with('success','Kontraktor berhasil dihapus.');
    }
}
