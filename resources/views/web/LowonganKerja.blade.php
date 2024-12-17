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
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body style="background-color: #F0F0F0;"> <!-- Warna latar belakang diubah menjadi abu-abu -->
    @include('components.navbar')

    <div class="container py-5">
        <h1 class="text-center mb-5"
            style="font-family: 'Arial', sans-serif; font-weight: 700; font-size: 2.5rem; color: #333;">
            Daftar Lowongan Kerja
        </h1>
        <hr style="border-top: 2px solid #FF6347; width: 70%; margin: 20px auto;">

        <!-- Form Pencarian -->
        <section class="container py-3 mb-5">
            <div class="d-flex justify-content-end">
                <div class="card shadow-sm border-0" style="border-radius: 8px; width: auto;">
                    <div class="card-body p-0">
                        <form action="{{ route('lowongan.search') }}" method="GET" class="d-flex">
                            <div class="input-group" style="max-width: 300px;"> <!-- Adjusted max-width -->
                                <input type="text" name="query" class="form-control" placeholder="Cari lowongan..."
                                    aria-label="Search"
                                    style="padding-left: 10px; height: 36px; border: 1px solid #ddd;">
                                <button type="submit" class="btn btn-primary"
                                    style="border: 1px solid #ddd; height: 36px; padding: 0 12px; background-color: #007bff; border-radius: 0;">
                                    <i class="fas fa-search" style="font-size: 18px;"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cek apakah ada data lowongan -->
        @if ($lowongan->isEmpty())
            <p class="text-center" style="font-size: 1.1rem; color: #777;">Tidak ada data lowongan saat ini.</p>
        @else
            <!-- Looping data lowongan -->
            <div class="row">
                @foreach ($lowongan as $loker)
                    <div class="col-md-12 mb-3">
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
                                        <h5 style="font-weight: bold; margin: 0;">
                                            {{ $loker->perusahaan->nama_perusahaan ?? 'Tidak Diketahui' }}
                                        </h5>
                                        <a href="{{ route('lowongan.show', $loker->id) }}" class="btn btn-primary">
                                            Lihat Detail
                                        </a>
                                    </div>
                                    <p> {{ $loker->judul }}</p>
                                    <p class="card-text text-truncate">
                                        {{ Str::limit($loker->deskripsi, 100) }}
                                    </p>
                                    <p> <span
                                            style="display: inline-block; background-color: #C19A6B; color: white; padding: 3px 5px; border-radius: 10px; font-weight: bold;">
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
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
