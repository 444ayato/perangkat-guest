@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Lokasi Proyek</h2>

    <form action="{{ route('lokasi.update', $data->lokasi_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                @foreach ($proyek as $p)
                    <option value="{{ $p->proyek_id }}"
                       {{ $data->proyek_id == $p->proyek_id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="lat" class="form-control" value="{{ $data->lat }}" required>
        </div>

        <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="lng" class="form-control" value="{{ $data->lng }}" required>
        </div>

        <div class="mb-3">
            <label>GeoJSON</label>
            <textarea name="geojson" class="form-control">{{ $data->geojson }}</textarea>
        </div>

        <div class="mb-3">
            <label>Upload Gambar/Peta Baru (opsional)</label>
            <input type="file" name="media" class="form-control">
        </div>

        @if($data->media)
            <div class="mb-3">
                <label>File Lama:</label><br>
                <img src="{{ asset('storage/'.$data->media) }}" width="200">
            </div>
        @endif

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
