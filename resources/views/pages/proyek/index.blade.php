@extends('layouts.guest.app')

@section('title', 'Daftar Proyek')

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2"><i class="fas fa-project-diagram text-primary me-2"></i>Daftar Proyek</h1>
            <p class="text-muted mb-0">Kelola dan pantau seluruh proyek pembangunan</p>
        </div>
        <div>
            <a href="{{ route('proyek.create') }}" class="btn btn-primary">
                <i class="bi bi-plus me-1"></i> Tambah Proyek
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="card-title mb-0">Total Proyek</h5>
                            <h2 class="mb-0">{{ $totalProyek ?? '0' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon">
                            <i class="fas fa-money-bill-wave fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="card-title mb-0">Total Anggaran</h5>
                            <h2 class="mb-0">Rp {{ number_format($totalAnggaran ?? 0, 0, ',', '.') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon">
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="card-title mb-0">Rata-rata Progress</h5>
                            <h2 class="mb-0">{{ $rataProgress ?? '0' }}%</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-alt fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="card-title mb-0">Tahun Ini</h5>
                            <h2 class="mb-0">{{ $proyekTahunIni ?? '0' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filter & Search -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('proyek.index') }}" class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Cari proyek..." 
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <select name="tahun" class="form-select">
                        <option value="">Semua Tahun</option>
                        @foreach ($tahunList ?? [] as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="lokasi" class="form-select">
                        <option value="">Semua Lokasi</option>
                        @foreach ($lokasiList ?? [] as $lokasi)
                            <option value="{{ $lokasi->nama_lokasi }}" {{ request('lokasi') == $lokasi->nama_lokasi ? 'selected' : '' }}>
                                {{ $lokasi->nama_lokasi }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="kontraktor" class="form-select">
                        <option value="">Semua Kontraktor</option>
                        @foreach ($kontraktorList ?? [] as $kontraktor)
                            <option value="{{ $kontraktor->kontraktor_id }}" {{ request('kontraktor') == $kontraktor->kontraktor_id ? 'selected' : '' }}>
                                {{ $kontraktor->nama_kontraktor }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="sort" class="form-select">
                        <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                        <option value="anggaran_tertinggi" {{ request('sort') == 'anggaran_tertinggi' ? 'selected' : '' }}>Anggaran Tertinggi</option>
                        <option value="anggaran_terendah" {{ request('sort') == 'anggaran_terendah' ? 'selected' : '' }}>Anggaran Terendah</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- View Toggle -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="btn-group" role="group">
            <button type="button" id="viewGrid" class="btn btn-outline-primary active">
                <i class="fas fa-th-large"></i> Grid
            </button>
            <button type="button" id="viewTable" class="btn btn-outline-primary">
                <i class="fas fa-table"></i> Table
            </button>
        </div>
        <div class="text-muted">
            Menampilkan {{ $proyek->count() }} dari {{ $proyek->total() }} proyek
        </div>
    </div>

    <!-- Grid View -->
    <div id="gridView" class="row">
        @forelse ($proyek as $item)
        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card project-card h-100">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-primary">{{ $item->kode_proyek }}</span>
                        @if($item->tahun == date('Y'))
                            <span class="badge bg-success">Baru</span>
                        @endif
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-link text-dark" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('proyek.show', $item->proyek_id) }}">
                                <i class="fas fa-eye me-2"></i>Detail
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('proyek.edit', $item->proyek_id) }}">
                                <i class="fas fa-edit me-2"></i>Edit
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('proyek.destroy', $item->proyek_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger" 
                                            onclick="return confirm('Hapus proyek ini?')">
                                        <i class="fas fa-trash me-2"></i>Hapus
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $item->nama_proyek }}</h5>
                    
                    <div class="project-info mb-3">
                        <div class="info-item">
                            <i class="fas fa-calendar me-2 text-muted"></i>
                            <span>{{ $item->tahun }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt me-2 text-muted"></i>
                            <span>{{ $item->lokasi }}</span>
                        </div>
                        @if($item->kontraktor)
                        <div class="info-item">
                            <i class="fas fa-hard-hat me-2 text-muted"></i>
                            <span>{{ $item->kontraktor->nama_kontraktor }}</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="progress mb-3" style="height: 8px;">
                        @php
                            $progress = $item->progres->last()->persen_real ?? 0;
                            $color = match(true) {
                                $progress >= 80 => 'success',
                                $progress >= 50 => 'warning',
                                default => 'danger'
                            };
                        @endphp
                        <div class="progress-bar bg-{{ $color }}" style="width: {{ $progress }}%"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <small class="text-muted">{{ $progress }}% Selesai</small>
                        <small class="text-muted">{{ $item->progres->count() ?? 0 }} Update</small>
                    </div>
                    
                    <div class="budget-section mb-3">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Anggaran:</span>
                            <span class="fw-bold text-success">Rp {{ number_format($item->anggaran, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    <p class="card-text text-muted small mb-3">
                        {{ Str::limit($item->deskripsi, 100) }}
                    </p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </small>
                        <a href="{{ route('proyek.show', $item->proyek_id) }}" class="btn btn-sm btn-outline-primary">
                            Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-project-diagram fa-4x text-muted mb-4"></i>
                        <h4 class="text-muted mb-3">Belum ada data proyek</h4>
                        <p class="text-muted mb-4">Tambahkan proyek untuk mulai mengelola pembangunan</p>
                        <a href="{{ route('proyek.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Tambah Proyek Pertama
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Table View (Hidden by Default) -->
    <div id="tableView" class="d-none">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Proyek</th>
                                <th>Tahun</th>
                                <th>Lokasi</th>
                                <th>Kontraktor</th>
                                <th>Anggaran</th>
                                <th>Progress</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proyek as $index => $item)
                            <tr>
                                <td>{{ $loop->iteration + ($proyek->currentPage() - 1) * $proyek->perPage() }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $item->kode_proyek }}</span>
                                </td>
                                <td>
                                    <strong>{{ $item->nama_proyek }}</strong>
                                    <br><small class="text-muted">{{ Str::limit($item->deskripsi, 50) }}</small>
                                </td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>
                                    @if($item->kontraktor)
                                        <span class="badge bg-info">{{ $item->kontraktor->nama_kontraktor }}</span>
                                    @else
                                        <span class="badge bg-secondary">Belum ada</span>
                                    @endif
                                </td>
                                <td class="fw-bold text-success">
                                    Rp {{ number_format($item->anggaran, 0, ',', '.') }}
                                </td>
                                <td>
                                    @php
                                        $progress = $item->progres->last()->persen_real ?? 0;
                                    @endphp
                                    <div class="d-flex align-items-center">
                                        <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                            <div class="progress-bar bg-success" style="width: {{ $progress }}%"></div>
                                        </div>
                                        <small>{{ $progress }}%</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('proyek.show', $item->proyek_id) }}" 
                                           class="btn btn-sm btn-info" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('proyek.edit', $item->proyek_id) }}" 
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('proyek.destroy', $item->proyek_id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Hapus proyek ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @if($proyek->hasPages())
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($proyek->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $proyek->previousPageUrl() }}" rel="prev">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($proyek->getUrlRange(1, $proyek->lastPage()) as $page => $url)
                    @if ($page == $proyek->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($proyek->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $proyek->nextPageUrl() }}" rel="next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    @endif
</div>

<style>
    .stat-card {
        border: none;
        border-radius: 12px;
        transition: transform 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
    }
    
    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .project-card {
        border: 1px solid #e9ecef;
        border-radius: 12px;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .project-card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        transform: translateY(-5px);
        border-color: #0d6efd;
    }
    
    .project-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        font-size: 14px;
    }
    
    .empty-state {
        max-width: 400px;
        margin: 0 auto;
    }
    
    .btn-group .btn.active {
        background-color: #0d6efd;
        color: white;
        border-color: #0d6efd;
    }
    
    .table th {
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #e9ecef;
    }
    
    .table td {
        vertical-align: middle;
    }
    
    .progress {
        border-radius: 10px;
    }
    
    .progress-bar {
        border-radius: 10px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // View Toggle
        const viewGrid = document.getElementById('viewGrid');
        const viewTable = document.getElementById('viewTable');
        const gridView = document.getElementById('gridView');
        const tableView = document.getElementById('tableView');
        
        viewGrid.addEventListener('click', function() {
            viewGrid.classList.add('active');
            viewTable.classList.remove('active');
            gridView.classList.remove('d-none');
            tableView.classList.add('d-none');
        });
        
        viewTable.addEventListener('click', function() {
            viewTable.classList.add('active');
            viewGrid.classList.remove('active');
            tableView.classList.remove('d-none');
            gridView.classList.add('d-none');
        });
        
        // Progress bar animation
        const progressBars = document.querySelectorAll('.progress-bar');
        progressBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
                bar.style.transition = 'width 1s ease';
            }, 300);
        });
    });
</script>
@endsection