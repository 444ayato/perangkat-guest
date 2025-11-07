@extends('layouts.guest.app')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">📋 Daftar User</h3>
        <a href="{{ route('users.create') }}" class="btn btn-primary shadow-sm">
            <i class="fa fa-plus"></i> Tambah User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mb-5">
        @forelse ($users as $user)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100 user-card" style="transition: all 0.3s ease;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fa fa-user-circle text-primary" style="font-size: 70px;"></i>
                        </div>

                        <h5 class="fw-bold mb-1 text-capitalize">{{ $user->name }}</h5>
                        <p class="text-muted mb-4">{{ $user->email }}</p>

                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning px-3 shadow-sm">
                                <i class="fa fa-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger px-3 shadow-sm">
                                    <i class="fa fa-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center shadow-sm">
                    Belum ada user yang ditambahkan.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Bagian teks penutup --}}
    <div class="text-center mt-5 mb-4">
        <hr class="mx-auto" style="width: 60px; border: 2px solid #0d6efd; border-radius: 5px;">
        <p class="text-muted mt-3" style="font-size: 15px;">
        </p>
    </div>
</div>

<style>
.user-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}
.user-card i {
    transition: 0.3s;
}
.user-card:hover i {
    color: #0d6efd;
    transform: scale(1.1);
}
</style>
@endsection
