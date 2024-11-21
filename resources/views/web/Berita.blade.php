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

    @section('title', 'Berita - PPKHA IT Del')

    <section id="berita-content" class="container py-5">
        <h1 class="text-center mb-5">Daftar Berita</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($berita && $berita->count())
            @foreach ($berita as $item)
                <div class="berita-item mb-5">
                    <h2 class="text-center">{{ $item->judul_berita }}</h2>

                    @if ($item->cover_berita)
                        <img src="{{ asset('storage/' . $item->cover_berita) }}" alt="{{ $item->judul_berita }}"
                            class="img-fluid mb-3">
                    @endif

                    <p>{{ $item->detail_berita }}</p>

                    <!-- Action buttons if needed -->
                    <a href="{{ route('berita.show', $item->id) }}" class="btn btn-info">Lihat Detail</a>
                </div>
                <hr>
            @endforeach
        @else
            <p class="text-center">Tidak ada berita saat ini.</p>
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
