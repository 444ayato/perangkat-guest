@csrf

{{-- NAMA --}}
<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="name" class="form-control"
           value="{{ old('name', $user->name ?? '') }}">
    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
</div>

{{-- EMAIL --}}
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control"
           value="{{ old('email', $user->email ?? '') }}">
    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
</div>

{{-- ROLE --}}
<div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-control">
        <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>
            Admin
        </option>
        <option value="user" {{ old('role', $user->role ?? '') == 'user' ? 'selected' : '' }}>
            User
        </option>
    </select>
    @error('role') <div class="text-danger">{{ $message }}</div> @enderror
</div>

{{-- PASSWORD (KHUSUS CREATE) --}}
@unless(isset($user))
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
@endunless

{{-- PASSWORD (KHUSUS EDIT) --}}
@isset($user)
    <div class="mb-3">
        <label>Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control">
        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Konfirmasi Password Baru</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div class="mb-3">
        <label>Password Lama</label>
        <input type="password" name="current_password" class="form-control">
        @error('current_password') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
@endisset

<button class="btn btn-success">{{ $buttonText }}</button>
