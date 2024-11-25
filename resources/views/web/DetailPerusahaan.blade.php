<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detail Perusahaan - PPKHA IT Del</title>
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

    <section id="detail-perusahaan" class="container py-5">
        <h1 class="text-center mb-5">{{ $perusahaan->nama_perusahaan }}</h1>

        <!-- Informasi Perusahaan -->
        <div class="mb-4">
            <h5>Informasi Perusahaan:</h5>
            <p>{{ $perusahaan->deskripsi_perusahaan }}</p>
            <p><strong>Lokasi:</strong> {{ $perusahaan->daerah_perusahaan }}</p>
            @if ($perusahaan->link_perusahaan)
                <p><strong>Website:</strong> 
                    <a href="{{ $perusahaan->link_perusahaan }}" target="_blank" class="text-primary">
                        {{ $perusahaan->link_perusahaan }}
                    </a>
                </p>
            @endif
        </div>

        <!-- Lowongan Pekerjaan -->
        <div class="mb-4">
            <h5>Lowongan Pekerjaan:</h5>
            @if ($lowongan && $lowongan->count())
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
                                <h5 style="font-weight: bold;">{{ $loker->judul }}</h5>
                                <p><strong>Perusahaan:</strong> {{ $loker->perusahaan->nama_perusahaan ?? 'Tidak Diketahui' }}</p>
                                <p><strong>Lokasi:</strong> {{ $loker->lokasi }}</p>
                                <p><strong>Jenis Pekerjaan:</strong> {{ $loker->jenis_pekerjaan }}</p>
                                <a href="#" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
                <p class="text-muted">Tidak ada lowongan pekerjaan saat ini.</p>
            @endif
        </div>
    </section>

    @include('components.footer')

    <!-- JS here -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
