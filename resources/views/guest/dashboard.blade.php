<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard - Pembangunan & Monitoring Proyek</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicons -->
  <link href="{{asset('assets-guest/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets-guest/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Ruda:400,900,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('assets-guest/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('assets-guest/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets-guest/lib/prettyphoto/css/prettyphoto.css')}}" rel="stylesheet">
  <link href="{{asset('assets-guest/lib/hover/hoverex-all.css')}}" rel="stylesheet">
  <link href="{{asset('assets-guest/lib/jetmenu/jetmenu.css')}}" rel="stylesheet">
  <link href="{{asset('assets-guest/lib/owl-carousel/owl-carousel.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('assets-guest/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets-guest/css/colors/blue.css')}}">

  <!-- Tambahan CSS Perbaikan -->
  <style>
  /* ===== INTRO SECTION FIX ===== */
  .intro-section {
    position: relative;
    background: url('{{asset('assets-guest/img/slider_02.png')}}') center center / cover no-repeat;
    padding: 140px 20px;
    color: #fff;
    text-align: center;
    overflow: hidden;
  }

  /* Lapisan gelap di atas gambar */
  .intro-section::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.55);
    z-index: 0;
  }

  .intro-section .container {
    position: relative;
    z-index: 1;
  }

  /* Teks utama */
  .intro-section h1 {
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 20px;
    color: #fff;
  }

  /* Paragraf deskripsi */
  .intro-section p {
    font-size: 18px;
    max-width: 700px;
    margin: 0 auto 25px;
    color: #f1f1f1;
    line-height: 1.6;
  }

  /* Tombol */
  .intro-section .dmbutton {
    display: inline-block;
    background: #007bff;
    color: #fff;
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
  }

  .intro-section .dmbutton:hover {
    background: #0056b3;
    text-decoration: none;
  }
  </style>
</head>

<body>

  <!-- ======= TOPBAR ======= -->
  <div class="topbar clearfix">
    <div class="container">
      <div class="col-lg-12 text-right">
        <div class="social_buttons">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-google-plus"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-rss"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= HEADER ======= -->
  <header class="header">
    <div class="container">
      <div class="site-header clearfix">
        <div class="col-lg-3 col-md-3 col-sm-12 title-area">
          <div class="site-title" id="title">
            <a href="{{ url('/dashboard') }}">
              <h4>PRO<span>MON</span></h4>
            </a>
          </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12">
          <div id="nav" class="right">
            <div class="container clearfix">
              <ul id="jetmenu" class="jetmenu blue">
                <li class="active"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li><a href="{{ route('proyek.index') }}">Data Proyek</a></li>
                <li><a href="#">Tentang</a></li>
                <li><a href="#">Kontak</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- ======= INTRO SECTION ======= -->
  <section id="intro" class="text-center intro-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h1 class="fw-bold mb-3">🏗️ Pembangunan & Monitoring Proyek</h1>
          <p>
            Kelola, pantau, dan evaluasi seluruh proyek pembangunan Anda dalam satu sistem terpadu.  
            Efisien, transparan, dan mudah digunakan.
          </p>
          <a href="{{ route('proyek.index') }}" class="dmbutton large">
            🔨 Lihat Data Proyek
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= FITUR UTAMA ======= -->
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
              <div class="servicetitle"><h4>Kolaborasi Tim</h4><hr></div>
              <p>Koordinasikan antara kontraktor, pengawas, dan instansi terkait dengan mudah.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ======= AJAKAN ======= -->
  <section class="section2">
    <div class="container">
      <div class="message text-center">
        <h2 class="big-title">Mulai Kelola <span>Proyek</span> Anda Hari Ini!</h2>
        <p class="small-title">Buat proyek baru, atur tahapan, dan pantau progresnya langsung dari dashboard ini.</p>
        <a class="button large" href="{{ route('proyek.create') }}">+ Tambah Proyek Baru</a>
      </div>
    </div>
  </section>

  <!-- ======= FOOTER ======= -->
  <footer class="footer">
    <div class="container">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <h4 class="title">Tentang Aplikasi</h4>
        <p>
          Sistem “Pembangunan & Monitoring Proyek” adalah platform berbasis web  
          untuk membantu instansi atau perusahaan dalam memantau seluruh kegiatan proyek pembangunan.
        </p>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 text-right">
        <h4 class="title">Hubungi Kami</h4>
        <p><i class="fa fa-envelope"></i> info@pembangunanproyek.com</p>
        <p><i class="fa fa-phone"></i> +62 812 3456 7890</p>
      </div>
    </div>
    <div class="copyrights">
      <div class="container text-center">
        <p>© {{ date('Y') }} Sistem Pembangunan & Monitoring Proyek. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <!-- ======= JAVASCRIPT FILES ======= -->
  <script src="{{asset('assets-guest/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets-guest/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets-guest/lib/prettyphoto/js/prettyphoto.js')}}"></script>
  <script src="{{asset('assets-guest/lib/owl-carousel/owl-carousel.js')}}"></script>
  <script src="{{asset('assets-guest/lib/jetmenu/jetmenu.js')}}"></script>
  <script src="{{asset('assets-guest/lib/easypiechart/easypiechart.min.js')}}"></script>
  <script src="{{asset('assets-guest/js/main.js')}}"></script>
</body>
</html>
