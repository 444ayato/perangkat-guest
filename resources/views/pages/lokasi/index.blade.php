@extends('layouts.guest.app')

@section('title', 'Data Lokasi Proyek')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2"><i class="fas fa-map-marker-alt text-primary me-2"></i>Data Lokasi Proyek</h1>
            <p class="text-muted mb-0">Kelola lokasi geografis seluruh proyek pembangunan</p>
        </div>
        <div>
            <a href="{{ route('lokasi.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Tambah Lokasi
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
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="card-title mb-0">Lokasi Terdata</h5>
                            <h2 class="mb-0">{{ $totalLokasi ?? '0' }}</h2>
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
            <div class="card stat-card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon">
                            <i class="fas fa-map-signs fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="card-title mb-0">Tanpa Lokasi</h5>
                            <h2 class="mb-0">{{ $proyekTanpaLokasi ?? '0' }}</h2>
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
                            <i class="fas fa-percentage fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="card-title mb-0">Coverage</h5>
                            <h2 class="mb-0">
                                @if($totalProyek > 0)
                                    {{ round(($totalLokasi / $totalProyek) * 100, 1) }}%
                                @else
                                    0%
                                @endif
                            </h2>
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

    <!-- Search -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('lokasi.index') }}" class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama lokasi atau nama proyek..."
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <select name="sort" class="form-select">
                        <option value="nama_lokasi" {{ request('sort') == 'nama_lokasi' ? 'selected' : '' }}>Urutkan Nama</option>
                        <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Urutkan Tanggal</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i> Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card shadow-sm">
        <div class="card-body">
            @if($lokasis->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Lokasi</th>
                                <th>Proyek Terkait</th>
                                <th>Koordinat</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lokasis as $lokasi)
                            <tr>
                                <td>{{ $loop->iteration + ($lokasis->currentPage() - 1) * $lokasis->perPage() }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="location-icon me-3">
                                            <i class="fas fa-map-marker-alt fa-lg text-primary"></i>
                                        </div>
                                        <div>
                                            <strong>{{ $lokasi->nama_lokasi }}</strong>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($lokasi->proyek)
                                        <div>
                                            <strong>{{ $lokasi->proyek->nama_proyek }}</strong>
                                            <br>
                                            <small class="text-muted">
                                                {{ $lokasi->proyek->kode_proyek }} •
                                                {{ $lokasi->proyek->tahun }}
                                            </small>
                                        </div>
                                    @else
                                        <span class="text-danger">Proyek tidak ditemukan</span>
                                    @endif
                                </td>
                                <td>
                                    @if($lokasi->lat && $lokasi->lng)
                                        <span class="badge bg-success">
                                            <i class="fas fa-map-pin me-1"></i>
                                            {{ number_format($lokasi->lat, 6) }}, {{ number_format($lokasi->lng, 6) }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="fas fa-question-circle me-1"></i>
                                            Tidak ada koordinat
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $lokasi->created_at->format('d/m/Y') }}
                                    <br><small class="text-muted">{{ $lokasi->created_at->format('H:i') }}</small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('lokasi.show', $lokasi->lokasi_id) }}"
                                           class="btn btn-sm btn-info" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('lokasi.edit', $lokasi->lokasi_id) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('lokasi.destroy', $lokasi->lokasi_id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Hapus lokasi ini?')">
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

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $lokasis->links() }}
                </div>
            @else
                <!-- No Data State -->
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-map-marker-alt fa-4x text-muted mb-4"></i>
                        <h4 class="text-muted mb-3">Belum ada data lokasi proyek</h4>
                        <p class="text-muted mb-4">Tambahkan lokasi untuk proyek-proyek yang sedang berjalan</p>
                        <a href="{{ route('lokasi.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Tambah Lokasi Pertama
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

<!-- Recent Projects -->
@if(isset($recentProjects) && $recentProjects->count() > 0)
<div class="card shadow-sm mt-4">
    <div class="card-header bg-light">
        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Proyek Terbaru</h5>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($recentProjects as $project)
            <div class="col-md-4 mb-3">
                <div class="project-card card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h6 class="card-title mb-0">{{ Str::limit($project->nama_proyek, 30) }}</h6>
                            <span class="badge {{ $project->lokasi ? 'bg-success' : 'bg-warning' }}">
                                @if($project->lokasi)
                                    <i class="fas fa-map-marker-alt"></i>
                                @else
                                    <i class="fas fa-map-signs"></i>
                                @endif
                            </span>
                        </div>
                        <p class="card-text text-muted small mb-2">
                            <i class="fas fa-calendar me-1"></i> {{ $project->tahun }}
                            <br>
                            <i class="fas fa-money-bill-wave me-1"></i> Rp {{ number_format($project->anggaran, 0, ',', '.') }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                @if($project->lokasi)
                                    {{ $project->lokasi->nama_lokasi ?? 'Tidak ada nama lokasi' }}
                                @else
                                    <span class="text-warning">Belum ada lokasi</span>
                                @endif
                            </small>
                            <a href="{{ route('proyek.show', $project->proyek_id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-external-link-alt fa-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
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

    .location-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: #f0f7ff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-state {
        max-width: 400px;
        margin: 0 auto;
    }

    .project-card {
        border: 1px solid #e9ecef;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .project-card:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transform: translateY(-3px);
    }
</style>
@endsection
