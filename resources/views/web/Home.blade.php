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

    <!-- Berita Terbaru Section -->
    <section id="berita-terbaru" class="py-5 bg-light">
        <div class="container">

            <!-- Bootstrap Carousel -->
            <div id="beritaCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Carousel Inner -->
                <div class="carousel-inner">
                    @foreach ($beritaTerbaru as $index => $berita)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="card h-100 shadow-sm d-flex flex-column position-relative">
                                <!-- Gambar dengan atribut inline -->
                                <img src="{{ asset('storage/' . (is_array($berita->gambar) ? $berita->gambar[0] : $berita->gambar)) }}"
                                    class="d-block w-100" alt="gambar berita" style="object-fit: cover; height: 90vh;">

                                <!-- Teks dan Judul Artikel yang mengarah ke detail -->
                                <div class="card-body position-absolute bottom-0 start-0 w-100 p-3"
                                    style="background-color: rgba(0, 0, 0, 0.6); color: white;">
                                    <small class="text-muted mb-2">{{ $berita->created_at->format('d F Y') }}</small>

                                    <!-- Judul Artikel dengan Tautan ke Halaman Detail -->
                                    <h5 class="card-title">
                                        <a href="{{ route('berita.show', $berita->id) }}" class="text-decoration-none"
                                            style="color: white;">
                                            {{ $berita->judul_berita }}
                                        </a>
                                    </h5>

                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit($berita->detail_berita, 100) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#beritaCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#beritaCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </section>

    <style>
        .carousel-item img {
            width: 100%;
            height: 90vh;
            object-fit: cover;
        }
    </style>


<section id="lowongan-kerja" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Lowongan Kerja Terbaru</h2>
        <div class="row">
            @foreach ($lowonganTerbaru as $loker)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm" style="background-color: #ffffff; border-radius: 8px;">
                        <div class="card-body d-flex align-items-center">
                            <!-- Bagian Gambar -->
                            <div style="flex: 0 0 150px; margin-right: 20px;">
                                <img src="{{ asset('storage/' . $loker->cover) }}" alt="Cover"
                                    style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                            </div>

                            <!-- Bagian Konten -->
                            <div style="flex: 1;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h3 style="font-weight: bold; margin: 0; color: #084A89 ">
                                        {{ $loker->perusahaan->nama_perusahaan ?? 'Tidak Diketahui' }}
                                    </h3>
                                    <span
                                        style="display: inline-block; background-color: #C19A6B; color: white; padding: 3px 5px; border-radius: 10px; font-weight: bold;">
                                        {{ $loker->jenis_pekerjaan }}
                                    </span>
                                </div>
                                <a class="text-decoration-none" href="{{ route('lowongan.show', $loker->id) }}">
                                    {{ $loker->judul }}
                                </a>
                                <!-- Deskripsi Singkat -->
                                <p class="card-text" style="color: #6c757d; font-size: 0.9rem;">
                                    {{ Str::limit($loker->deskripsi, 80, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

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
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($acara->detail_acara, 100) }}
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
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow-sm d-flex flex-column">
                            <!-- Gambar Artikel -->
                            <img src="{{ asset('storage/' . ($artikel->cover_artikel ?? 'default-image.jpg')) }}"
                                class="card-img-top" alt="gambar artikel" style="height: 200px; object-fit: cover;">
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
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($artikel->isi_artikel, 100) }}
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

</body>

</html>
