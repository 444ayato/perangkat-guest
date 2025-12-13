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
        /* 🌐 Topbar */
        .topbar {
            background-color: #3498db;
            padding: 10px 0;
        }

        .topbar .container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 14px;
        }

        /* 🧍‍♂️ Profile Image */
        .profile-pic {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .profile-pic:hover {
            transform: scale(1.07);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        /* 🧭 Header */
        header.header {
            background-color: #fff;
            border-bottom: 2px solid #3498db;
            padding: 10px 0;
        }

        .site-title h4 {
            font-weight: 900;
            font-size: 26px;
            color: #333;
            margin: 0;
        }

        .site-title span {
            color: #3498db;
        }

        /* 🖼️ Logo Header */
.logo-header {
    height: 110px;
    width: auto;
    object-fit: contain;
}

        #jetmenu li a {
            font-weight: 600;
        }

        /* 👋 Welcome text */
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

        /* Dropdown Menu Styling */
        #jetmenu ul.dropdown {
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        #jetmenu ul.dropdown li {
            border-bottom: 1px solid #f0f0f0;
        }

        #jetmenu ul.dropdown li:last-child {
            border-bottom: none;
        }

        #jetmenu ul.dropdown li a {
            padding: 10px 20px;
            color: #333;
            transition: all 0.3s;
        }

        #jetmenu ul.dropdown li a:hover {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>

<body>
    <!-- 🔹 Topbar -->
    <div class="topbar clearfix">
        <div class="container">
            <!-- Tombol Logout (kiri) -->
            <a href="{{ route('logout.get') }}" class="btn btn-danger btn-sm"
                style="font-weight: 600; padding: 6px 14px;">Logout</a>

            <!-- Foto Profil (kanan) -->
            <img src="https://i.pinimg.com/originals/48/0a/d4/480ad4ef2dcf7f924f96bbd83fb2ff22.jpg"
                alt="Profile Picture" class="profile-pic">
            <span class="profile-name text-white">Halo, {{ Auth::user()->name ?? 'User' }}!</span>
        </div>
    </div>

    <!-- 🔹 Header / Navbar -->
    <header class="header">
        <div class="container">
            <div class="site-header clearfix d-flex justify-content-between align-items-center flex-wrap">
                <!-- Logo / Title -->
                <div class="site-title">
    <a href="{{ url('/dashboard') }}" class="d-flex align-items-center">
        <img src="{{ asset('foto logo.jpeg') }}"
             alt="Logo E-Proyek"
             class="logo-header">
    </a>
</div>

                <!-- Navigation -->
                <nav id="nav">
                    <ul id="jetmenu" class="jetmenu blue">
                        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        
                        <!-- Data Master Dropdown -->
                        <li class="{{ request()->is('proyek*') || request()->is('kontraktor*') || request()->is('lokasi*') ? 'active' : '' }}">
                            <a href="#">Data Master</a>
                            <ul class="dropdown">
                                <li class="{{ request()->is('proyek*') ? 'active' : '' }}">
                                    <a href="{{ route('proyek.index') }}">Data Proyek</a>
                                </li>
                                <li class="{{ request()->is('kontraktor*') ? 'active' : '' }}">
                                    <a href="{{ route('kontraktor.index') }}">Data Kontraktor</a>
                                </li>
                                <li class="{{ request()->is('lokasi*') ? 'active' : '' }}">
                                    <a href="{{ route('lokasi.index') }}">Data Lokasi</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Monitoring Dropdown -->
                        <li class="{{ request()->is('tahapan*') || request()->is('progres*') ? 'active' : '' }}">
                            <a href="#">Monitoring</a>
                            <ul class="dropdown">
                                <li class="{{ request()->is('tahapan*') ? 'active' : '' }}">
                                    <a href="{{ route('tahapan.index') }}">Tahapan Proyek</a>
                                </li>
                                <li class="{{ request()->is('progres*') ? 'active' : '' }}">
                                    <a href="{{ route('progres.index') }}">Progress Proyek</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Manajemen -->
                        <li class="{{ request()->is('users*') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}">Manajemen User</a>
                        </li>

                        <!-- Lainnya -->
                        <li class="{{ request()->is('about*') ? 'active' : '' }}">
                            <a href="{{ route('about') }}">Tentang</a>
                        </li>
                        <li>
                            <a href="#">Kontak</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- 🔹 Welcome Section (Hanya di Dashboard) -->
        @if (request()->is('dashboard'))
            <div class="container welcome-text">
                <h2>Selamat Datang, {{ Auth::user()->name ?? 'User' }}!</h2>
                <p>Anda berhasil login ke Dashboard.</p>
            </div>

            <!-- Card Statistik Ringkas -->
            <div class="container mt-4">
                <div class="row text-center">

                    <div class="col-md-3">
                        <div class="p-2 shadow-sm bg-white rounded">
                            <h6>Proyek</h6>
                            <h4>{{ $totalProyek ?? 0 }}</h4>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-2 shadow-sm bg-white rounded">
                            <h6>Lokasi</h6>
                            <h4>{{ $totalLokasi ?? 0 }}</h4>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-2 shadow-sm bg-white rounded">
                            <h6>Kontraktor</h6>
                            <h4>{{ $totalKontraktor ?? 0 }}</h4>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-2 shadow-sm bg-white rounded">
                            <h6>User</h6>
                            <h4>{{ $totalUser ?? 0 }}</h4>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </header>
</body>
</html>