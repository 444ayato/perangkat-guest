@extends('layouts.guest.app')

@section('title', 'Data Kontraktor')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-hard-hat me-2"></i>Data Kontraktor</h1>
        <a href="{{ route('kontraktor.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Kontraktor
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kontraktor</th>
                            <th>Penanggung Jawab</th>
                            <th>Kontak</th>
                            <th>NPWP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kontraktors as $kontraktor)
                        <tr>
                            <td>{{ $loop->iteration + ($kontraktors->currentPage() - 1) * $kontraktors->perPage() }}</td>
                            <td>
                                <strong>{{ $kontraktor->nama_kontraktor }}</strong>
                            </td>
                            <td>{{ $kontraktor->penanggung_jawab }}</td>
                            <td>
                                @if($kontraktor->kontak)
                                    <i class="fas fa-phone me-1"></i> {{ $kontraktor->kontak }}
                                @endif
                                @if($kontraktor->email)
                                    <br><i class="fas fa-envelope me-1"></i> {{ $kontraktor->email }}
                                @endif
                            </td>
                            <td>{{ $kontraktor->npwp ?? '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('kontraktor.show', $kontraktor->kontraktor_id) }}" 
                                       class="btn btn-sm btn-info" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('kontraktor.edit', $kontraktor->kontraktor_id) }}" 
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('kontraktor.destroy', $kontraktor->kontraktor_id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Hapus kontraktor ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-hard-hat fa-2x mb-3"></i>
                                    <p>Belum ada data kontraktor</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $kontraktors->links() }}
            </div>
        </div>
    </div>
</div>
@endsection