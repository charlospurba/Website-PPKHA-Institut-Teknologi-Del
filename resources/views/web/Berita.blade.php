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
        <div class="card mb-4">
            <div class="row g-0 align-items-center">
                @if ($item->cover_berita)
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $item->cover_berita) }}"
                        class="img-fluid rounded-start"
                        alt="{{ $item->judul_berita }}">
                </div>
                @endif
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul_berita }}</h5>
                        <p class="card-text text-truncate" style="max-height: 3.6em; overflow: hidden;">
                            {{ $item->detail_berita }}
                        </p>
                        <a href="{{ route('berita.show', $item->id) }}">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
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