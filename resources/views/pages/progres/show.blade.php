@extends('layouts.guest.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Detail Progres Proyek</h4>
                </div>
                <div class="card-body">
                    


                
                    <!-- Informasi Proyek -->
                    <div class="mb-4">
                        <h5>Informasi Proyek</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nama Proyek:</strong> {{ $progres->proyek->nama_proyek ?? 'Tidak ada data' }}</p>
                                <p><strong>Kode Proyek:</strong> {{ $progres->proyek->kode_proyek ?? 'Tidak ada data' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Tanggal Progres:</strong> 
                                    @if($progres->tanggal)
                                        {{ \Carbon\Carbon::parse($progres->tanggal)->format('d-m-Y') }}
                                    @else
                                        <span class="text-muted">Belum diatur</span>
                                    @endif
                                </p>
                                <p><strong>Tahapan:</strong> {{ $progres->tahapan->nama_tahapan ?? 'Tidak ada data' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Progres -->
                    <div class="mb-4">
                        <h5>Detail Progres</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Persentase Real:</strong></p>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar 
                                        @if($progres->persen_real >= 80) bg-success
                                        @elseif($progres->persen_real >= 50) bg-warning
                                        @else bg-danger
                                        @endif" 
                                        role="progressbar" 
                                        style="width: {{ $progres->persen_real ?? 0 }}%;"
                                        aria-valuenow="{{ $progres->persen_real ?? 0 }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100">
                                        {{ $progres->persen_real ?? 0 }}%
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Catatan:</strong></p>
                                <div class="border rounded p-3 bg-light min-height-100">
                                    {{ $progres->catatan ?? 'Tidak ada catatan' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Foto Progres -->
                    @if($progres->foto_progres)
                    <div class="mb-4">
                        <h5>Foto Progres</h5>
                        <hr>
                        <div class="text-center">
                            <img src="{{ asset($progres->foto_progres) }}" 
                            alt="Foto Progres Proyek" 
                            class="img-fluid rounded shadow-sm"
                            style="max-height: 400px;"
                                 alt="Foto Progres Proyek" 
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 400px;">
                            <p class="text-muted mt-2">Foto dokumentasi progres proyek</p>
                        </div>
                    </div>
                    @endif

                    <!-- Informasi Tambahan -->
                    <div class="mb-4">
                        <h5>Informasi Tambahan</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Dibuat Pada:</strong> 
                                    {{ $progres->created_at ? $progres->created_at->format('d-m-Y H:i') : 'N/A' }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Diperbarui Pada:</strong> 
                                    {{ $progres->updated_at ? $progres->updated_at->format('d-m-Y H:i') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('progres.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                        </a>
                        
                        @if(auth()->check() && auth()->user()->role == 'admin')
                        <div>
                            <!-- PERBAIKAN: Kirim parameter yang benar -->
                            <!-- Debug: {{-- $progres->progress_id = ' . $progres->progress_id . ' --}} -->
                            
                            <a href="{{ route('progres.edit', ['progre' => $progres->progress_id]) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('progres.destroy', ['progre' => $progres->progress_id]) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus progres ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
        border: none;
    }
    
    .card-header {
        border-radius: 10px 10px 0 0 !important;
        font-weight: 600;
    }
    
    .progress {
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #dee2e6;
    }
    
    .progress-bar {
        transition: width 0.6s ease;
        font-weight: 600;
    }
    
    .min-height-100 {
        min-height: 100px;
    }
    
    .btn {
        border-radius: 5px;
    }
</style>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@endsection