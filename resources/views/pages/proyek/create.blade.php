@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">➕ Tambah Data Proyek</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('proyek.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kode Proyek</label>
                            <input type="text" name="kode_proyek" value="{{ old('kode_proyek') }}" class="form-control"
                                required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nama Proyek</label>
                            <input type="text" name="nama_proyek" value="{{ old('nama_proyek') }}" class="form-control"
                                required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="number" name="tahun" value="{{ old('tahun') }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Anggaran (Rp)</label>
                            <input type="number" name="anggaran" value="{{ old('anggaran') }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Sumber Dana</label>
                            <input type="text" name="sumber_dana" value="{{ old('sumber_dana') }}" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
