@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Progres Proyek</h2>

    <form action="{{ route('progres.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                <option value="">-- pilih proyek --</option>
                @foreach($proyek as $p)
                    <option value="{{ $p->proyek_id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tahapan</label>
            <select name="tahap_id" class="form-control" required>
                <option value="">-- pilih tahapan --</option>
                @foreach($tahap as $t)
                    <option value="{{ $t->tahap_id }}">{{ $t->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Persentase Real</label>
            <input type="number" name="pers
