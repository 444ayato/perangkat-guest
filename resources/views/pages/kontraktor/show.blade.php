@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Detail Kontraktor</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $data->kontraktor_id }}</td>
        </tr>

        <tr>
            <th>Proyek</th>
            <td>{{ $data->proyek->nama }}</td>
        </tr>

        <tr>
            <th>Nama Kontraktor</th>
            <td>{{ $data->nama }}</td>
        </tr>

        <tr>
            <th>Penanggung Jawab</th>
            <td>{{ $data->penanggung_jawab }}</td>
        </tr>

        <tr>
            <th>Kontak</th>
            <td>{{ $data->kontak }}</td>
        </tr>

        <tr>
            <th>Alamat</th>
            <td>{{ $data->alamat }}</td>
        </tr>
    </table>

    <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
