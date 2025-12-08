@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Detail Lokasi Proyek</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $data->lokasi_id }}</td>
        </tr>

        <tr>
            <th>Proyek</th>
            <td>{{ $data->proyek->nama }}</td>
        </tr>

        <tr>
            <th>Latitude</th>
            <td>{{ $data->lat }}</td>
        </tr>

        <tr>
            <th>Longitude</th>
            <td>{{ $data->lng }}</td>
        </tr>

        <tr>
            <th>GeoJSON</th>
            <td>
                <pre>{{ $data->geojson }}</pre>
            </td>
        </tr>

        <tr>
            <th>Media</th>
            <td>
                @if($data->media)
                    <img src="{{ asset('storage/'.$data->media) }}" width="300">
                @else
                    <i>Tidak ada gambar</i>
                @endif
            </td>
        </tr>

    </table>

    <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
