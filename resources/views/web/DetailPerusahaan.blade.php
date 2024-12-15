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
        <div style="display: flex; align-items: center; margin-bottom: 20px;">
            <!-- Gambar -->
            <div style="flex: 0 0 80px; margin-right: 16px;">
                @if ($perusahaan->cover_perusahaan)
                    <img src="{{ asset('storage/' . $perusahaan->cover_perusahaan) }}" alt="Cover"
                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                @else
                    <div
                        style="width: 80px; height: 80px; background-color: #ddd; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <span>No Image</span>
                    </div>
                @endif
            </div>
        
            <!-- Detail Perusahaan -->
            <div style="flex: 1;">
                <!-- Judul -->
                <h1 class="text" style="margin: 0; font-size: 24px;">{{ $perusahaan->nama_perusahaan }}</h1>
        
                <!-- Lokasi -->
                <p style="margin: 4px 0;"><strong>Lokasi:</strong> {{ $perusahaan->daerah_perusahaan }}</p>
        
                <!-- Website -->
                @if ($perusahaan->link_perusahaan)
                    <p style="margin: 4px 0;"><strong>Website:</strong> 
                        <a href="{{ $perusahaan->link_perusahaan }}" target="_blank" class="text-primary">
                            {{ $perusahaan->link_perusahaan }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
        
        <!-- Informasi Perusahaan -->
        <div class="card mb-4 shadow-sm">
    <div class="card-body">
        <!-- Lokasi -->

        <!-- Informasi Perusahaan -->
        <h5 class="card-title">Informasi Perusahaan:</h5>
        <p class="card-text">{!! nl2br(e($perusahaan->deskripsi_perusahaan)) !!}</p>
    </div>
</div>

        

        <!-- Lowongan Pekerjaan -->
        <div class="mb-4">
            <h5>Lowongan Pekerjaan:</h5>
            @if ($lowongan && $lowongan->count())
            <div class="row">
                @foreach ($lowongan as $loker)
                <div class="col-md-12 mb-3">
                    <div class="card" style="background-color: #E6EDF4; border-radius: 8px; max-width: auto; margin: 0 auto;">
                        <div class="card-body d-flex align-items-center" style="padding: 10px;">
                            <!-- Bagian Gambar -->
                            <div style="flex: 0 0 100px; margin-right: 10px;">
                                <img src="{{ asset('storage/' . $loker->cover) }}" alt="Cover"
                                     style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                            </div>
        
                            <!-- Bagian Konten -->
                            <div style="flex: 1;">
                                <h5 style="font-size: 16px; font-weight: bold; margin-bottom: 8px;">{{ $loker->judul }}</h5>
                                <p style="font-size: 14px; margin-bottom: 4px;"><strong>Perusahaan:</strong> {{ $loker->perusahaan->nama_perusahaan ?? 'Tidak Diketahui' }}</p>
                                <p style="font-size: 14px; margin-bottom: 4px;"><strong>Lokasi:</strong> {{ $loker->lokasi }}</p>
                                <p style="font-size: 14px; margin-bottom: 8px;"><strong>Jenis Pekerjaan:</strong> {{ $loker->jenis_pekerjaan }}</p>
                                <a href="{{ route('lowongan.show', $loker->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
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
