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

      <hr>

      <!-- FOTO PROYEK -->
      <h6 class="mb-3">📷 Foto Proyek</h6>

      <div class="row">
        @forelse ($proyek->media as $m)
          <div class="col-md-3 mb-3">
            <div class="card">
              <img src="{{ asset('storage/media/proyek/' . $m->file_name) }}"
                   class="card-img-top rounded"
                   style="height: 160px; object-fit: cover;">
            </div>
          </div>
        @empty
          <p class="text-muted">Tidak ada foto proyek.</p>
        @endforelse
      </div>

      <hr>

      <h6>Progress Pekerjaan</h6>
      <div class="progress" style="height: 25px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: 45%">45%</div>
      </div>

      <a href="{{ route('proyek.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
  </div>
</div>
@endsection
