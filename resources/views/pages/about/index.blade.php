@extends('layouts.guest.app')
@section('content')
<div class="container py-5">

    <!-- Judul Halaman -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Tentang Aplikasi</h2>
        <p class="text-muted mt-2">Sistem Informasi Pembangunan dan Monitoring Proyek</p>
        <hr class="mx-auto" style="width: 80px; border: 2px solid #0d6efd; border-radius: 5px;">
    </div>
    
    <!-- Tema Proyek -->
    <div class="card border-0 shadow-sm mb-5 p-4">
        <h4 class="fw-bold text-secondary mb-3">🧱 Tema Proyek</h4>
        <p class="text-muted" style="text-align: justify;">
            <strong>E-PROYEK</strong> adalah sistem berbasis web yang dirancang untuk membantu dalam 
            <em>pembangunan dan monitoring proyek</em> secara lebih efisien, terukur, dan transparan. 
            Aplikasi ini memungkinkan admin dan pengguna untuk mengelola data proyek, memantau progres, 
            serta memastikan setiap tahapan pembangunan berjalan sesuai rencana.
        </p>
        <p class="text-muted" style="text-align: justify;">
            Dengan adanya sistem ini, proses pelaporan dan pengawasan dapat dilakukan secara <em>real-time</em>, 
            sehingga meminimalisir keterlambatan dan kesalahan komunikasi antara pihak terkait. 
            Platform ini sangat cocok digunakan oleh instansi, perusahaan, maupun lembaga yang memiliki 
            banyak proyek berjalan secara bersamaan.
        </p>
    </div>

    <!-- Data Diri Guest & Admin -->
    <div class="row g-4 mb-5">
        <!-- Guest -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 hover-card">
                <div class="card-body">
                    <h5 class="fw-bold text-secondary mb-3">👤 Data Diri Guest</h5>
                    <ul class="list-unstyled mb-0">
                        <li><strong>Nama:</strong> Guest User</li>
                        <li><strong>Peran:</strong> Pengunjung / Pengguna umum</li>
                        <li><strong>Tugas:</strong> Melihat data proyek publik tanpa hak edit.</li>
                        <li><strong>Email:</strong> guest@eproyek.com</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Admin -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 hover-card">
                <div class="card-body">
                    <h5 class="fw-bold text-secondary mb-3">🛠️ Data Diri Admin</h5>
                    <ul class="list-unstyled mb-0">
                        <li><strong>Nama:</strong> Administrator</li>
                        <li><strong>Peran:</strong> Pengelola Sistem</li>
                        <li><strong>Tugas:</strong> Mengelola data user, proyek, dan memantau seluruh aktivitas sistem.</li>
                        <li><strong>Email:</strong> admin@eproyek.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Quotes -->
    <div class="text-center mt-5">
        <hr class="mx-auto" style="width: 60px; border: 1.5px solid #0d6efd;">
        <p class="text-muted mt-3">
            💡 <em>Dengan E-Proyek, setiap langkah pembangunan menjadi lebih terencana, terukur, dan transparan.</em>
        </p>
    </div>
</div>

<!-- Style Section -->
<style>
h2, h4, h5 {
    font-family: 'Poppins', sans-serif;
}
.card {
    border-radius: 14px;
    transition: all 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}
.card-body {
    font-size: 15px;
    color: #555;
    padding: 1.5rem;
}
.text-muted {
    line-height: 1.7;
}
</style>
@endsection
