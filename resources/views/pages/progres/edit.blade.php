@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Progres Proyek</h2>

    <form action="{{ route('progres.update', $data->progres_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                @foreach($proyek as $p)
                    <option value="{{ $p->proyek_id }}" {{ $data->proyek_id == $p->proyek_id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tahapan</label>
            <select name="tahap_id" class="form-control" required>
                @foreach($tahap as $t)
                    <option value="{{ $t->tahap_id }}" {{ $data->tahap_id == $t->tahap_id ? 'selected' : '' }}>
                        {{ $t->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Persentase Real</label>
            <input type="number" name="persen_real" step="0.01" class="form-control" value="{{ $data->persen_real }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control">{{ $data->catatan }}</textarea>
        </div>

        <button class="btn btn-warni
