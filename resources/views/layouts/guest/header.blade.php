<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard - Pembangunan & Monitoring Proyek</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicons -->
  <link href="{{ asset('assets-guest/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets-guest/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Ruda:400,900,700" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="{{ asset('assets-guest/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS -->
  <link href="{{ asset('assets-guest/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-guest/lib/prettyphoto/css/prettyphoto.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-guest/lib/hover/hoverex-all.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-guest/lib/jetmenu/jetmenu.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-guest/lib/owl-carousel/owl-carousel.css') }}" rel="stylesheet">

  <!-- Main CSS -->
  <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets-guest/css/colors/blue.css') }}">

  <style>
    .intro-section {
      position: relative;
      background: url('{{ asset('assets-guest/img/slider_02.png') }}') center center / cover no-repeat;
      padding: 140px 20px;
      color: #fff;
      text-align: center;
      overflow: hidden;
    }
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
    .intro-section h1 {
      font-size: 42px;
      font-weight: 700;
      margin-bottom: 20px;
    }
    .intro-section p {
      font-size: 18px;
      max-width: 700px;
      margin: 0 auto 25px;
      line-height: 1.6;
    }
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
    }
  </style>
</head>

<body>

<!-- Topbar -->
<div class="topbar clearfix" style="background-color: #3498db; padding: 10px 0;">
  <div class="container d-flex align-items-center">
    <div class="social_buttons" style="display: flex; gap: 12px; align-items: center;"></div>
    <a href="{{ url('/logout') }}" class="btn btn-danger btn-sm" style="">
      Logout
    </a>
  </div>
</div>

<!-- Header / Navbar -->
<header class="header">
  <div class="container">
    <div class="site-header clearfix">
      <div class="col-lg-3 col-md-3 col-sm-12 title-area">
        <div class="site-title" id="title">
          <a href="{{ url('/dashboard') }}">
            <h4>E-<span>PROYEK</span></h4>
          </a>
        </div>
      </div>

      <div class="col-lg-9 col-md-9 col-sm-12">
        <div id="nav" class="right">
          <div class="container clearfix">
            <ul id="jetmenu" class="jetmenu blue">
              <li class="active"><a href="{{ url('/dashboard') }}">Home</a></li>
              <li><a href="{{ route('proyek.index') }}">Data Proyek</a></li>
              <li><a href="{{ route('users.index') }}">Manajemen User</a></li>
              <li><a href="#">Tentang</a></li>
              <li><a href="#">Kontak</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center mt-5">
    <h2>Selamat Datang, {{ session('user')->name ?? 'User' }}!</h2>
    <p>Anda berhasil login ke Dashboard.</p>
  </div>
</header>
