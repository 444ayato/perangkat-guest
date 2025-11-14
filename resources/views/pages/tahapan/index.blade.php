@extends('layouts.guest.app')

@section('content')
    <div class="container py-5">
        {{-- Menggunakan row dan col untuk membatasi lebar dan memusatkan konten --}}
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <h3 class="fw-bold mb-4 text-center">Data Tahapan Proyek</h3>
                <hr>

                <a href="{{ route('tahapan.create') }}" class="btn btn-primary mb-3">Tambah Tahapan</a>

                <div class="table-responsive shadow-sm">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Proyek</th>
                                <th>Nama Tahap</th>
                                <th class="text-center">Target %</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl Selesai</th>
                                <th class="text-center" style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->proyek->nama_proyek }}</td>
                                    <td>{{ $d->nama_tahap }}</td>
                                    <td class="text-center">{{ $d->target_persen }}%</td>
                                    <td>{{ $d->tgl_mulai }}</td>
                                    <td>{{ $d->tgl_selesai }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('tahapan.edit', $d->tahap_id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('tahapan.destroy', $d->tahap_id) }}" method="POST"
                                                class="d-inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus tahapan ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
