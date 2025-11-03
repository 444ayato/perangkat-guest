@extends('layouts.guest.app')

@section('content')
  <!-- Intro Section -->
  <section id="intro" class="text-center intro-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h1 class="fw-bold mb-3">🏗️ Pembangunan & Monitoring Proyek</h1>
          <p>
            Kelola, pantau, dan evaluasi seluruh proyek pembangunan Anda dalam satu sistem terpadu.
            Efisien, transparan, dan mudah digunakan.
          </p>
          <a href="{{ route('proyek.index') }}"></a>
        </div>
      </div>
    </div>
  </section>

  <!-- Fitur Utama -->
  <section class="section1 text-center">
    <div class="container">
      <div class="general-title">
        <h3>Fitur Utama Sistem</h3>
        <hr>
      </div>
      <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="servicebox text-center">
            <div class="service-icon">
              <i class="active dm-icon fa fa-line-chart fa-3x"></i>
              <div class="servicetitle"><h4>Monitoring Progres</h4><hr></div>
              <p>Pantau perkembangan proyek secara real-time berdasarkan tahapan dan waktu pelaksanaan.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="servicebox text-center">
            <div class="service-icon">
              <i class="active dm-icon fa fa-money fa-3x"></i>
              <div class="servicetitle"><h4>Anggaran Transparan</h4><hr></div>
              <p>Lihat rincian penggunaan dana untuk setiap proyek dengan pelaporan keuangan yang jelas.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="servicebox text-center">
            <div class="service-icon">
              <i class="active dm-icon fa fa-users fa-3x"></i>
              <div class="servicetitle"><h4>Manajemen User</h4><hr></div>
              <p>Kelola akun pengguna sistem seperti admin dan operator secara mudah.</p>
              <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary mt-2">Kelola User</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Ajak Tambah Proyek -->
  <section class="section2">
    <div class="container">
      <div class="message text-center">
        <h2 class="big-title">Mulai Kelola <span>Proyek</span> Anda Hari Ini!</h2>
        <p class="small-title">Buat proyek baru, atur tahapan, dan pantau progresnya langsung dari dashboard ini.</p>
        <a class="button large" href="{{ route('proyek.create') }}">+ Tambah Proyek Baru</a>
      </div>
    </div>
  </section>

  <!-- 🔘 Floating WhatsApp Button -->
  <img src="{{ asset('assets/img/whatsapp-icon.png') }}" class="whatsapp-float" alt="WhatsApp">
  <a href="https://wa.me/6285156845682?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20Proyek."
     target="_blank"
     class="whatsapp-float"
     title="Hubungi via WhatsApp">
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
      box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
      z-index: 1000;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .whatsapp-float:hover {
      transform: scale(1.1);
      box-shadow: 2px 4px 12px rgba(0,0,0,0.3);
      color: #fff;
      text-decoration: none;
    }

    .whatsapp-float .my-float {
      margin-top: 14px;
    }
  </style>
@endsection
