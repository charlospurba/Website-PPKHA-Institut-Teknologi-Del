<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daftar Acara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>
    @include('components.navbar')

    <section id="acara-content" class="container py-5">
        <h1 class="text-center mb-5">Daftar Acara</h1>

        @if ($acara && $acara->count())
            @foreach ($acara as $item)
                <div class="card mb-4" style="background-color: #E6EDF4; border: none;">
                    <div class="card-body d-flex">
                        <!-- Thumbnail -->
                        <div class="flex-shrink-0 me-3">
                            @if ($item->lampiran && count($item->lampiran))
                                @php
                                    $image = collect($item->lampiran)->first(function ($file) {
                                        return in_array(pathinfo($file, PATHINFO_EXTENSION), [
                                            'jpg',
                                            'jpeg',
                                            'png',
                                            'gif',
                                        ]);
                                    });
                                @endphp
                                @if ($image)
                                    <img src="{{ asset('assets/vendor/img/logo.png') }}" alt="{{ $item->judul_acara }}"
                                        class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-light d-flex justify-content-center align-items-center"
                                        style="width: 80px; height: 80px;">
                                        <span>No Image</span>
                                    </div>
                                @endif
                            @else
                                <div class="rounded-circle bg-light d-flex justify-content-center align-items-center"
                                    style="width: 80px; height: 80px;">
                                    <span>No Image</span>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div>
                            <h5 class="mb-1">
                                <a href="{{ route('acara.show', $item->id) }}" class="text-decoration-none text-dark">
                                    {{ $item->judul_acara }}
                                </a>
                            </h5>
                            <p class="text-muted mb-0" style="font-size: 14px;">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">Tidak ada acara saat ini.</p>
        @endif
    </section>

    @include('components.footer')

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
