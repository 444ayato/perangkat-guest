<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pembangunan & Monitoring Proyek - Guest</title>
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
</head>

<body>


    {{-- NAVBAR --}}
    <header class="header">
        <div class="container">
            <div class="site-header clearfix">
                <div class="col-lg-3 col-md-3 col-sm-12 title-area">
                    <div class="site-title">
                        <a href="{{ url('/') }}"><h4>PRO<span>MON</span></h4></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div id="nav" class="right">
                        <div class="container clearfix">
                            <ul id="jetmenu" class="jetmenu blue">
                               <li><a href="{{ route('guest.dashboard') }}">Home</a></li>
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

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="footer text-center mt-5">
        <p class="mt-3 mb-0">© {{ date('Y') }} Pembangunan & Monitoring Proyek — Guest View</p>
    </footer>

    <!-- JS -->
    <script src="{{asset('assets-guest/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets-guest/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets-guest/js/main.js')}}"></script>

</body>
</html>
