@extends('layouts.guest.app')

@section('content')
<div class="container py-5">

    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-4">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <div class="card shadow-sm p-4">

        <div class="text-center mb-4">
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}"
                     class="rounded-circle"
                     width="120" height="120"
                     style="object-fit: cover;">
            @else
                <i class="fa fa-user-circle text-primary" style="font-size: 120px;"></i>
            @endif
        </div>

        <h3 class="text-center fw-bold">{{ $user->name }}</h3>
        <p class="text-center text-muted">{{ $user->email }}</p>

        <div class="mt-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Nama</span>
                    <strong>{{ $user->name }}</strong>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Email</span>
                    <strong>{{ $user->email }}</strong>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Role</span>
                    <strong class="badge bg-secondary">{{ $user->role }}</strong>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Dibuat</span>
                    <strong>{{ $user->created_at->format('d M Y') }}</strong>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Terakhir diupdate</span>
                    <strong>{{ $user->updated_at->format('d M Y') }}</strong>
                </li>
            </ul>
        </div>

    </div>

</div>
@endsection
