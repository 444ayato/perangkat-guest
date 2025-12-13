@extends('layouts.guest.app')

@section('title', 'Detail Kontraktor: ' . $kontraktor->nama_kontraktor)

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0"><i class="fas fa-hard-hat me-2"></i>Detail Kontraktor: {{ $kontraktor->nama_kontraktor }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="35%">Nama Perusahaan</th>
                                    <td>: {{ $kontraktor->nama_kontraktor }}</td>
                                </tr>
                                <tr>
                                    <th>Penanggung Jawab</th>
                                    <td>: {{ $kontraktor->penanggung_jawab }}</td>
                                </tr>
                                <tr>
                                    <th>NPWP</th>
                                    <td>: {{ $kontraktor->npwp ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Kontak Utama</th>
                                    <td>: {{ $kontraktor->kontak ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon Kantor</th>
                                    <td>: {{ $kontraktor->telepon ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: {{ $kontraktor->email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: {{ $kontraktor->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Dibuat</th>
                                    <td>: {{ $kontraktor->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Diperbarui</th>
                                    <td>: {{ $kontraktor->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- INFO: Relasi proyek belum tersedia -->
                    <div class="alert alert-info mt-4">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Catatan:</strong> Fitur untuk melihat daftar proyek per kontraktor akan tersedia setelah 
                        menambahkan kolom <code>kontraktor_id</code> pada tabel proyek.
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
                        </a>
                        <div class="btn-group">
                            <a href="{{ route('kontraktor.edit', $kontraktor->kontraktor_id) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i> Edit Kontraktor
                            </a>
                            <form action="{{ route('kontraktor.destroy', $kontraktor->kontraktor_id) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('Hapus kontraktor ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash me-1"></i> Hapus Kontraktor
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