@csrf

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Kode Proyek</label>
    <input type="text" name="kode_proyek" value="{{ old('kode_proyek', $proyek->kode_proyek ?? '') }}" class="form-control" required>
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Nama Proyek</label>
    <input type="text" name="nama_proyek" value="{{ old('nama_proyek', $proyek->nama_proyek ?? '') }}" class="form-control" required>
  </div>
</div>

<div class="row">
  <div class="col-md-4 mb-3">
    <label class="form-label">Tahun</label>
    <input type="number" name="tahun" value="{{ old('tahun', $proyek->tahun ?? '') }}" class="form-control">
  </div>

  <div class="col-md-4 mb-3">
    <label class="form-label">Anggaran</label>
    <input type="number" name="anggaran" value="{{ old('anggaran', $proyek->anggaran ?? '') }}" class="form-control">
  </div>

  <div class="col-md-4 mb-3">
    <label class="form-label">Sumber Dana</label>
    <input type="text" name="sumber_dana" value="{{ old('sumber_dana', $proyek->sumber_dana ?? '') }}" class="form-control">
  </div>
</div>

<div class="mb-3">
  <label class="form-label">Lokasi</label>
  <input type="text" name="lokasi" value="{{ old('lokasi', $proyek->lokasi ?? '') }}" class="form-control">
</div>

<div class="mb-3">
  <label class="form-label">Deskripsi</label>
  <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $proyek->deskripsi ?? '') }}</textarea>
</div>
