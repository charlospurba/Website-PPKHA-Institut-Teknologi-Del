<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Informasi Karir IT Del</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/vendor/img/logo.png') }}">

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

    <div class="container py-5">
        <h1 class="text-center mb-5">Daftar Lowongan Kerja</h1>

        <!-- Cek apakah ada data lowongan -->
        @if ($lowongan->isEmpty())
            <p class="text-center">Tidak ada data lowongan saat ini.</p>
        @else
            <!-- Looping data lowongan -->
            <div class="row">
                @foreach ($lowongan as $loker)
                <div class="col-md-12 mb-3">
                    <div class="card" style="background-color: #E6EDF4; border-radius: 8px;">
                        <div class="card-body d-flex align-items-center">
                            <!-- Bagian Gambar -->
                            <div style="flex: 0 0 150px; margin-right: 20px;">
                                <img src="{{ asset('storage/' . $loker->cover) }}" alt="Cover"
                                     style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                            </div>

                            <!-- Bagian Konten -->
                            <div style="flex: 1;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h5 style="font-weight: bold; margin: 0;">
                                        {{ $loker->perusahaan->nama_perusahaan ?? 'Tidak Diketahui' }}
                                    </h5>
                                    <a href="#" class="btn btn-primary" style="font-size: 14px;">Lihat Detail</a>
                                </div>
                                <p> {{ $loker->judul }}</p>
                                <p class="card-text text-truncate">
                                    {{ Str::limit($loker->deskripsi, 100) }}
                                     </p>
                                <p> <span style="display: inline-block; background-color: #C19A6B; color: white; padding: 3px 5px; border-radius: 10px; font-weight: bold;">
                                        {{ $loker->jenis_pekerjaan }}
                                    </span>
                                </p>
                               
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    @include('components.footer')

    <!-- JS here -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
