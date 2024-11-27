<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $artikel->judul_artikel }} - Sistem Informasi Karir IT Del</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

    <!-- Navbar (Include your navbar code here) -->
    @include('components.navbar')

    <!-- Article Detail Section -->
    <section id="detail-artikel"
        style="max-width: 900px; margin: 0 auto; padding: 30px 20px; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; margin-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <!-- Title Section -->
                <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 20px; color: #333;">
                    {{ $artikel->judul_artikel }}
                </h1>

                <!-- Article Publish Date -->
                <p style="font-size: 0.875rem; color: #666; margin-bottom: 15px;">
                    <strong style="font-weight: bold; color: #333;">Tanggal Publish:</strong>
                    {{ $artikel->created_at->format('d F Y') }}
                </p>

                <!-- Article Cover Image -->
                @if ($artikel->cover_artikel)
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="{{ asset('storage/' . $artikel->cover_artikel) }}" alt="{{ $artikel->judul_artikel }}"
                            style="max-width: 100%; max-height: 400px; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    </div>
                @else
                    <div
                        style="text-align: center; margin-bottom: 20px; color: #999; font-size: 1.2rem; height: 200px; display: flex; justify-content: center; align-items: center; background-color: #f4f4f4;">
                        No Image
                    </div>
                @endif

                <!-- Article Content -->
                <div class="article-content"
                    style="font-size: 1.1rem; line-height: 1.6; color: #444; margin-bottom: 30px;">
                    <p>{!! nl2br(e($artikel->isi_artikel)) !!}</p>
                </div>

                <hr style="border: 1px solid #ddd; margin-bottom: 30px;">

                <!-- Article Source -->
                @if ($artikel->sumber_artikel)
                    <div style="font-size: 1rem; color: #666; text-align: none;">
                        <strong style="color: #333;">Sumber: </strong>
                        <a href="{{ $artikel->sumber_artikel }}" target="_blank"
                            style="color: #007bff; text-decoration: none;">
                            {{ $artikel->sumber_artikel }}
                        </a>
                    </div>
                @endif

                <hr style="border: 1px solid #ddd; margin-bottom: 30px;">

                <!-- Recommended Articles Section -->
                <div style="margin-top: 40px;">
                    <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 20px; color: #333;">Rekomendasi
                        Artikel Lainnya</h3>

                    <!-- Bootstrap Grid System for Responsive Layout -->
                    <div class="row" style="margin-top: 20px;">
                        @foreach ($random_articles as $recommended)
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div
                                    style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); overflow: hidden; display: flex; flex-direction: column; height: 100%;">

                                    <!-- Article Image (Optional) -->
                                    @if ($recommended->cover_artikel)
                                        <img src="{{ asset('storage/' . $recommended->cover_artikel) }}"
                                            alt="Cover Image"
                                            style="width: 100%; height: 200px; object-fit: cover; border-bottom: 2px solid #ddd;">
                                    @else
                                        <div
                                            style="text-align: center; margin-bottom: 20px; color: #999; font-size: 1.2rem; height: 200px; display: flex; justify-content: center; align-items: center; background-color: #f4f4f4;">
                                            No Image
                                        </div>
                                    @endif

                                    <!-- Card Content -->
                                    <div class="card-body"
                                        style="flex-grow: 1; padding: 15px; display: flex; flex-direction: column;">
                                        <h5 class="card-title"
                                            style="font-size: 1.1rem; font-weight: 600; color: #333;">
                                            <a href="{{ route('artikel.show', $recommended->id) }}"
                                                style="text-decoration: none; color: #000;">
                                                {{ $recommended->judul_artikel }}
                                            </a>
                                        </h5>
                                        <p class="card-text"
                                            style="font-size: 0.9rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #777;">
                                            {{ Str::limit(strip_tags($recommended->isi_artikel), 100, '...') }}
                                        </p>

                                        <!-- Move the date here at the bottom -->
                                        <div style="margin-top: auto; font-size: 0.85rem; color: #777;">
                                            <small>{{ $recommended->created_at->format('d F Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (Include your footer code here) -->
    @include('components.footer')

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
