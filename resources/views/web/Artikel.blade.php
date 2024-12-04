<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daftar Artikel - Sistem Informasi Karir IT Del</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Font Awesome for the search icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body style="background-color: #F0F0F0;">
    @include('components.navbar')

    <section id="artikel-content" class="container py-5 mt-4">
        <h1 class="text-center mb-5"
            style="font-family: 'Arial', sans-serif; font-weight: 700; font-size: 2.5rem; color: #333;">
            Daftar Artikel
        </h1>
        <hr style="border-top: 2px solid #FF6347; width: 70%; margin: 20px auto;">

        <!-- Form Section -->
        <section class="container py-3 mb-5">
            <div class="d-flex justify-content-end">
                <div class="card shadow-sm border-0" style="border-radius: 8px; width: auto;">
                    <div class="card-body p-0">
                        <form action="{{ route('artikel.search') }}" method="GET" class="d-flex">
                            <div class="input-group" style="max-width: 300px;"> <!-- Adjusted max-width -->
                                <input type="text" name="query" class="form-control" placeholder="Cari artikel..."
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

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success"
                style="font-size: 1.1rem; border-radius: 5px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                {{ session('success') }}
            </div>
        @endif

        <!-- Artikel Cards -->
        <section class="container py-3 mt-4">
            @if ($artikel && $artikel->count())
                <div class="row">
                    @foreach ($artikel as $item)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card shadow-sm h-100" style="border-radius: 10px; min-height: 400px;">
                                <!-- Cover Image -->
                                @if ($item->cover_artikel)
                                    <img src="{{ asset('storage/' . $item->cover_artikel) }}"
                                        alt="{{ $item->judul_artikel }}" class="card-img-top"
                                        style="height: 180px; width: 100%; object-fit: cover; object-position: center;">
                                @else
                                    <div class="card-img-top d-flex align-items-center justify-content-center"
                                        style="height: 180px; background-color: #f4f4f4; color: #999; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                        <span>No Image</span>
                                    </div>
                                @endif

                                <!-- Card Content -->
                                <div class="card-body d-flex flex-column" style="min-height: 180px;">
                                    <h5 class="card-title" style="font-size: 1.1rem; font-weight: 600; color: #333;">
                                        <a href="{{ route('artikel.show', $item->id) }}"
                                            style="text-decoration: none; color: #000000;">
                                            {{ $item->judul_artikel }}
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted"
                                        style="font-size: 0.9rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ Str::limit(strip_tags($item->isi_artikel), 200, '...') }}
                                    </p>
                                    <p class="card-text mt-auto" style="font-size: 0.85rem; color: #777;">
                                        <small>{{ $item->created_at->format('d F Y') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $artikel->links('pagination::bootstrap-4') }}
                </div>
            @else
                <p class="text-center" style="font-size: 1.1rem; color: #777;">Tidak ada Artikel saat ini.</p>
            @endif
        </section>
    </section>

    @include('components.footer')

    <!-- JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
