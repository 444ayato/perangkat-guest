@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Lokasi Proyek</h2>

    <form action="{{ route('lokasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                <option value="">-- pilih proyek --</option>
                @foreach ($proyek as $p)
                    <option value="{{ $p->proyek_id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="lat" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="lng" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>GeoJSON (opsional)</label>
            <textarea name="geojson" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Upload Gambar/Peta (opsional)</label>
            <input type="file" name="media" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
