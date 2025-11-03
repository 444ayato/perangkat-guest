@include('layouts.guest.header')



<body>

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    @include('layouts.guest.footer')

</body>
</html>
