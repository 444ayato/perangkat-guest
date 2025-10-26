@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">📋 Daftar User</h3>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            + Tambah User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse ($users as $user)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="border rounded shadow-sm p-4 text-center h-100" 
                     style="border: 1px solid #dcdcdc; background-color: #ffffff;">
                    
                    <div class="mb-3">
                        <i class="fa fa-user-circle text-primary" style="font-size: 60px;"></i>
                    </div>
                    
                    <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                    <p class="text-muted mb-4">{{ $user->email }}</p>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning px-3">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger px-3">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada user yang ditambahkan.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
