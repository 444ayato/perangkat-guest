@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Kontraktor</h2>

    <form action="{{ route('kontraktor.update', $data->kontraktor_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                @foreach ($proyek as $p)
                    <option value="{{ $p->proyek_id }}"
                        {{ $data->proyek_id == $p->proyek_id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Kontraktor</label>
            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Penanggung Jawab</label>
            <input type="text" name="penanggung_jawab" class="form-control"
                   value="{{ $data->penanggung_jawab }}" required>
        </div>

        <div class="mb-3">
            <label>Kontak</label>
            <input type="text" name="kontak" class="form-control"
                   value="{{ $data->kontak }}" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>
                {{ $data->alamat }}
            </textarea>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
