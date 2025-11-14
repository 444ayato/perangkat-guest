@extends('layouts.guest.app')

@section('content')
    {{-- MAIN CONTENT --}}
    <main>
        <section class="section1 py-5">
            {{-- Mengganti container-fluid kembali ke container standar untuk pemusatan yang lebih baik --}}
            <div class="container">
                {{-- Bagian Judul yang Terpusat --}}
                <div class="text-center mb-5">
                    <h2 class="fw-bold">✏️ Tambah Tahapan Proyek</h2>
                    <p class="text-muted">Masukkan rincian tahapan untuk proyek yang dipilih.</p>
                </div>

                {{-- Card untuk Formulir (Terpusat dan LEBIH LEBAR) --}}
                <div class="row justify-content-center">
                    {{-- Pembatasan kolom diperlebar menjadi col-lg-9 col-xl-8 (sekitar 75% - 83% lebar) --}}
                    <div class="col-md-10 col-lg-9 col-xl-8">
                        <div class="card shadow-lg mb-4">
                            <div class="card-header bg-info text-white fw-bold">
                                Formulir Tahapan Baru
                            </div>
                            <div class="card-body">
                                <form action="{{ route('tahapan.store') }}" method="POST">
                                    @csrf

                                    {{-- Input Proyek --}}
                                    <div class="mb-3">
                                        <label for="proyek_id" class="form-label">Proyek <span
                                                class="text-danger">*</span></label>
                                        <select name="proyek_id" id="proyek_id"
                                            class="form-select @error('proyek_id') is-invalid @enderror" required>
                                            <option value="">Pilih Proyek</option>
                                            @foreach ($proyek as $p)
                                                <option value="{{ $p->proyek_id }}"
                                                    {{ old('proyek_id') == $p->proyek_id ? 'selected' : '' }}>
                                                    {{ $p->nama_proyek }}</option>
                                            @endforeach
                                        </select>
                                        @error('proyek_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Input Nama Tahap --}}
                                    <div class="mb-3">
                                        <label for="nama_tahap" class="form-label">Nama Tahap <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nama_tahap" id="nama_tahap"
                                            class="form-control @error('nama_tahap') is-invalid @enderror"
                                            value="{{ old('nama_tahap') }}" required>
                                        @error('nama_tahap')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Input Target Persen --}}
                                    <div class="mb-3">
                                        <label for="target_persen" class="form-label">Target Persen (%) <span
                                                class="text-danger">*</span></label>
                                        <input type="number" step="0.01" min="0" max="100"
                                            name="target_persen" id="target_persen"
                                            class="form-control @error('target_persen') is-invalid @enderror"
                                            value="{{ old('target_persen') }}" required>
                                        @error('target_persen')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Grup Tanggal Mulai dan Selesai --}}
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="tgl_mulai" class="form-label">Tanggal Mulai <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="tgl_mulai" id="tgl_mulai"
                                                class="form-control @error('tgl_mulai') is-invalid @enderror"
                                                value="{{ old('tgl_mulai') }}" required>
                                            @error('tgl_mulai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="tgl_selesai" class="form-label">Tanggal Selesai <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="tgl_selesai" id="tgl_selesai"
                                                class="form-control @error('tgl_selesai') is-invalid @enderror"
                                                value="{{ old('tgl_selesai') }}" required>
                                            @error('tgl_selesai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Tombol Aksi --}}
                                    <div class="d-flex justify-content-end pt-3 border-top mt-4">
                                        <a href="{{ route('tahapan.index') }}" class="btn btn-secondary me-2">Batal</a>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-save"></i> Simpan Tahapan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
