@extends('layouts.app')

@section('content')
<section class="section1">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">📋 Daftar Proyek Pembangunan</h2>
            <p class="text-muted">Data proyek yang sedang atau telah dilaksanakan</p>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Kode Proyek</th>
                                <th>Nama Proyek</th>
                                <th>Tahun</th>
                                <th>Lokasi</th>
                                <th>Anggaran</th>
                                <th>Sumber Dana</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($proyek as $item)
                                <tr>
                                    <td>{{ $item->proyek_id }}</td>
                                    <td>{{ $item->kode_proyek }}</td>
                                    <td>{{ $item->nama_proyek }}</td>
                                    <td class="text-center">{{ $item->tahun }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td class="text-end">Rp {{ number_format($item->anggaran, 0, ',', '.') }}</td>
                                    <td>{{ $item->sumber_dana }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Belum ada data proyek.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
