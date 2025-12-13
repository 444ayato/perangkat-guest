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

        <!-- Gambar Banner -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="banner-image rounded-4 overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                         alt="Project Management Dashboard" class="img-fluid w-100" style="height: 350px; object-fit: cover;">
                    <div class="banner-overlay d-flex align-items-center justify-content-center">
                        <h3 class="text-white fw-bold text-center p-4">Manajemen Proyek Modern & Terintegrasi</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tujuan Aplikasi -->
        <div class="row mb-5 g-4">
            <div class="col-md-12">
                <div class="card shadow-sm border-0 rounded-4 bg-white">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-circle bg-primary text-white me-3">
                                <i class="bi bi-bullseye fs-4"></i>
                            </div>
                            <h4 class="fw-bold text-secondary mb-0">Tujuan Aplikasi</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                            <span>Menyediakan sistem terpadu untuk monitoring proyek secara real-time</span>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                            <span>Meningkatkan transparansi dalam pelaporan progres dan anggaran</span>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                            <span>Mengoptimalkan komunikasi antara semua pihak terkait proyek</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                            <span>Mengurangi kesalahan data dengan sistem terkomputerisasi</span>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                            <span>Menyediakan dashboard analitik untuk pengambilan keputusan</span>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                            <span>Mendokumentasikan seluruh tahapan proyek secara digital</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Diri Lengkap -->
        <div class="row g-4 justify-content-center mb-5">
            <div class="col-12 mb-4">
                <div class="card shadow-sm border-0 rounded-4 bg-white">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle bg-primary text-white me-3">
                                <i class="bi bi-people-fill fs-4"></i>
                            </div>
                            <h4 class="fw-bold text-secondary mb-0">Tim Pengembang Aplikasi</h4>
                        </div>
                        <p class="text-muted text-center mb-4">Aplikasi E-Proyek dikembangkan oleh mahasiswa Sistem Informasi sebagai bagian dari proyek mata kuliah.</p>
                    </div>
                </div>
            </div>

            <!-- Guest -->
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="profile-card-full position-relative border-0 shadow-lg rounded-4 bg-white overflow-hidden">
                    <!-- Header Card -->
                    <div class="profile-header bg-primary py-4 text-center">
                        <div class="profile-img-wrapper mx-auto position-relative">
                            @php
                                // Cek apakah file foto azra ada di beberapa kemungkinan lokasi
                                $fotoAzraPaths = [
                                    'foto azra.jpeg',
                                    'foto_azra.jpeg',
                                    'foto azra.jpg',
                                    'foto_azra.jpg',
                                    'foto_ivana.jpg',
                                    'foto_ivana.jpeg',
                                    'images/foto azra.jpeg',
                                    'images/foto_azra.jpeg'
                                ];
                                
                                $fotoAzraFound = false;
                                $fotoAzraPath = '';
                                
                                foreach ($fotoAzraPaths as $path) {
                                    if (file_exists(public_path($path))) {
                                        $fotoAzraFound = true;
                                        $fotoAzraPath = asset($path);
                                        break;
                                    }
                                }
                                
                                // Jika tidak ditemukan, gunakan fallback image
                                if (!$fotoAzraFound) {
                                    $fotoAzraPath = 'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80';
                                }
                            @endphp
                            
                            <img src="{{ $fotoAzraPath }}" alt="Ivana Azra" class="profile-img-large shadow">
                            <div class="profile-status bg-success"></div>
                        </div>
                        <h3 class="text-white fw-bold mt-3 mb-1">Ivana Azra</h3>
                        <p class="text-light mb-0">Guest / Frontend Developer</p>
                    </div>
                    
                    <!-- Body Card -->
                    <div class="card-body p-4">
                        <!-- Informasi Pribadi -->
                        <div class="info-section mb-4">
                            <h5 class="fw-bold text-primary mb-3">📋 Informasi Pribadi</h5>
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="info-item d-flex align-items-center p-2 rounded bg-light">
                                        <i class="bi bi-person-badge me-3 text-primary fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">NIM</small>
                                            <strong>2457301069</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="info-item d-flex align-items-center p-2 rounded bg-light">
                                        <i class="bi bi-mortarboard me-3 text-primary fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Program Studi</small>
                                            <strong>Sistem Informasi</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="info-item d-flex align-items-center p-2 rounded bg-light">
                                        <i class="bi bi-envelope me-3 text-primary fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Email</small>
                                            <strong>ivana24si@mahasiswa.pcr.ac.id</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="info-item d-flex align-items-center p-2 rounded bg-light">
                                        <i class="bi bi-telephone me-3 text-primary fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Telepon</small>
                                            <strong>+62 85156845682</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Peran dalam Sistem -->
                        <div class="role-section mb-4">
                            <h5 class="fw-bold text-primary mb-3">👤 Peran dalam Sistem</h5>
                            <div class="role-badge bg-primary bg-opacity-10 text-primary py-2 px-3 rounded-pill d-inline-block">
                                <i class="bi bi-eye me-1"></i> Viewer / Guest
                            </div>
                            <p class="text-muted small mt-2">
                                Akses terbatas untuk melihat data proyek publik, dashboard, dan informasi umum tanpa izin modifikasi.
                            </p>
                        </div>
                        
                        <!-- Media Sosial -->
                        <div class="social-section">
                            <h5 class="fw-bold text-primary mb-3">🌐 Media Sosial & Portfolio</h5>
                            <div class="social-links d-flex justify-content-center gap-3">
                                <a href="https://linkedin.com/in/ivana-azra" target="_blank" class="social-icon linkedin">
                                    <i class="bi bi-linkedin fs-4"></i>
                                </a>
                                <a href="https://github.com/444ayato" target="_blank" class="social-icon github">
                                    <i class="bi bi-github fs-4"></i>
                                </a>
                                <a href="https://instagram.com/ivanazra" target="_blank" class="social-icon instagram">
                                    <i class="bi bi-instagram fs-4"></i>
                                </a>
                                <a href="https://twitter.com/ivanaazra" target="_blank" class="social-icon twitter">
                                    <i class="bi bi-twitter fs-4"></i>
                                </a>
                                <a href="#" target="_blank" class="social-icon portfolio">
                                    <i class="bi bi-globe fs-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin -->
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="profile-card-full position-relative border-0 shadow-lg rounded-4 bg-white overflow-hidden">
                    <!-- Header Card -->
                    <div class="profile-header bg-success py-4 text-center">
                        <div class="profile-img-wrapper mx-auto position-relative">
                            @php
                                // Cek apakah file foto ayu ada di beberapa kemungkinan lokasi
                                $fotoAyuPaths = [
                                    'foto ayu.jpeg',
                                    'foto_ayu.jpeg',
                                    'foto ayu.jpg',
                                    'foto_ayu.jpg',
                                    'images/foto ayu.jpeg',
                                    'images/foto_ayu.jpg'
                                ];
                                
                                $fotoAyuFound = false;
                                $fotoAyuPath = '';
                                
                                foreach ($fotoAyuPaths as $path) {
                                    if (file_exists(public_path($path))) {
                                        $fotoAyuFound = true;
                                        $fotoAyuPath = asset($path);
                                        break;
                                    }
                                }
                                
                                // Jika tidak ditemukan, gunakan fallback image
                                if (!$fotoAyuFound) {
                                    $fotoAyuPath = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80';
                                }
                            @endphp
                            
                            <img src="{{ $fotoAyuPath }}" alt="Ayu Sara" class="profile-img-large shadow">
                            <div class="profile-status bg-warning"></div>
                        </div>
                        <h3 class="text-white fw-bold mt-3 mb-1">Ayu Sara</h3>
                        <p class="text-light mb-0">Admin / Fullstack Developer</p>
                    </div>
                    
                    <!-- Body Card -->
                    <div class="card-body p-4">
                        <!-- Informasi Pribadi -->
                        <div class="info-section mb-4">
                            <h5 class="fw-bold text-success mb-3">📋 Informasi Pribadi</h5>
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="info-item d-flex align-items-center p-2 rounded bg-light">
                                        <i class="bi bi-person-badge me-3 text-success fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">NIM</small>
                                            <strong>2457301024</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="info-item d-flex align-items-center p-2 rounded bg-light">
                                        <i class="bi bi-mortarboard me-3 text-success fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Program Studi</small>
                                            <strong>Sistem Informasi</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="info-item d-flex align-items-center p-2 rounded bg-light">
                                        <i class="bi bi-envelope me-3 text-success fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Email</small>
                                            <strong>ayu24si@mahasiswa.pcr.ac.id</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="info-item d-flex align-items-center p-2 rounded bg-light">
                                        <i class="bi bi-telephone me-3 text-success fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Telepon</small>
                                            <strong>+62 82150194726</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Peran dalam Sistem -->
                        <div class="role-section mb-4">
                            <h5 class="fw-bold text-success mb-3">🛠️ Peran dalam Sistem</h5>
                            <div class="d-flex flex-wrap gap-2 mb-2">
                                <div class="role-badge bg-success bg-opacity-10 text-success py-2 px-3 rounded-pill">
                                    <i class="bi bi-shield-check me-1"></i> Administrator
                                </div>
                                <div class="role-badge bg-warning bg-opacity-10 text-warning py-2 px-3 rounded-pill">
                                    <i class="bi bi-code-slash me-1"></i> Developer
                                </div>
                            </div>
                            <p class="text-muted small">
                                Hak akses penuh untuk mengelola semua data proyek, user, laporan, dan konfigurasi sistem.
                            </p>
                        </div>
                        
                        <!-- Media Sosial -->
                        <div class="social-section">
                            <h5 class="fw-bold text-success mb-3">🌐 Media Sosial & Portfolio</h5>
                            <div class="social-links d-flex justify-content-center gap-3">
                                <a href="https://linkedin.com/in/ayu-sara" target="_blank" class="social-icon linkedin">
                                    <i class="bi bi-linkedin fs-4"></i>
                                </a>
                                <a href="https://github.com/iuarasss" target="_blank" class="social-icon github">
                                    <i class="bi bi-github fs-4"></i>
                                </a>
                                <a href="https://instagram.com/aysrra._" target="_blank" class="social-icon instagram">
                                    <i class="bi bi-instagram fs-4"></i>
                                </a>
                                <a href="#" target="_blank" class="social-icon twitter">
                                    <i class="bi bi-twitter fs-4"></i>
                                </a>
                                <a href="#" target="_blank" class="social-icon portfolio">
                                    <i class="bi bi-globe fs-4"></i>
                                </a>
                                <a href="#" target="_blank" class="social-icon medium">
                                    <i class="bi bi-medium fs-4"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Skills -->
                        <div class="skills-section mt-4">
                            <h6 class="fw-bold text-muted mb-2">🛠️ Technical Skills</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-primary bg-opacity-10 text-primary">Laravel</span>
                                <span class="badge bg-primary bg-opacity-10 text-primary">PHP</span>
                                <span class="badge bg-primary bg-opacity-10 text-primary">MySQL</span>
                                <span class="badge bg-primary bg-opacity-10 text-primary">JavaScript</span>
                                <span class="badge bg-primary bg-opacity-10 text-primary">Bootstrap</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alur Kerja Sistem (Ringkas) -->
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card shadow-sm border-0 rounded-4 bg-white">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle bg-primary text-white me-3">
                                <i class="bi bi-diagram-3 fs-4"></i>
                            </div>
                            <h4 class="fw-bold text-secondary mb-0">Alur Kerja Sistem</h4>
                        </div>
                        
                        <div class="simple-workflow">
                            <div class="workflow-step-simple">
                                <div class="step-number">1</div>
                                <div class="step-content-simple">
                                    <h6>Registrasi User</h6>
                                    <p class="small text-muted mb-0">Admin mendaftarkan pengguna baru</p>
                                </div>
                            </div>
                            <div class="workflow-arrow-simple">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                            <div class="workflow-step-simple">
                                <div class="step-number">2</div>
                                <div class="step-content-simple">
                                    <h6>Input Proyek</h6>
                                    <p class="small text-muted mb-0">Membuat data proyek baru</p>
                                </div>
                            </div>
                            <div class="workflow-arrow-simple">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                            <div class="workflow-step-simple">
                                <div class="step-number">3</div>
                                <div class="step-content-simple">
                                    <h6>Monitoring</h6>
                                    <p class="small text-muted mb-0">Update progres secara berkala</p>
                                </div>
                            </div>
                            <div class="workflow-arrow-simple">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                            <div class="workflow-step-simple">
                                <div class="step-number">4</div>
                                <div class="step-content-simple">
                                    <h6>Analisis & Laporan</h6>
                                    <p class="small text-muted mb-0">Generate laporan dan analisis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Quote -->
        <div class="text-center mt-5 pt-4 border-top">
            <p class="text-muted fst-italic fs-5">
                💡 "Dengan <strong class="text-primary">E-Proyek</strong>, setiap pembangunan menjadi lebih terencana, terukur, dan transparan."
            </p>
            <p class="text-muted mt-2">Sistem Informasi Pembangunan & Monitoring Proyek © 2025</p>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="#" class="text-decoration-none text-muted small">
                    <i class="bi bi-file-text me-1"></i> Privacy Policy
                </a>
                <span class="text-muted">|</span>
                <a href="#" class="text-decoration-none text-muted small">
                    <i class="bi bi-file-earmark-text me-1"></i> Terms of Service
                </a>
                <span class="text-muted">|</span>
                <a href="#" class="text-decoration-none text-muted small">
                    <i class="bi bi-envelope me-1"></i> Contact Us
                </a>
            </div>
        </div>

    </div>
