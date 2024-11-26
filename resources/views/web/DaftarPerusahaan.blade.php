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
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
</head>

<body>
    @include('components.navbar')
    @extends('layouts.app')

    @section('title', 'Daftar Perusahaan - PPKHA IT Del')

    <section id="perusahaan-content" class="container py-5">
        <h1 class="text-center mb-5">Daftar Perusahaan</h1>

        @if ($perusahaan && $perusahaan->count())
            <div class="row g-4">
                @foreach ($perusahaan as $item)
                    <div class="col-md-12">
                        <div class="card shadow-sm d-flex flex-row align-items-center" style="border-radius: 10px;">
                            <!-- Gambar di sebelah kiri -->
                            @if ($item->cover)
                                <div style="flex: 0 0 150px; overflow: hidden; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                                    <img src="{{ asset('storage/' . $item->cover_perusahaan) }}" 
                                         alt="{{ $item->nama_perusahaan }}" 
                                         class="img-fluid" 
                                         style="height: 100%; width: 150px; object-fit: cover;">
                                </div>
                            @else
                                <div style="flex: 0 0 150px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; height: 100%; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                                    <span>No Image</span>
                                </div>
                            @endif

                            <!-- Konten di sebelah kanan -->
                            <div class="card-body">
                                <h5 class="card-title mb-2"><a href="{{ route('perusahaan.show', $item->id) }}" class="text-dark text-decoration-none">
                                    {{ $item->nama_perusahaan }}
                                </a></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text mb-0">{{ $item->daerah_perusahaan }}</p>
                                    <a href="{{ route('perusahaan.show', $item->id) }}" class="text-primary text-decoration-none">Detail</a>
                                </div>
                                <p class="card-text text-truncate">
                                    {{ Str::limit($item->deskripsi_perusahaan, 100) }}
                                     </p>
                               
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">Tidak ada daftar perusahaan saat ini.</p>
        @endif
    </section>

    @include('components.footer')

    <!-- JS here -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
