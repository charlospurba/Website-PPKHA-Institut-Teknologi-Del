<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daftar Artikel - Sistem Informasi Karir IT Del</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
</head>

<body>
    @include('components.navbar')

    <section id="artikel-content" class="container py-5">
        <h1 class="text-center mb-5">Daftar Artikel</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($artikel && $artikel->count())
            <div class="row">
                @foreach ($artikel as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <!-- Cover Image -->
                            @if ($item->cover_artikel)
                                <img src="{{ asset('storage/' . $item->cover_artikel) }}"
                                    alt="{{ $item->judul_artikel }}" class="card-img-top"
                                    style="border-top-left-radius: 10px; border-top-right-radius: 10px; height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center"
                                    style="height: 200px; background-color: #f4f4f4; color: #999; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                    <span>No Image</span>
                                </div>
                            @endif

                            <!-- Card Content -->
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('artikel.show', $item->id) }}"
                                        style="text-decoration: none; color: #333;">
                                        {{ $item->judul_artikel }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted" style="font-size: 0.9rem;">
                                    {{ Str::limit(strip_tags($item->isi_artikel), 100, '...') }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">{{ $item->created_at->format('d F Y') }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">Tidak ada Artikel saat ini.</p>
        @endif
    </section>

    @include('components.footer')

    <!-- JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
