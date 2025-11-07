@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h3>Edit User</h3>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @method('PUT')
        @include('pages.user.form', ['buttonText' => 'Perbarui', 'user' => $user])
    </form>
</div>
@endsection
