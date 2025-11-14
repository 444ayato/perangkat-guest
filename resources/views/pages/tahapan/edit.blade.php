@extends('layouts.guest.app')

@section('content')
    <h3>Edit Tahapan Proyek</h3>

    <form action="{{ route('tahapan.update', $data->tahap_id) }}" method="POST">
        @csrf @method('PUT')

        <label>Proyek</label>
        <select name="proyek_id" class="form-control">
            @foreach ($proyek as $p)
                <option value="{{ $p->proyek_id }}" {{ $data->proyek_id == $p->proyek_id ? 'selected' : '' }}>
                    {{ $p->nama_proyek }}
                </option>
            @endforeach
        </select>

        <label>Nama Tahap</label>
        <input type="text" name="nama_tahap" class="form-control" value="{{ $data->nama_tahap }}">

        <label>Target Persen</label>
        <input type="number" step="0.01" name="target_persen" class="form-control" value="{{ $data->target_persen }}">

        <label>Tanggal Mulai</label>
        <input type="date" name="tgl_mulai" class="form-control" value="{{ $data->tgl_mulai }}">

        <label>Tanggal Selesai</label>
        <input type="date" name="tgl_selesai" class="form-control" value="{{ $data->tgl_selesai }}">

        <button class="btn btn-warning mt-3">Update</button>
    </form>
@endsection
