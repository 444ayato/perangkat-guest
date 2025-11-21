@extends('layouts.guest.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">📋 Daftar User</h3>
        <a href="{{ route('users.create') }}" class="btn btn-primary shadow-sm">
            <i class="fa fa-plus"></i> Tambah User
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- SEARCH FORM --}}
    <form action="{{ route('users.index') }}" method="GET" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control"
                placeholder="Cari nama atau email..."
                value="{{ request('search') }}">
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <div class="row mb-5">
        @forelse ($users as $user)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100 user-card">
                    <div class="card-body text-center p-4">

                        <div class="mb-3">
                            <i class="fa fa-user-circle text-primary" style="font-size: 70px;"></i>
                        </div>

                        <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                        <p class="text-muted mb-4">{{ $user->email }}</p>

                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm px-3">
                                <i class="fa fa-edit me-1"></i> Edit
                            </a>

                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm px-3">
                                    <i class="fa fa-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">Belum ada user.</div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>

</div>

<style>
.user-card:hover {
    transform: translateY(-5px);
    transition: .3s;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}
</style>
@endsection
