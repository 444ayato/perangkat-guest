@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h3>Tambah User</h3>

    <form action="{{ route('users.store') }}" method="POST">
        @include('pages.user.form', ['buttonText' => 'Simpan'])
    </form>
</div>
@endsection
