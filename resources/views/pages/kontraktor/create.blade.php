@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Kontraktor</h2>

    <form action="{{ route('kontraktor.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                <option value="">-- pilih proyek --</option>
                @foreach ($proyek as $p)
                    <option value="{{ $p->proyek_id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Kontraktor</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Penanggung Jawab</label>
            <input type="text" name="penanggung_jawab" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kontak</label>
            <input type="text" name="kontak" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
