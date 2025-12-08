@extends('layouts.guest.app')

@section('content')
    <!-- ======== STATISTIK CRUD ======== -->
    <div class="container mt-5">
        <h3 class="text-center mb-4">📊 Ringkasan Data Sistem</h3>

        <div class="row text-center">

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm p-3">
                    <h5>Total Proyek</h5>
                    <h2>{{ $total_proyek }}</h2>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm p-3">
                    <h5>Total Lokasi</h5>
                    <h2>{{ $total_lokasi }}</h2>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm p-3">
                    <h5>Total Kontraktor</h5>
                    <h2>{{ $total_kontraktor }}</h2>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm p-3">
                    <h5>Total Tahapan</h5>
                    <h2>{{ $total_tahapan }}</h2>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card shadow-sm p-3">
                    <h5>Total User Terdaftar</h5>
                    <h2>{{ $total_user }}</h2>
                </div>
            </div>

        </div>
    </div>

    <!-- ======== INTRO SECTION ======== -->
    <section id="intro" class="text-center intro-section mt-5">
        <div class="container">
            <h1 class="fw-bold mb-3">🏗️ Pembangunan & Monitoring Proyek</h1>
            <p>Kelola, pantau, dan evaluasi seluruh proyek pembangunan Anda dalam satu sistem terpadu.</p>
        </div>
    </section>

    <!-- ======== FITUR UTAMA ======== -->
    <section class="section1 text-center">
        <div class="container">
            <div class="general-title">
                <h3>Fitur Utama Sistem</h3>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="servicebox text-center">
                        <i class="active dm-icon fa fa-line-chart fa-3x"></i>
                        <h4>Monitoring Progres</h4>
                        <p>Pantau perkembangan proyek secara real-time.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="servicebox text-center">
                        <i class="active dm-icon fa fa-money fa-3x"></i>
                        <h4>Anggaran Transparan</h4>
                        <p>Pelaporan keuangan yang jelas & terstruktur.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="servicebox text-center">
                        <i class="active dm-icon fa fa-users fa-3x"></i>
                        <h4>Manajemen User</h4>
                        <p>Kelola akun admin & operator.</p>
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm mt-2">Kelola User</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======== AJAK TAMBAH PROYEK ======== -->
    <section class="section2">
        <div class="container text-center">
            <h2 class="big-title">Mulai Kelola <span>Proyek</span> Anda Hari Ini!</h2>
            <p class="small-title">Buat dan pantau progres proyek langsung dari dashboard.</p>
            <a class="button large" href="{{ route('proyek.create') }}">+ Tambah Proyek Baru</a>
        </div>
    </section>

    <!-- 🔘 Floating WhatsApp Button -->
    <img src="{{ asset('assets/img/whatsapp-icon.png') }}" class="whatsapp-float" alt="WhatsApp">
    <a href="https://wa.me/6285156845682?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20Proyek." target="_blank"
        class="whatsapp-float" title="Hubungi via WhatsApp">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <style>
        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 25px;
            right: 25px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            font-size: 32px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 2px 4px 12px rgba(0, 0, 0, 0.3);
            color: #fff;
            text-decoration: none;
        }

        .whatsapp-float .my-float {
            margin-top: 14px;
        }
    </style>
@endsection
