@extends('layouts.guest.app')

@section('title', 'Detail Lokasi: ' . $lokasi->nama_lokasi)

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Detail Lokasi: {{ $lokasi->nama_lokasi }}
                    </h4>
                </div>

                <div class="card-body">
                    <div class="row">

                        <!-- FOTO -->
                        <div class="col-md-4">
                            @if($lokasi->gambar)
                            <div class="card mb-3">
                                <img src="{{ asset($lokasi->gambar) }}"
                                class="card-img-top img-fluid rounded"
                                alt="Gambar Lokasi">
                            </div>
                            @endif

                            <!-- KOORDINAT -->
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Koordinat</h6>
                                </div>
                                <div class="card-body">
                                    @if($lokasi->lat && $lokasi->lng)
                                    <p class="mb-1">
                                        <i class="fas fa-map-pin text-danger me-2"></i>
                                        <strong>Latitude:</strong> {{ $lokasi->lat }}
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-map-pin text-danger me-2"></i>
                                        <strong>Longitude:</strong> {{ $lokasi->lng }}
                                    </p>
                                    <a href="https://maps.google.com/?q={{ $lokasi->lat }},{{ $lokasi->lng }}" 
                                       target="_blank" 
                                       class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="fas fa-external-link-alt me-1"></i> Buka di Google Maps
                                    </a>
                                    @else
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Koordinat belum diatur
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- DETAIL -->
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="30%">Nama Lokasi</th>
                                    <td>: {{ $lokasi->nama_lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: {{ $lokasi->lokasi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Dibuat</th>
                                    <td>: {{ $lokasi->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Diperbarui</th>
                                    <td>: {{ $lokasi->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </table>

                            <!-- GEOJSON -->
                            @if($lokasi->geojson)
                            <div class="card mt-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Data GeoJSON</h6>
                                </div>
                                <div class="card-body">
<pre class="bg-light p-3 rounded" style="max-height: 200px; overflow: auto;">{{ json_encode(json_decode($lokasi->geojson), JSON_PRETTY_PRINT) }}</pre>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- PROYEK (one-to-one relation) -->
                    @if($lokasi->proyek)
                    <div class="mt-5">
                        <h5><i class="fas fa-project-diagram me-2"></i>Proyek di Lokasi Ini</h5>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Proyek</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $lokasi->proyek->kode_proyek }}</td>
                                        <td>{{ $lokasi->proyek->nama_proyek }}</td>
                                        <td>{{ $lokasi->proyek->tahun }}</td>
                                        <td>
                                            <span class="badge bg-{{ $lokasi->proyek->status == 'aktif' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($lokasi->proyek->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('proyek.show', $lokasi->proyek->proyek_id) }}" 
                                               class="btn btn-sm btn-outline-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                    <!-- BUTTON BAWAH -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
                        </a>

                        <div class="btn-group">
                            <a href="{{ route('lokasi.edit', $lokasi->lokasi_id) }}" 
                               class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i> Edit Lokasi
                            </a>

                            <form action="{{ route('lokasi.destroy', $lokasi->lokasi_id) }}" 
                                  method="POST"
                                  onsubmit="return confirm('Hapus lokasi ini? Semua proyek di lokasi ini akan terpengaruh.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash me-1"></i> Hapus Lokasi
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
