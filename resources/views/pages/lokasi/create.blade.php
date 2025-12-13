@extends('layouts.guest.app')

@section('title', 'Tambah Lokasi Proyek')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Lokasi Proyek</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('lokasi.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="proyek_id" class="form-label">Pilih Proyek <span class="text-danger">*</span></label>
                                <select name="proyek_id" id="proyek_id" 
                                        class="form-select @error('proyek_id') is-invalid @enderror" 
                                        required>
                                    <option value="">-- Pilih Proyek --</option>
                                    @foreach($proyekTanpaLokasi as $proyek)
                                    <option value="{{ $proyek->proyek_id }}" 
                                            {{ old('proyek_id') == $proyek->proyek_id ? 'selected' : '' }}>
                                        {{ $proyek->kode_proyek }} - {{ $proyek->nama_proyek }} ({{ $proyek->tahun }})
                                    </option>
                                    @endforeach
                                </select>
                                @error('proyek_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($proyekTanpaLokasi->isEmpty())
                                <div class="alert alert-warning mt-2">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Semua proyek sudah memiliki lokasi.
                                </div>
                                @endif
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="nama_lokasi" class="form-label">Nama Lokasi <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="nama_lokasi" 
                                       id="nama_lokasi" 
                                       class="form-control @error('nama_lokasi') is-invalid @enderror" 
                                       value="{{ old('nama_lokasi') }}"
                                       placeholder="Contoh: Area Finishing Jakarta Utara"
                                       required>
                                @error('nama_lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lat" class="form-label">Latitude</label>
                                <input type="number" 
                                       step="0.000001"
                                       name="lat" 
                                       id="lat" 
                                       class="form-control @error('lat') is-invalid @enderror" 
                                       value="{{ old('lat') }}"
                                       placeholder="-6.208763">
                                @error('lat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lng" class="form-label">Longitude</label>
                                <input type="number" 
                                       step="0.000001"
                                       name="lng" 
                                       id="lng" 
                                       class="form-control @error('lng') is-invalid @enderror" 
                                       value="{{ old('lng') }}"
                                       placeholder="106.845599">
                                @error('lng')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="geojson" class="form-label">GeoJSON Data</label>
                                <textarea name="geojson" 
                                          id="geojson" 
                                          class="form-control @error('geojson') is-invalid @enderror" 
                                          rows="4"
                                          placeholder='{"type": "Feature", "properties": {}, "geometry": { "type": "Point", "coordinates": [106.845599, -6.208763] }}'>{{ old('geojson') }}</textarea>
                                @error('geojson')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary" {{ $proyekTanpaLokasi->isEmpty() ? 'disabled' : '' }}>
                                <i class="fas fa-save me-1"></i> Simpan Lokasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection