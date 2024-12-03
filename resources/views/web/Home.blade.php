<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Informasi Karir IT Del</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/vendor/img/logo.png') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>

    @include('components.navbar')

    <!-- Acara Terbaru Section -->
    <section id="acara-terbaru" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Acara Terbaru</h2>
            <div class="row">
                @foreach ($acaraTerbaru as $acara)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm d-flex flex-column">
                            <div class="card-body d-flex flex-column">
                                <!-- Tanggal Dipublikasikan -->
                                <small class="text-muted mb-2">{{ $acara->created_at->format('d F Y') }}</small>

                                <!-- Judul Acara sebagai Link -->
                                <h5 class="card-title">
                                    <a href="{{ route('acara.show', $acara->id) }}" class="text-decoration-none">
                                        {{ $acara->judul_acara }}
                                    </a>
                                </h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($acara->detail_acara, 100) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Artikel Terbaru Section -->
    <section id="artikel-terbaru" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Artikel Terbaru</h2>
            <div class="row">
                @foreach ($artikelTerbaru->take(4) as $artikel)
                    <!-- Menampilkan hanya 4 artikel -->
                    <div class="col-md-3 mb-4"> <!-- Menampilkan artikel dalam 4 kolom -->
                        <div class="card h-100 shadow-sm d-flex flex-column">
                            <!-- Gambar Artikel -->
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top"
                                alt="gambar artikel" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <!-- Tanggal Dipublikasikan -->
                                <small class="text-muted mb-2">{{ $artikel->created_at->format('d F Y') }}</small>

                                <!-- Judul Artikel sebagai Link (klik judul untuk lihat detail) -->
                                <h5 class="card-title">
                                    <a href="{{ route('artikel.show', $artikel->id) }}" class="text-decoration-none">
                                        {{ $artikel->judul_artikel }}
                                    </a>
                                </h5>

                                <!-- Deskripsi Singkat Artikel -->
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($artikel->isi_artikel, 100) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    @include('components.footer')

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
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