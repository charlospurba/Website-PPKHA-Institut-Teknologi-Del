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
    <style>
        .card {
            height: 350px; /* Tentukan tinggi tetap untuk card */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card img {
            width: 100%;
            height: 200px; /* Tentukan tinggi tetap untuk gambar */
            object-fit: cover; /* Agar gambar tidak terdistorsi dan tetap memenuhi area */
        }

        .card-body {
            flex-grow: 1;
            overflow: hidden;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap; /* Untuk memastikan judul tidak meluap */
        }

        .card-text {
            max-height: 3.6em; /* Batasi tinggi teks agar tidak terlalu panjang */
            overflow: hidden;
            text-overflow: ellipsis; /* Menambahkan elipsis jika teks terpotong */
        }

        .card a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .input-group {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body  style="background-color: #F0F0F0;">
    @include('components.navbar')


    <section id="berita-content" class="container py-5">
        <h1 class="text-center mb-5"
            style="font-family: 'Arial', sans-serif; font-weight: 700; font-size: 2.5rem; color: #333;">
            Berita Utama
        </h1>
        <hr style="border-top: 2px solid #FF6347; width: 70%; margin: 20px auto;">
        
        <!-- Form Pencarian -->
        <div class="d-flex justify-content-end mb-4">
            <form action="{{ route('berita.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berita berdasarkan judul..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    
        <!-- Display success message -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    
        @if ($berita && $berita->count())
        @foreach ($berita as $item)
        <div class="card mb-4" style="background-color: #FFFFFF; border: none;">
            <div class="row g-0r">
                @php
                // Ambil gambar secara random dari array gambar
                $randomImage = $item->gambar ? $item->gambar[array_rand($item->gambar)] : null;
                @endphp
                @if ($randomImage)
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $randomImage) }}" class="img-fluid rounded-start"
                        alt="{{ $item->judul_berita }}" style="object-fit: cover; height: 200px;">
                </div>
                @endif
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: left; font-size: 1.25rem; font-weight: bold;">{{ $item->judul_berita }}</h5>
                        <a href="{{ route('berita.show', $item->id) }}" class="btn btn-link" style="font-size: 1rem; padding-left: 0; text-align: left;">Lihat Selengkapnya</a>
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
