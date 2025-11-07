<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Dashboard - Pembangunan & Monitoring Proyek')</title>
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
        /* Custom topbar */
        .topbar {
            background-color: #3498db;
            padding: 10px 0;
        }

        .topbar .container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        /* Header section */
        header.header {
            background-color: #fff;
            border-bottom: 2px solid #3498db;
            padding: 10px 0;
        }

        .site-title h4 {
            font-weight: 900;
            font-size: 26px;
            color: #333;
        }

        .site-title span {
            color: #3498db;
        }

        #jetmenu li a {
            font-weight: 600;
        }

        /* Welcome message */
        .welcome-text {
            margin-top: 40px;
            text-align: center;
        }

        .welcome-text h2 {
            font-weight: 700;
            color: #333;
        }

        .welcome-text p {
            color: #555;
        }
    </style>
</head>

<body>
    <!-- Topbar -->
    <div class="topbar clearfix">
        <div class="container">
            <a href="{{ url('/logout') }}" class="btn btn-danger btn-sm"
                style="font-weight: 600; padding: 6px 14px;">Logout</a>
        </div>
    </div>

    <!-- Header / Navbar -->
    <header class="header">
        <div class="container">
            <div class="site-header clearfix d-flex justify-content-between align-items-center flex-wrap">
                <!-- Logo / Title -->
                <div class="site-title">
                    <a href="{{ url('/dashboard') }}">
                        <h4>E-<span>PROYEK</span></h4>
                    </a>
                </div>

                <!-- Navigation -->
                <nav id="nav">
                    <ul id="jetmenu" class="jetmenu blue">
                        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li><a href="{{ route('proyek.index') }}">Data Proyek</a></li>
                        <li><a href="{{ route('users.index') }}">Manajemen User</a></li>
                        <li class="nav-item">
    <a class="nav-link" href="{{ route('about') }}">Tentang</a>
</li>

                        <li><a href="#">Kontak</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Welcome Section (Hanya di Dashboard) -->
        @if (request()->is('dashboard'))
        <div class="container welcome-text">
            <h2>Selamat Datang, {{ session('user')->name ?? 'User' }}!</h2>
            <p>Anda berhasil login ke Dashboard.</p>
        </div>
        @endif
    </header>
