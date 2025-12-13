@extends('layouts.guest.app')

@section('title', 'Progres Proyek')

@section('content')
<div class="container-fluid py-4">
    <!-- Header yang lebih bersih -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="mb-2 text-dark">
                                <i class="fas fa-chart-line text-primary me-2"></i>Monitoring Progress Proyek
                            </h1>
                            <p class="text-muted mb-0">
                                Pantau perkembangan proyek dengan visualisasi yang jelas
                            </p>
                        </div>
                        <a href="{{ route('progres.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus-circle me-2"></i> Tambah Progress
                        </a>
                    </div>
                    
                    <!-- Filter Section -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <form method="GET" action="{{ route('progres.index') }}" class="row g-3">
                                <div class="col-md-3">
                                    <select name="proyek_id" class="form-select border-primary">
                                        <option value="">Semua Proyek</option>
                                        @foreach($proyeks as $proyek)
                                            <option value="{{ $proyek->proyek_id }}" {{ request('proyek_id') == $proyek->proyek_id ? 'selected' : '' }}>
                                                {{ $proyek->nama_proyek }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-2">
                                    <input type="date" 
                                           name="start_date" 
                                           class="form-control border-primary" 
                                           value="{{ request('start_date') }}"
                                           placeholder="Dari Tanggal">
                                </div>
                                
                                <div class="col-md-2">
                                    <input type="date" 
                                           name="end_date" 
                                           class="form-control border-primary" 
                                           value="{{ request('end_date') }}"
                                           placeholder="Sampai Tanggal">
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-primary border-end-0">
                                            <i class="fas fa-search text-muted"></i>
                                        </span>
                                        <input type="text" 
                                               name="search" 
                                               class="form-control border-start-0 border-primary" 
                                               placeholder="Cari proyek/tahapan..."
                                               value="{{ request('search') }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fas fa-filter me-1"></i> Filter
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabel Progres -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom-0 py-3">
            <h5 class="mb-0">
                <i class="fas fa-list-alt me-2 text-primary"></i>Riwayat Progres Proyek
                <span class="badge bg-primary ms-2">{{ $progres->total() }} Data</span>
            </h5>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="50" class="text-center">No</th>
                            <th>Proyek</th>
                            <th>Tahapan</th>
                            <th width="150">Progress</th>
                            <th width="120">Tanggal</th>
                            <th width="150">Foto</th>
                            <th width="180" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($progres as $item)
                        <tr>
                            <td class="text-center fw-semibold text-muted">
                                {{ $loop->iteration + ($progres->currentPage() - 1) * $progres->perPage() }}
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                                            <i class="fas fa-building text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">{{ $item->proyek->nama_proyek ?? '-' }}</h6>
                                        <small class="text-muted">
                                            {{ $item->proyek->kode_proyek ?? 'No Code' }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info border border-info">
                                    <i class="fas fa-layer-group me-1"></i>
                                    {{ $item->tahapan->nama_tahapan ?? '-' }}
                                </span>
                            </td>
                            
                            <td>
                                <div class="progress-wrapper">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="fw-semibold">{{ $item->persen_real }}%</span>
                                        <small class="text-muted">Realisasi</small>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar 
                                            @if($item->persen_real >= 80) bg-success
                                            @elseif($item->persen_real >= 50) bg-warning
                                            @else bg-danger
                                            @endif" 
                                            role="progressbar" 
                                            style="width: {{ $item->persen_real }}%"
                                            aria-valuenow="{{ $item->persen_real }}" 
                                            aria-valuemin="0" 
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="fw-semibold">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</span>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->diffForHumans() }}
                                    </small>
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($item->foto_progres)
                                        <div class="me-3">
                                            <img src="{{ Storage::url($item->foto_progres) }}" 
                                                 alt="Foto Progres" 
                                                 class="rounded shadow-sm"
                                                 width="60" 
                                                 height="60"
                                                 style="object-fit: cover; cursor: pointer;"
                                                 onclick="showImageModal('{{ Storage::url($item->foto_progres) }}', '{{ $item->proyek->nama_proyek ?? 'Foto Progres' }}')">
                                        </div>
                                        <a href="{{ Storage::url($item->foto_progres) }}" 
                                           target="_blank" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-expand"></i>
                                        </a>
                                    @else
                                        <div class="text-center py-2">
                                            <div class="bg-light rounded-circle p-3 d-inline-block mb-2">
                                                <i class="fas fa-image text-muted fa-lg"></i>
                                            </div>
                                            <p class="text-muted small mb-0">Tidak ada foto</p>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Detail Button -->
                                    <a href="{{ route('progres.show', $item->progress_id) }}" 
                                       class="btn btn-sm btn-info rounded-circle d-flex align-items-center justify-content-center"
                                       style="width: 40px; height: 40px;"
                                       title="Detail"
                                       data-bs-toggle="tooltip">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    
                                    <!-- Edit Button -->
                                    <a href="{{ route('progres.edit', $item->progress_id) }}" 
                                       class="btn btn-sm btn-warning rounded-circle d-flex align-items-center justify-content-center"
                                       style="width: 40px; height: 40px;"
                                       title="Edit"
                                       data-bs-toggle="tooltip">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('progres.destroy', $item->progress_id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;"
                                                title="Hapus"
                                                data-bs-toggle="tooltip">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="empty-state">
                                    <div class="empty-state-icon mb-3">
                                        <i class="fas fa-inbox fa-3x text-muted"></i>
                                    </div>
                                    <h5 class="text-muted mb-2">Belum ada data progres</h5>
                                    <p class="text-muted">Mulai dengan menambahkan progres proyek pertama Anda</p>
                                    <a href="{{ route('progres.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus me-2"></i> Tambah Progres Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($progres->hasPages())
            <div class="card-footer bg-white border-top-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted small">
                        Menampilkan {{ $progres->firstItem() }} - {{ $progres->lastItem() }} dari {{ $progres->total() }} data
                    </div>
                    <div>
                        {{ $progres->withQueryString()->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal for Image Preview -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Preview Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="" class="img-fluid rounded">
            </div>
            <div class="modal-footer">
                <a href="#" id="downloadImage" class="btn btn-primary" download>
                    <i class="fas fa-download me-2"></i> Download
                </a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Clean Professional Style */
    .card {
        border: none;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e9ecef;
        padding: 1rem 0.75rem;
        background-color: #f8f9fa;
    }
    
    .table td {
        padding: 1rem 0.75rem;
        vertical-align: middle;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .table tbody tr {
        transition: all 0.2s ease;
    }
    
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .progress-wrapper {
        min-width: 150px;
    }
    
    .progress {
        border-radius: 10px;
        overflow: hidden;
        background-color: #e9ecef;
    }
    
    .progress-bar {
        border-radius: 10px;
        transition: width 0.6s ease;
    }
    
    .empty-state {
        padding: 3rem 1rem;
    }
    
    .empty-state-icon {
        opacity: 0.5;
    }
    
    .btn-circle {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }
    
    .badge {
        font-weight: 500;
        padding: 0.4em 0.8em;
    }
    
    .bg-opacity-10 {
        opacity: 0.1;
    }
    
    .border-primary {
        border-color: #0d6efd !important;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    /* Clean button styles */
    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    
    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }
    
    .btn-outline-primary {
        color: #0d6efd;
        border-color: #0d6efd;
    }
    
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
</style>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
    
    // Function to show image in modal
    function showImageModal(imageSrc, title) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModalLabel').textContent = title;
        document.getElementById('downloadImage').href = imageSrc;
        
        var modal = new bootstrap.Modal(document.getElementById('imageModal'));
        modal.show();
    }
    
    // Delete confirmation
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data progres ini?');
    }
    
    // Animate progress bars on page load
    document.addEventListener('DOMContentLoaded', function() {
        const progressBars = document.querySelectorAll('.progress-bar');
        progressBars.forEach(bar => {
            const originalWidth = bar.style.width;
            bar.style.width = '0%';
            
            setTimeout(() => {
                bar.style.transition = 'width 1s ease-in-out';
                bar.style.width = originalWidth;
            }, 100);
        });
    });
</script>
@endsection