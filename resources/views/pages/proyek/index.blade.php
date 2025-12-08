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

            {{-- LIST PROYEK DALAM GRID --}}
            <div class="row">
                @forelse ($proyek as $item)
                    <div class="col-md-4 mb-4"> {{-- 3 card per baris --}}
                        <div class="card shadow-sm h-100 border-0"
                            style="border-radius: 12px;">

                            <div class="card-body">

                                <h4 class="fw-bold text-primary">{{ $item->nama_proyek }}</h4>

                                <p class="text-muted mb-1"><strong>Kode:</strong> {{ $item->kode_proyek }}</p>
                                <p class="text-muted mb-1"><strong>Tahun:</strong> {{ $item->tahun }}</p>
                                <p class="text-muted mb-3"><strong>Lokasi:</strong> {{ $item->lokasi }}</p>

                                <p><strong>Anggaran:</strong> Rp {{ number_format($item->anggaran, 0, ',', '.') }}</p>
                                <p><strong>Sumber Dana:</strong> {{ $item->sumber_dana }}</p>
                                <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>

                                {{-- BUTTON AKSI (SEJAJAR + SAMA LEBAR) --}}
                                <div class="d-flex gap-2 mt-3">

                                    {{-- DETAIL --}}
                                    <a href="{{ route('proyek.show', $item->proyek_id) }}"
                                       class="btn btn-info btn-sm flex-grow-1 text-white">
                                        Detail
                                    </a>

                                    {{-- EDIT --}}
                                    <a href="{{ route('proyek.edit', $item->proyek_id) }}"
                                       class="btn btn-warning btn-sm flex-grow-1">
                                        Edit
                                    </a>

                                    {{-- HAPUS --}}
                                    <form action="{{ route('proyek.destroy', $item->proyek_id) }}"
                                          method="POST" class="flex-grow-1 m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm w-100"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Tidak ada data proyek.
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-4">
                {{ $proyek->links() }}
            </div>

        </div>
    </section>
</main>
@endsection
