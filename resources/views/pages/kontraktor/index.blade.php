@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Data Kontraktor</h2>

    <a href="{{ route('kontraktor.create') }}" class="btn btn-primary mb-3">
        + Tambah Kontraktor
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proyek</th>
                <th>Nama Kontraktor</th>
                <th>Penanggung Jawab</th>
                <th>Kontak</th>
                <th style="width:160px">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kontraktor_id }}</td>
                    <td>{{ $item->proyek->nama }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->penanggung_jawab }}</td>
                    <td>{{ $item->kontak }}</td>

                    <td>
                        <a href="{{ route('kontraktor.show', $item->kontraktor_id) }}"
                           class="btn btn-info btn-sm">Detail</a>

                        <a href="{{ route('kontraktor.edit', $item->kontraktor_id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('kontraktor.destroy', $item->kontraktor_id) }}"
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin ingin hapus?')"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
