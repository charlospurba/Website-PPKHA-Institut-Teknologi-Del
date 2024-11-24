<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detail Acara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>
    @include('components.navbar')

    <section id="acara-detail" class="container py-5">
        <h1 class="text-center mb-5">{{ $acara->judul_acara }}</h1>

        <p>{{ $acara->detail_acara }}</p>

        <h5>Lampiran:</h5>
        @if ($acara->lampiran && count($acara->lampiran))
            <ul>
                @foreach ($acara->lampiran as $file)
                    <li>
                        @if (Storage::disk('public')->exists($file))
                            <a href="{{ asset('storage/' . $file) }}" target="_blank">{{ basename($file) }}</a>
                        @else
                            <span>File tidak tersedia</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada lampiran.</p>
        @endif
    </section>

    @include('components.footer')

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
