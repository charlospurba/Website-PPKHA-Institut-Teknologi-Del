<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $acara->judul_acara }} - Sistem Informasi Karir IT Del</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Event Detail Section -->
    <section id="detail-acara"
        style="max-width: 1000px; margin: 0 auto; padding: 30px 20px; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; margin-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <!-- Title Section -->
                <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 20px; color: #333;">
                    {{ $acara->judul_acara }}
                </h1>

                <!-- Event Publish Date -->
                <p style="font-size: 0.875rem; color: #666; margin-bottom: 15px;">
                    <strong style="font-weight: bold; color: #333;">Tanggal Publish:</strong>
                    {{ $acara->created_at->format('d F Y') }}
                </p>

                <hr style="border: 1px solid #ddd; margin-bottom: 30px;">

                <!-- Event Details -->
                <div class="event-content"
                    style="font-size: 1.1rem; line-height: 1.6; color: #444; margin-bottom: 30px;">
                    <p>{!! nl2br(e($acara->detail_acara)) !!}</p>
                </div>

                <hr style="border: 1px solid #ddd; margin-bottom: 30px;">

                <!-- Attachments -->
                <h5 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 20px; color: #333;">Lampiran:</h5>
                @if ($acara->lampiran && count($acara->lampiran))
                    <ul style="font-size: 1rem; color: #007bff; list-style: none; padding: 0;">
                        @foreach ($acara->lampiran as $file)
                            <li style="margin-bottom: 10px;">
                                @if (Storage::disk('public')->exists($file))
                                    <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                        style="text-decoration: none; color: #007bff;">
                                        {{ basename($file) }}
                                    </a>
                                @else
                                    <span style="color: #999;">File tidak tersedia</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p style="font-size: 1rem; color: #777;">Tidak ada lampiran tersedia.</p>
                @endif
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('components.footer')

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
