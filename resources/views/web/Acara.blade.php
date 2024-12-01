<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daftar Acara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body style="background-color: #F0F0F0;">
    @include('components.navbar')

    <!-- Daftar Acara Section -->
    <section id="acara-content" class="container py-5 mt-4">
        <h1 class="text-center mb-5"
            style="font-family: 'Arial', sans-serif; font-weight: 700; font-size: 2.5rem; color: #333;">
            Daftar Acara
        </h1>
        <hr style="border-top: 2px solid #FF6347; width: 70%; margin: 20px auto;">

        <!-- Search Form in a Card -->
        <section class="container py-3 mb-5"> <!-- Changed mb-4 to mb-5 for more space -->
            <div class="d-flex justify-content-end">
                <div class="card shadow-sm border-0" style="border-radius: 8px; width: auto;">
                    <div class="card-body p-0">
                        <form action="{{ route('acara.search') }}" method="GET" class="d-flex">
                            <div class="input-group" style="max-width: 350px;">
                                <input type="text" name="query" class="form-control" placeholder="Cari acara..."
                                    aria-label="Search">
                                <button type="submit" class="btn btn-primary"
                                    style="border-radius: 5px; border: none;">
                                    <i class="fas fa-search" style="font-size: 18px;"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Displaying the list of events -->
        @if ($acara && $acara->count())
            @foreach ($acara as $item)
                <div class="card mb-4" style="background-color: #FFFFFF; border: none;">
                    <div class="card-body d-flex">
                        <!-- Thumbnail -->
                        <div class="flex-shrink-0 me-3">
                            <img src="{{ asset('assets/vendor/img/logo.png') }}" alt="{{ $item->judul_acara }} "
                                class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
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

            <!-- Pagination Button -->
            <div class="d-flex justify-content-center">
                {{ $acara->links('pagination::bootstrap-4') }}
            </div>
        @else
            <p class="text-center">Tidak ada acara saat ini.</p>
        @endif
    </section>

    @include('components.footer')

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