</div>

<!-- STYLE -->
<style>
.about-page {
    background: linear-gradient(to bottom right, #f9fbff, #eef3fb);
    min-height: 100vh;
}

/* Banner */
.banner-image {
    position: relative;
}
.banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
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

/* Profile Card Full */
.profile-card-full {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.profile-card-full:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
}

.profile-header {
    position: relative;
}

.profile-img-wrapper {
    width: 120px;
    height: 120px;
}

.profile-img-large {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid rgba(255, 255, 255, 0.3);
    object-fit: cover;
    background-color: #f5f5f5; /* Fallback background */
}

.profile-status {
    position: absolute;
    bottom: 10px;
    right: 10px;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    border: 2px solid white;
}

/* Info Items */
.info-item {
    transition: background-color 0.2s ease;
}

.info-item:hover {
    background-color: #e9ecef !important;
}

.info-item i {
    min-width: 24px;
}

/* Role Badge */
.role-badge {
    font-size: 14px;
    transition: transform 0.2s ease;
}

.role-badge:hover {
    transform: scale(1.05);
}

/* Social Icons */
.social-links {
    margin-top: 10px;
}

.social-icon {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    color: white;
}

.social-icon:hover {
    transform: translateY(-3px) scale(1.1);
    text-decoration: none;
}

.social-icon.linkedin {
    background: #0077b5;
}

.social-icon.github {
    background: #333;
}

.social-icon.instagram {
    background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
}

.social-icon.twitter {
    background: #1da1f2;
}

.social-icon.dribbble {
    background: #ea4c89;
}

.social-icon.portfolio {
    background: #6f42c1;
}

.social-icon.medium {
    background: #00ab6c;
}

.social-icon:hover {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Simple Workflow */
.simple-workflow {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.workflow-step-simple {
    flex: 1;
    min-width: 150px;
    text-align: center;
    padding: 20px 15px;
    background: #f8f9fa;
    border-radius: 12px;
    transition: transform 0.3s ease;
}

.workflow-step-simple:hover {
    transform: translateY(-5px);
    background: #e9ecef;
}

.step-number {
    width: 40px;
    height: 40px;
    background: #0d6efd;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    font-weight: bold;
    font-size: 18px;
}

.step-content-simple h6 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 5px;
    color: #2c3e50;
}

.workflow-arrow-simple {
    color: #6c757d;
    font-size: 24px;
}

@media (max-width: 992px) {
    .simple-workflow {
        flex-direction: column;
    }
    .workflow-arrow-simple {
        transform: rotate(90deg);
    }
    .workflow-step-simple {
        width: 100%;
    }
}

/* Skills Badge */
.badge {
    padding: 6px 12px;
    font-weight: 500;
    transition: all 0.2s ease;
}

.badge:hover {
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .profile-img-large {
        width: 100px;
        height: 100px;
    }
    
    .profile-img-wrapper {
        width: 100px;
        height: 100px;
    }
    
    .social-icon {
        width: 40px;
        height: 40px;
    }
    
    .info-item {
        padding: 10px !important;
    }
}

/* Hover Effects */
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