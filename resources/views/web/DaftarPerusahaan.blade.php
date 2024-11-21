<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Informasi Karir IT Del</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets\vendor\img\logo.png') }}">

    <!-- CSS here -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom-animation.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/flaticon_xoft.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/swiper-bundle.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/meanmenu.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome-pro.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/spacing.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />


</head>

<body>
    @include('components.navbar')

    @extends('layouts.app')

    @section('title', 'Daftar Perusahaan - PPKHA IT Del')


    <section id="perusahaan-content" class="container py-5">
        <h1 class="text-center mb-5">Daftar Perusahaan</h1>

        @if ($perusahaan && $perusahaan->count())
            @foreach ($perusahaan as $item)
                <div class="perusahaan-item text-center">
                    <h2>{{ $item->nama_perusahaan }}</h2>
                    @if ($item->cover)
                        <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->nama_perusahaan }}">
                    @endif
                    @if ($item->link_perusahaan)
                        <p><a href="{{ $item->link_perusahaan }}" target="_blank">Visit Website</a></p>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-center">Tidak ada daftar perusahaan saat ini.</p>
        @endif
    </section>


    @include('components.footer')
    <!-- JS here -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/waypoints.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/magnific-popup.js"></script>
    <script src="assets/js/purecounter.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/countdown.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/swiper-bundle.js"></script>
    <script src="assets/js/isotope-pkgd.js"></script>
    <script src="assets/js/imagesloaded-pkgd.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/main.js"></script>



</body>

</html>
