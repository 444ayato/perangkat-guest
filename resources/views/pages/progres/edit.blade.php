@extends('layouts.guest.app')

@section('title', 'Edit Progres Proyek')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Progres Proyek</h4>
                </div>
                <div class="card-body">
                    <!-- PERBAIKAN: Gunakan array untuk parameter route -->
                    <form action="{{ route('progres.update', ['progre' => $progres->progress_id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="proyek_id" class="form-label">Pilih Proyek <span class="text-danger">*</span></label>
                                <select name="proyek_id" id="proyek_id" class="form-select @error('proyek_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Proyek --</option>
                                    @foreach($proyeks as $proyek)
                                        <option value="{{ $proyek->proyek_id }}" 
                                            {{ old('proyek_id', $progres->proyek_id) == $proyek->proyek_id ? 'selected' : '' }}>
                                            {{ $proyek->nama_proyek }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('proyek_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tahap_id" class="form-label">Pilih Tahapan <span class="text-danger">*</span></label>
                                <select name="tahap_id" id="tahap_id" class="form-select @error('tahap_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Tahapan --</option>
                                    @foreach($tahapans as $tahapan)
                                        <option value="{{ $tahapan->tahap_id }}" 
                                            {{ old('tahap_id', $progres->tahap_id) == $tahapan->tahap_id ? 'selected' : '' }}>
                                            {{ $tahapan->nama_tahapan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tahap_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="persen_real" class="form-label">Persentase Realisasi (%) <span class="text-danger">*</span></label>
                                <input type="number" 
                                       name="persen_real" 
                                       id="persen_real" 
                                       class="form-control @error('persen_real') is-invalid @enderror" 
                                       min="0" 
                                       max="100" 
                                       step="0.01"
                                       value="{{ old('persen_real', $progres->persen_real) }}"
                                       required>
                                @error('persen_real')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" 
                                       name="tanggal" 
                                       id="tanggal" 
                                       class="form-control @error('tanggal') is-invalid @enderror" 
                                       value="{{ old('tanggal', $progres->tanggal ? \Carbon\Carbon::parse($progres->tanggal)->format('Y-m-d') : '') }}"
                                       required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea name="catatan" 
                                          id="catatan" 
                                          class="form-control @error('catatan') is-invalid @enderror" 
                                          rows="3">{{ old('catatan', $progres->catatan) }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="foto_progres" class="form-label">Foto Progres</label>
                                
                                @if($progres->foto_progres)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $progres->foto_progres) }}" 
                                             alt="Foto Saat Ini" 
                                             width="150" 
                                             class="rounded me-3 border p-1">
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $progres->foto_progres) }}" 
                                               target="_blank" 
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye me-1"></i> Lihat Full Size
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                <input type="file" 
                                       name="foto_progres" 
                                       id="foto_progres" 
                                       class="form-control @error('foto_progres') is-invalid @enderror"
                                       accept="image/*">
                                @error('foto_progres')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    Biarkan kosong jika tidak ingin mengubah foto. Format: JPG, PNG (Max: 2MB)
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('progres.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Update Data
                                </button>
                                <a href="{{ route('progres.show', ['progre' => $progres->progress_id]) }}" class="btn btn-info">
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