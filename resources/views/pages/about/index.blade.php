@extends('layouts.guest.app')
@section('content')
<div class="about-page py-5">
    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-primary">Tentang Aplikasi</h1>
            <p class="text-muted fs-5 mt-2">Sistem Informasi Pembangunan dan Monitoring Proyek</p>
            <hr class="mx-auto" style="width:90px; border:2px solid #0d6efd; border-radius:5px;">
        </div>

        <!-- Tema Proyek -->
        <div class="card shadow-sm border-0 rounded-4 mb-5 bg-white">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-circle bg-primary text-white me-3">
                        <i class="bi bi-building fs-4"></i>
                    </div>
                    <h4 class="fw-bold text-secondary mb-0">Tema Proyek</h4>
                </div>
                <p class="text-muted lh-lg" style="text-align: justify;">
                    <strong>E-PROYEK</strong> adalah sistem berbasis web yang dirancang untuk membantu proses
                    <em>pembangunan dan monitoring proyek</em> agar lebih efisien dan transparan.
                    Aplikasi ini mempermudah admin dan pengguna dalam mengelola data proyek, memantau progres,
                    serta memastikan setiap tahapan pembangunan berjalan sesuai rencana.
                </p>
                <p class="text-muted lh-lg" style="text-align: justify;">
                    Sistem ini mendukung pelaporan real-time, sehingga meminimalisir keterlambatan dan kesalahan komunikasi antar pihak terkait.
                    Cocok digunakan oleh instansi, perusahaan, maupun lembaga dengan banyak proyek berjalan secara bersamaan.
                </p>
            </div>
        </div>

        <!-- Data Diri -->
        <div class="row g-4 justify-content-center">
            <!-- Guest -->
            <div class="col-md-5">
                <div class="profile-card position-relative border-0 shadow-sm rounded-4 text-center bg-white hover-lift">
                    <div class="profile-img-wrapper position-absolute top-0 start-50 translate-middle">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmHsgEhY5-qy0RbuS6-sUrdalJwOGEcPgdmEKfWqUTAXvTXJmOCbPm7GBooAEU-sOnvGE&usqp=CAU" 
                             alt="Guest Profile" class="profile-img shadow">
                    </div>
                    <div class="card-body mt-5 pt-5">
                        <h5 class="fw-bold text-primary mb-1">Guest</h5>
                        <p class="text-muted mb-4">👤 Kontributor Tamu</p>
                        <div class="info-list mx-auto">
                            <div><i class="bi bi-person-circle me-2 text-primary"></i><strong>Nama:</strong> Ivana Azra</div>
                            <div><i class="bi bi-envelope me-2 text-primary"></i><strong>Email:</strong> ivana24si@mahasiswa.pcr.ac.id</div>
                            <div><i class="bi bi-eye me-2 text-primary"></i><strong>Akses:</strong> Melihat data proyek publik.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin -->
            <div class="col-md-5">
                <div class="profile-card position-relative border-0 shadow-sm rounded-4 text-center bg-white hover-lift">
                    <div class="profile-img-wrapper position-absolute top-0 start-50 translate-middle">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmHsgEhY5-qy0RbuS6-sUrdalJwOGEcPgdmEKfWqUTAXvTXJmOCbPm7GBooAEU-sOnvGE&usqp=CAU" 
                             alt="Admin Profile" class="profile-img shadow">
                    </div>
                    <div class="card-body mt-5 pt-5">
                        <h5 class="fw-bold text-primary mb-1">Admin</h5>
                        <p class="text-muted mb-4">🛠️ Pengelola Sistem</p>
                        <div class="info-list mx-auto">
                            <div><i class="bi bi-person-gear me-2 text-primary"></i><strong>Nama:</strong> Ayu Sara</div>
                            <div><i class="bi bi-envelope me-2 text-primary"></i><strong>Email:</strong> ayu24si@mahasiswa.pcr.ac.id</div>
                            <div><i class="bi bi-tools me-2 text-primary"></i><strong>Tugas:</strong> Mengelola data user & proyek.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Quote -->
        <div class="text-center mt-5">
            <p class="text-muted fst-italic">
                💡 “Dengan <strong>E-Proyek</strong>, setiap pembangunan menjadi lebih terencana, terukur, dan transparan.”
            </p>
        </div>

    </div>
</div>

<!-- STYLE -->
<style>
.about-page {
    background: linear-gradient(to bottom right, #f9fbff, #eef3fb);
    min-height: 100vh;
}

/* Tema proyek icon */
.icon-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Card profil */
.profile-card {
    overflow: visible;
    background-color: #fff;
    padding-top: 60px;
    border-radius: 16px;
    position: relative;
}

/* Gambar profil */
.profile-img-wrapper {
    z-index: 10;
}
.profile-img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid #fff;
    background-color: #f5f8ff;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.profile-img:hover {
    transform: scale(1.05);
}

/* Info box */
.info-list {
    font-size: 15px;
    color: #555;
    line-height: 1.8;
    background-color: #f8faff;
    border-radius: 12px;
    padding: 15px 25px;
    box-shadow: inset 0 0 6px rgba(13, 110, 253, 0.08);
    width: 85%;
    text-align: left;
    margin-left: auto;
    margin-right: auto;
}

/* Hover animasi card */
.hover-lift {
    transition: all 0.3s ease;
}
.hover-lift:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 25px rgba(13, 110, 253, 0.15);
}
</style>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@endsection
