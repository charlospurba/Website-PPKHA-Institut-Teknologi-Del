<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Informasi Karir IT Del</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body style="background-color: #F0F0F0;">
    @include('components.navbar')

    <section id="berita-content" class="container py-5 mt-4">
        <h1 class="text-center mb-5"
            style="font-family: 'Arial', sans-serif; font-weight: 700; font-size: 2.5rem; color: #333;">
            Berita Utama
        </h1>
        <hr style="border-top: 2px solid #FF6347; width: 70%; margin: 20px auto;">

        <!-- Form Pencarian -->
        <section class="container py-3 mb-5">
            <div class="d-flex justify-content-end">
                <div class="card shadow-sm border-0" style="border-radius: 8px; width: auto;">
                    <div class="card-body p-0">
                        <form action="{{ route('berita.index') }}" method="GET" class="d-flex">
                            <div class="input-group" style="max-width: 300px;">
                                <input type="text" name="search" class="form-control" placeholder="Cari berita..."
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

        @if ($berita && $berita->count())
            @foreach ($berita as $item)
                <div class="card mb-4" style="background-color: #FFFFFF; border: none;">
                    <div class="row g-0">
                        @php
                            $randomImage = $item->gambar ? $item->gambar[array_rand($item->gambar)] : null;
                        @endphp
                        @if ($randomImage)
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $randomImage) }}" class="img-fluid rounded-start"
                                    alt="{{ $item->judul_berita }}"
                                    style="object-fit: cover; height: 350px; width: 100%;">
                            </div>
                        @endif
                        <div class="col-md-8">
                            <div class="card-body" style="padding: 7px;">
                                <!-- Title of the news -->
                                <h5 class="card-title" style="font-size:1.80rem; font-weight: bold; color: #333;">
                                    {{ $item->judul_berita }}
                                </h5>

                                <!-- Excerpt of the news content (limiting to 100 characters) -->
                                <p class="card-text" style="font-size: 1rem; color: #777; margin-bottom: 10px;">
                                    {{ Str::limit(strip_tags($item->isi_berita), 100, '...') }}
                                </p>

                                <!-- Baca Selengkapnya button with more spacing -->
                                <a href="{{ route('berita.show', $item->id) }}" class="btn btn-link mt-5"
                                    style="font-size: 1rem; color: #007bff;">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>



                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center" style="font-size: 1.1rem; color: #777;">Tidak ada berita saat ini.</p>
        @endif
    </section>

    @include('components.footer')

    <!-- JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
