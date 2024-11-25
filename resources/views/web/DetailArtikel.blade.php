<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $artikel->judul_artikel }} - Sistem Informasi Karir IT Del</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
</head>

<body>
    @include('components.navbar')

    <section id="detail-artikel" class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-4">{{ $artikel->judul_artikel }}</h1>
                <p class="text-center text-muted">{{ $artikel->created_at->format('d F Y') }}</p>

                @if ($artikel->cover_artikel)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $artikel->cover_artikel) }}" alt="{{ $artikel->judul_artikel }}"
                            class="img-fluid" style="border-radius: 10px; max-height: 400px; object-fit: cover;">
                    </div>
                @endif

                <p>{!! nl2br(e($artikel->isi_artikel)) !!}</p>

                @if ($artikel->sumber_artikel)
                    <p class="text-muted">
                        <strong>Sumber: </strong>
                        <a href="{{ $artikel->sumber_artikel }}" target="_blank">{{ $artikel->sumber_artikel }}</a>
                    </p>
                @endif
            </div>
        </div>
    </section>

    @include('components.footer')

    <!-- JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
