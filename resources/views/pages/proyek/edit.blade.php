@extends('layouts.app')

@section('content')
<h1 class="mb-4">Tambah Proyek</h1>

<form action="{{ route('proyek.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Kode Proyek</label>
        <input type="text" name="kode_proyek" class="form-control"
               value="{{ old('kode_proyek') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Proyek</label>
        <input type="text" name="nama_proyek" class="form-control"
               value="{{ old('nama_proyek') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control"
               value="{{ old('lokasi') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tahun</label>
        <input type="number" name="tahun" class="form-control"
               value="{{ old('tahun') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Anggaran</label>
        <input type="number" step="0.01" name="anggaran" class="form-control"
               value="{{ old('anggaran') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Sumber Dana</label>
        <input type="text" name="sumber_dana" class="form-control"
               value="{{ old('sumber_dana') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection