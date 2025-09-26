<!DOCTYPE html>
<html>
<head>
    <title>Guest - Pembangunan & Monitoring Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Daftar Proyek Pembangunan (Guest)</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Kode Proyek</th>
                <th>Nama Proyek</th>
                <th>Tahun</th>
                <th>Lokasi</th>
                <th>Anggaran</th>
                <th>Sumber Dana</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyek as $item)
            <tr>
                <td>{{ $item['proyek_id'] }}</td>
                <td>{{ $item['kode_proyek'] }}</td>
                <td>{{ $item['nama_proyek'] }}</td>
                <td>{{ $item['tahun'] }}</td>
                <td>{{ $item['lokasi'] }}</td>
                <td>Rp {{ number_format($item['anggaran'], 0, ',', '.') }}</td>
                <td>{{ $item['sumber_dana'] }}</td>
                <td>{{ $item['deskripsi'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>