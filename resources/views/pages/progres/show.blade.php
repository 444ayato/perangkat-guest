@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Detail Progres Proyek</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $data->progres_id }}</td>
        </tr>
        <tr>
            <th>Proyek</th>
            <td>{{ $data->proyek->nama }}</td>
        </tr>
        <tr>
            <th>Tahapan</th>
            <td>{{ $data->tahap->nama }}</td>
        </tr>
        <tr>
            <th>Persen Real</th>
            <td>{{ $data->persen_real }} %</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $data->tanggal }}</td>
        </tr>
        <tr>
            <th>Catatan</th>
            <td>{{ $data->catatan }}</td>
        </tr>
    </table>

    <a href="{{ route('progres.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
