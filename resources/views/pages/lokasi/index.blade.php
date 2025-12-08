@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Data Lokasi Proyek</h2>

    <a href="{{ route('lokasi.create') }}" class="btn btn-primary mb-3">
        + Tambah Lokasi
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proyek</th>
                <th>Lat</th>
                <th>Lng</th>
                <th>GeoJSON</th>
                <th style="width:160px">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->lokasi_id }}</td>
                    <td>{{ $item->proyek->nama }}</td>
                    <td>{{ $item->lat }}</td>
                    <td>{{ $item->lng }}</td>
                    <td>{{ Str::limit($item->geojson, 40) }}</td>

                    <td>
                        <a href="{{ route('lokasi.show', $item->lokasi_id) }}" class="btn btn-info btn-sm">Detail</a>

                        <a href="{{ route('lokasi.edit', $item->lokasi_id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('lokasi.destroy', $item->lokasi_id) }}" method="POST" class="d-inline">
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

