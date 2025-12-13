<?php

namespace App\Http\Controllers;

use App\Models\Kontraktor;
use Illuminate\Http\Request;

class KontraktorController extends Controller
{
    public function index(Request $request)
    {
        // HAPUS withCount('proyek') UNTUK SEMENTARA
        $query = Kontraktor::query();

        // 🔍 SEARCH
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_kontraktor', 'like', "%{$search}%")
                    ->orWhere('penanggung_jawab', 'like', "%{$search}%")
                    ->orWhere('kontak', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('npwp', 'like', "%{$search}%");
            });
        }

        // 📞 FILTERS
        if ($request->filled('has_contact') && $request->has_contact == '1') {
            $query->whereNotNull('kontak');
        }

        if ($request->filled('has_email') && $request->has_email == '1') {
            $query->whereNotNull('email');
        }

        if ($request->filled('has_npwp') && $request->has_npwp == '1') {
            $query->whereNotNull('npwp');
        }

        if ($request->filled('type')) {
            if ($request->type === 'pt') {
                $query->where('nama_kontraktor', 'like', 'PT.%');
            } elseif ($request->type === 'cv') {
                $query->where('nama_kontraktor', 'like', 'CV.%');
            }
        }

        // 📊 SORTING
        $sortColumn = $request->get('sort', 'nama_kontraktor');
        $sortDirection = $request->get('direction', 'asc');

        if (in_array($sortColumn, ['nama_kontraktor', 'penanggung_jawab', 'created_at'])) {
            $query->orderBy($sortColumn, $sortDirection);
        } else {
            $query->orderBy('nama_kontraktor', 'asc');
        }

        // 📄 PAGINATION
        $perPage = $request->get('per_page', 10);
        $kontraktors = $query->paginate($perPage);

        // Preserve query parameters
        $kontraktors->appends($request->except('page'));

        return view('pages.kontraktor.index', compact('kontraktors'));
    }

    public function create()
    {
        return view('pages.kontraktor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kontraktor'  => 'required|string|max:100',
            'penanggung_jawab' => 'required|string|max:100',
            'kontak'           => 'nullable|string|max:20',
            'alamat'           => 'required|string',
            'email'            => 'nullable|email|max:100',
            'telepon'          => 'nullable|string|max:20',
            'npwp'             => 'nullable|string|max:25',
        ]);

        Kontraktor::create($validated);

        return redirect()->route('kontraktor.index')
            ->with('success', 'Data kontraktor berhasil ditambahkan.');
    }

    public function show(Kontraktor $kontraktor)
    {
        // HAPUS load('proyek') UNTUK SEMENTARA - karena kolom kontraktor_id belum ada di tabel proyek
        // $kontraktor->load('proyek'); // KOMENTARI INI DULU
        
        return view('pages.kontraktor.show', compact('kontraktor'));
    }

    public function edit(Kontraktor $kontraktor)
    {
        return view('pages.kontraktor.edit', compact('kontraktor'));
    }

    public function update(Request $request, Kontraktor $kontraktor)
    {
        $validated = $request->validate([
            'nama_kontraktor'  => 'required|string|max:100',
            'penanggung_jawab' => 'required|string|max:100',
            'kontak'           => 'nullable|string|max:20',
            'alamat'           => 'required|string',
            'email'            => 'nullable|email|max:100',
            'telepon'          => 'nullable|string|max:20',
            'npwp'             => 'nullable|string|max:25',
        ]);

        $kontraktor->update($validated);

        return redirect()->route('kontraktor.index')
            ->with('success', 'Data kontraktor berhasil diperbarui.');
    }

    public function destroy(Kontraktor $kontraktor)
    {
        // KOMENTARI dulu pengecekan proyek karena relasi belum ada
        // Cek apakah kontraktor memiliki proyek
        // if ($kontraktor->proyek()->count() > 0) {
        //     return redirect()->route('kontraktor.index')
        //         ->with('error', 'Tidak dapat menghapus kontraktor yang memiliki proyek.');
        // }

        $kontraktor->delete();

        return redirect()->route('kontraktor.index')
            ->with('success', 'Data kontraktor berhasil dihapus.');
    }
}