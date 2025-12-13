@extends('layouts.guest.app')

@section('title', 'Edit Lokasi: ' . $lokasi->nama_lokasi)

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Lokasi: {{ $lokasi->nama_lokasi }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('lokasi.update', $lokasi->lokasi_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nama_lokasi" class="form-label">Nama Lokasi <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="nama_lokasi" 
                                       id="nama_lokasi" 
                                       class="form-control @error('nama_lokasi') is-invalid @enderror" 
                                       value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}"
                                       required>
                                @error('nama_lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat" 
                                          id="alamat" 
                                          class="form-control @error('alamat') is-invalid @enderror" 
                                          rows="3"
                                          required>{{ old('alamat', $lokasi->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" 
                                       name="latitude" 
                                       id="latitude" 
                                       class="form-control @error('latitude') is-invalid @enderror" 
                                       value="{{ old('latitude', $lokasi->latitude) }}">
                                @error('latitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" 
                                       name="longitude" 
                                       id="longitude" 
                                       class="form-control @error('longitude') is-invalid @enderror" 
                                       value="{{ old('longitude', $lokasi->longitude) }}">
                                @error('longitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="gambar" class="form-label">Gambar Lokasi</label>
                                
                                @if($lokasi->gambar)
                                <div class="mb-3">
                                    <img src="{{ Storage::url($lokasi->gambar) }}" 
                                         alt="Gambar Saat Ini" 
                                         width="150" 
                                         class="rounded me-3 border p-1">
                                    <a href="{{ Storage::url($lokasi->gambar) }}" 
                                       target="_blank" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i> Lihat
                                    </a>
                                </div>
                                @endif

                                <input type="file" 
                                       name="gambar" 
                                       id="gambar" 
                                       class="form-control @error('gambar') is-invalid @enderror"
                                       accept="image/*">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, PNG, GIF (Max: 5MB)
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="geojson" class="form-label">Data GeoJSON (Opsional)</label>
                                <textarea name="geojson" 
                                          id="geojson" 
                                          class="form-control @error('geojson') is-invalid @enderror" 
                                          rows="5">{{ old('geojson', $lokasi->geojson) }}</textarea>
                                @error('geojson')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Update Lokasi
                                </button>
                                <a href="{{ route('lokasi.show', $lokasi->lokasi_id) }}" class="btn btn-info">
                                    <i class="fas fa-eye me-1"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection