<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detail Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    @include('components.navbar')

    <section id="berita-detail"
        style="max-width: 1000px; margin: 0 auto; padding: 30px 20px; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; margin-top: 30px;">
        <!-- Judul Berita -->
        <div class="card-body text-left">
            <h1 class="card-title mb-3" style="font-size: 2rem; font-weight: bold;">
                {{ $berita->judul_berita }}
            </h1>
            <p class="text-muted"> <strong style="font-weight: bold; color: #333;">Tanggal Publish:</strong>
                {{ $berita->created_at->format('d F Y') }}</p>
        </div>

        <!-- Gambar -->
        @if ($berita->gambar && count($berita->gambar))
            <div id="beritaCarousel" class="carousel slide" data-bs-ride="carousel"
                style="max-width: 600px; margin: 0 auto;">
                <div class="carousel-inner">
                    @foreach ($berita->gambar as $index => $file)
                        @if (Storage::disk('public')->exists($file))
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $file) }}" class="d-block w-100"
                                    alt="{{ basename($file) }}">
                            </div>
                        @else
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <p class="text-center">Gambar tidak tersedia</p>
                            </div>
                        @endif
                    @endforeach
                </div>
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
        @else
            <div class="text-center my-4">
                <p>Gambar tidak tersedia.</p>
            </div>
        @endif

        <!-- Konten Berita -->
        <div class="card-body">
            <p class="card-text" style="text-align: justify; font-size: 1.1rem;">
                {!! nl2br(e($berita->detail_berita)) !!}
            </p>
        </div>
    </section>

    @include('components.footer')

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
