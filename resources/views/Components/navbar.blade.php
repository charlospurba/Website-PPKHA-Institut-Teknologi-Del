<!-- Header Atas -->
<div class="py-2" style="background-color: #0d3b66;">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo dan Judul -->
        <a class="d-flex align-items-center text-white text-decoration-none" href="/">
            <img src="{{ asset('assets/vendor/img/logo.png') }}" alt="Logo" width="30" height="auto" class="me-2">
            <span class="fs-5 fw-bold">SISTEM INFORMASI KARIR IT DEL</span>
        </a>
        <!-- Form Search -->
        <form class="d-flex align-items-center" style="max-width: 250px;">
            <input class="form-control form-control-sm border-0" type="text" placeholder="Search..."
                style="background-color: rgba(255, 255, 255, 0.2); height: 30px; font-size: 14px; color: white;">
            <button type="submit"
                class="btn btn-sm d-flex align-items-center justify-content-center text-white p-0 ms-1"
                style="background-color: rgba(255, 255, 255, 0.2); width: 30px; height: 30px; border-radius: 5px;">
                <i class="fas fa-search" style="font-size: 14px;"></i>
            </button>
        </form>

    </div>
</div>

<!-- Navigasi -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        @if (Request::is('/'))
                            <strong><u>Beranda</u></strong>
                        @else
                            Beranda
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lowongan-kerja') }}">
                        @if (Request::is('lowongan-kerja'))
                            <strong><u>Lowongan Kerja</u></strong>
                        @else
                            Lowongan Kerja
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('daftar.perusahaan') }}">
                        @if (Request::is('daftar-perusahaan'))
                            <strong><u>Daftar Perusahaan</u></strong>
                        @else
                            Daftar Perusahaan
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('acara.index') }}">
                        @if (Request::is('acara'))
                            <strong><u>Acara</u></strong>
                        @else
                            Acara
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('berita.index') }}">
                        @if (Request::is('berita'))
                            <strong><u>Berita</u></strong>
                        @else
                            Berita
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('artikel.index') }}">
                        @if (Request::is('artikel'))
                            <strong><u>Artikel</u></strong>
                        @else
                            Artikel
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        @if (Request::is('tracer-study'))
                            <strong><u>Tracer Study</u></strong>
                        @else
                            Tracer Study
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        @if (Request::is('platform-kami'))
                            <strong><u>Platform Kami</u></strong>
                        @else
                            Platform Kami
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS dan CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
