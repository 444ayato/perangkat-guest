@extends('layouts.app')

@section('content')
{{-- MAIN CONTENT --}}
<main>
    <section class="section1 py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">📋 Daftar Proyek Pembangunan</h2>
                <p class="text-muted">Data proyek yang sedang atau telah dilaksanakan</p>
            </div>

            @forelse ($proyek as $item)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4 class="card-title fw-bold mb-2">{{ $item->nama_proyek }}</h4>
                        <p class="text-muted mb-2">
                            <strong>Kode Proyek:</strong> {{ $item->kode_proyek }} <br>
                            <strong>Tahun:</strong> {{ $item->tahun }} <br>
                            <strong>Lokasi:</strong> {{ $item->lokasi }}
                        </p>

                        <p><strong>Anggaran:</strong> Rp {{ number_format($item->anggaran, 0, ',', '.') }}</p>
                        <p><strong>Sumber Dana:</strong> {{ $item->sumber_dana }}</p>
                        <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('proyek.edit', $item->proyek_id) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('proyek.destroy', $item->proyek_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus proyek ini?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">
                    Belum ada data proyek yang ditambahkan.
                </div>
            @endforelse
        </div>
    </section>
</main>
@endsection
