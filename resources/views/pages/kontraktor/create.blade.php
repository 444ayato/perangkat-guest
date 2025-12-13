@extends('layouts.guest.app')

@section('title', 'Tambah Kontraktor')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Kontraktor Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kontraktor.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nama_kontraktor" class="form-label">Nama Perusahaan Kontraktor <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="nama_kontraktor" 
                                       id="nama_kontraktor" 
                                       class="form-control @error('nama_kontraktor') is-invalid @enderror" 
                                       value="{{ old('nama_kontraktor') }}"
                                       placeholder="Contoh: PT. Bangun Jaya Abadi"
                                       required>
                                @error('nama_kontraktor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="penanggung_jawab" class="form-label">Penanggung Jawab <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="penanggung_jawab" 
                                       id="penanggung_jawab" 
                                       class="form-control @error('penanggung_jawab') is-invalid @enderror" 
                                       value="{{ old('penanggung_jawab') }}"
                                       placeholder="Nama direktur/pimpinan"
                                       required>
                                @error('penanggung_jawab')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="text" 
                                       name="npwp" 
                                       id="npwp" 
                                       class="form-control @error('npwp') is-invalid @enderror" 
                                       value="{{ old('npwp') }}"
                                       placeholder="00.000.000.0-000.000">
                                @error('npwp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="kontak" class="form-label">Kontak Utama</label>
                                <input type="text" 
                                       name="kontak" 
                                       id="kontak" 
                                       class="form-control @error('kontak') is-invalid @enderror" 
                                       value="{{ old('kontak') }}"
                                       placeholder="0812-3456-7890">
                                @error('kontak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="telepon" class="form-label">Telepon Kantor</label>
                                <input type="text" 
                                       name="telepon" 
                                       id="telepon" 
                                       class="form-control @error('telepon') is-invalid @enderror" 
                                       value="{{ old('telepon') }}"
                                       placeholder="021-1234567">
                                @error('telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" 
                                       name="email" 
                                       id="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}"
                                       placeholder="kontak@perusahaan.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat" 
                                          id="alamat" 
                                          class="form-control @error('alamat') is-invalid @enderror" 
                                          rows="3"
                                          required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Kontraktor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection