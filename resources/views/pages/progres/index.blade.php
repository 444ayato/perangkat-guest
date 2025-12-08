@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2>Daftar Progres Proyek</h2>

    <a href="{{ route('progres.create') }}" class="btn btn-primary mb-3">+ Tambah Progres</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proyek</th>
                <th>Tahap</th>
                <th>Persen Real</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->progres_id }}</td>
                <td>{{ $item->proyek->nama }}</td>
                <td>{{ $item->tahap->nama }}</td>
                <td>{{ $item->persen_real }}%</td>
                <td>{{ $item->tanggal }}</td>
                <td>
                    <a href="{{ route('progres.edit', $item->progres_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('progres.show', $item->progres_id) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
