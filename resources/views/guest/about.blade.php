<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tentang Aplikasi - Guest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{asset('assets-guest/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets-guest/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets-guest/css/style.css')}}" rel="stylesheet">

    <style>
        .hero {
            background:#f3f6ff; padding:80px 20px; text-align:center;
        }
        .hero h1 { font-weight:700; margin-bottom:15px; }
        .content { max-width:800px; margin:40px auto; font-size:16px; line-height:1.8; }
    </style>
</head>
<body>

<header class="header">
    <div class="container">
        <ul id="jetmenu" class="jetmenu blue" style="margin-top:10px;">
            <li><a href="{{ route('guest.dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ route('proyek.index') }}"><i class="fa fa-database"></i> Data Proyek</a></li>
            <li class="active"><a href="{{ route('guest.about') }}"><i class="fa fa-info-circle"></i> Tentang</a></li>
            <li><a href="#"><i class="fa fa-envelope"></i> Kontak</a></li>
        </ul>
    </div>
</header>

<section class="hero">
    <h1><i class="fa fa-info-circle"></i> Tentang Aplikasi</h1>
    <p>Aplikasi ini dibuat untuk memonitor dan mengelola data proyek pembangunan secara efisien.</p>
</section>

<div class="container content">
    <p>
        Sistem ini bertujuan untuk membantu proses pencatatan, pelaporan, dan pemantauan kegiatan pembangunan.
        Mulai dari input data proyek, monitoring progres, hingga evaluasi pada akhir pengerjaan.
    </p>
    <p>
        Dengan adanya sistem ini, informasi pembangunan menjadi lebih transparan dan mudah diakses masyarakat dan pihak terkait.
    </p>
    <img src="{{asset('assets-guest/img/slider_02.png')}}" class="img-fluid rounded mt-3" alt="Ilustrasi Proyek">
</div>

<footer class="text-center mt-4 p-3 bg-light">
    © {{ date('Y') }} Sistem Monitoring Proyek — Guest
</footer>

</body>
</html>
