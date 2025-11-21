@extends('layouts.guest.app')

@section('content')
<main>
    <section class="section1 py-5">
        <div class="container">

            <div class="text-center mb-4">
                <h2 class="fw-bold">📋 Daftar Proyek</h2>
                <p class="text-muted">Cari dan filter proyek dengan mudah</p>
            </div>

            {{-- FORM SEARCH & FILTER --}}
            <form action="{{ route('proyek.index') }}" method="GET" class="row g-3 mb-4">

                <div class="col-md-4">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="form-control" placeholder="Cari nama proyek / kode proyek">
                </div>

                <div class="col-md-3">
                    <select name="tahun" class="form-control">
                        <option value="">-- Filter Tahun --</option>
                        @foreach ($tahunList as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <input type="text" name="lokasi" class="form-control"
                        placeholder="Filter Lokasi" value="{{ request('lokasi') }}">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Filter</button>
                </div>

            </form>

            {{-- LIST PROYEK --}}
            @forelse ($proyek as $item)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4 class="fw-bold">{{ $item->nama_proyek }}</h4>

                        <p class="text-muted">
                            <strong>Kode:</strong> {{ $item->kode_proyek }} <br>
                            <strong>Tahun:</strong> {{ $item->tahun }} <br>
                            <strong>Lokasi:</strong> {{ $item->lokasi }}
                        </p>

                        <p><strong>Anggaran:</strong> Rp {{ number_format($item->anggaran, 0, ',', '.') }}</p>

                        <p><strong>Sumber Dana:</strong> {{ $item->sumber_dana }}</p>

                        <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('proyek.edit', $item->proyek_id) }}" class="btn btn-warning btn-sm me-2">
                                Edit
                            </a>

                            <form action="{{ route('proyek.destroy', $item->proyek_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin?')">Hapus</button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">Tidak ada data proyek.</div>
            @endforelse

            {{-- PAGINATION --}}
            <div class="mt-4">
                {{ $proyek->links() }}
            </div>

        </div>
    </section>
</main>
@endsection
