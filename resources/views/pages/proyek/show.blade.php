@extends('layouts.guest.app')

@section('content')
<div class="container-fluid">
  <div class="card shadow">
    <div class="card-header bg-success text-white">
      <h5 class="mb-0">🏗️ Detail Proyek: {{ $proyek->nama_proyek }}</h5>
    </div>

    <div class="card-body">

      <p><strong>Kode:</strong> {{ $proyek->kode_proyek }}</p>
      <p><strong>Tahun:</strong> {{ $proyek->tahun }}</p>
      <p><strong>Anggaran:</strong> Rp {{ number_format($proyek->anggaran,0,',','.') }}</p>
      <p><strong>Sumber Dana:</strong> {{ $proyek->sumber_dana }}</p>
      <p><strong>Deskripsi:</strong> {{ $proyek->deskripsi }}</p>

      <a href="{{ route('proyek.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
  </div>
</div>
@endsection
