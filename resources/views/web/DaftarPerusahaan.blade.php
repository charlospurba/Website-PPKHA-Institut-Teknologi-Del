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
</head>

<body style="background-color: #F0F0F0;"> <!-- Background abu-abu -->
    @include('components.navbar')

    <section id="perusahaan-content" class="container py-5">
        <h1 class="text-center mb-5"
            style="font-family: 'Arial', sans-serif; font-weight: 700; font-size: 2.5rem; color: #333;">
            Daftar Perusahaan
        </h1>
        <hr style="border-top: 2px solid #FF6347; width: 70%; margin: 20px auto;">

        <!-- Form Pencarian -->
        <section class="container py-3 mb-5">
            <div class="d-flex justify-content-end">
                <div class="card shadow-sm border-0" style="border-radius: 8px; width: auto;">
                    <div class="card-body p-0">
                        <form action="{{ route('perusahaan.search') }}" method="GET" class="d-flex">
                            <div class="input-group" style="max-width: 300px;">
                                <input type="text" name="query" class="form-control"
                                    placeholder="Cari perusahaan..." aria-label="Search">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        @if ($perusahaan && $perusahaan->count())
            <div class="row g-4">
                @foreach ($perusahaan as $item)
                    <div class="col-md-12">
                        <div class="card shadow-sm d-flex flex-row align-items-center"
                            style="border-radius: 10px; background-color: #ffffff;">
                            <!-- Gambar di sebelah kiri -->
                            <div style="flex: 0 0 80px; margin-right: 16px;">
                                @if ($item->cover_perusahaan)
                                    <img src="{{ asset('storage/' . $item->cover_perusahaan) }}" alt="Cover"
                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <div
                                        style="width: 80px; height: 80px; background-color: #ddd; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                        <span>No Image</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Konten di sebelah kanan -->
                            <div class="card-body">
                                <h5 class="card-title mb-2">
                                    <a href="{{ route('perusahaan.show', $item->id) }}"
                                        class="text-dark text-decoration-none">
                                        {{ $item->nama_perusahaan }}
                                    </a>
                                </h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text mb-0">{{ $item->daerah_perusahaan }}</p>
                                    <a href="{{ route('perusahaan.show', $item->id) }}"
                                        class="text-primary text-decoration-none">Detail</a>
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
            <p class="text-center" style="font-size: 1.1rem; color: #777;">Tidak ada daftar perusahaan saat ini.</p>
        @endif




    </section>

    @include('components.footer')

    <!-- JS here -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
