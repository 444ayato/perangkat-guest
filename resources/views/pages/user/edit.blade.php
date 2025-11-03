@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit User</h3>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @method('PUT')
        @include('guest.user.form', ['buttonText' => 'Perbarui', 'user' => $user])
    </form>
</div>
@endsection
