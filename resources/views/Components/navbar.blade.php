<!-- Header Atas -->
<div class="py-2" style="background-color: #0d3b66;">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo dan Judul -->
        <a class="d-flex align-items-center text-white text-decoration-none" href="/">
            <img src="{{ asset('assets/vendor/img/logo.png') }}" alt="Logo" width="40" height="auto" class="me-3">
            <span class="fs-4 fw-bold">SISTEM INFORMASI KARIR IT DEL</span>
        </a>
        <!-- Form Search -->
        <form class="d-flex align-items-center" style="max-width: 300px;">
            <input class="form-control form-control-sm border-0" type="text" placeholder="Search..."
                style="background-color: rgba(255, 255, 255, 0.2); height: 35px; font-size: 14px; color: white;">
            <button type="submit"
                class="btn btn-sm d-flex align-items-center justify-content-center text-white p-0 ms-2"
                style="background-color: rgba(255, 255, 255, 0.2); width: 35px; height: 35px; border-radius: 5px;">
                <i class="fas fa-search" style="font-size: 16px;"></i>
            </button>
        </form>
    </div>
</div>

<!-- Navigasi -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0d3b66;">
    <div class="container">
        <a class="navbar-brand d-lg-none" href="/">
            <img src="{{ asset('assets/vendor/img/logo.png') }}" alt="Logo" width="30" height="auto"
                class="me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Menu Items -->
                @php
                    $navItems = [
                        ['name' => 'Beranda', 'route' => '/', 'active' => Request::is('/')],
                        [
                            'name' => 'Lowongan Kerja',
                            'route' => route('lowongan-kerja'),
                            'active' => Request::is('lowongan-kerja'),
                        ],
                        [
                            'name' => 'Daftar Perusahaan',
                            'route' => route('daftar.perusahaan'),
                            'active' => Request::is('daftar-perusahaan'),
                        ],
                        ['name' => 'Acara', 'route' => route('acara.index'), 'active' => Request::is('acara')],
                        ['name' => 'Berita', 'route' => route('berita.index'), 'active' => Request::is('berita')],
                        ['name' => 'Artikel', 'route' => route('artikel.index'), 'active' => Request::is('artikel')],
                        ['name' => 'Tracer Study', 'route' => '/', 'active' => Request::is('tracer-study')],
                        ['name' => 'Platform Kami', 'route' => '/', 'active' => Request::is('platform-kami')],
                    ];
                @endphp
                @foreach ($navItems as $item)
                    <li class="nav-item mx-2">
                        <a class="nav-link position-relative {{ $item['active'] ? 'active fw-bold' : '' }}"
                            href="{{ $item['route'] }}">
                            {{ $item['name'] }}
                            @if ($item['active'])
                                <span class="active-indicator"></span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Custom CSS -->
<style>
    /* Font Customization */
    body {
        font-family: 'Roboto', sans-serif;
    }

    /* Navigation Links */
    .navbar-nav .nav-link {
        color: #ffffff;
        font-size: 16px;
        padding: 10px 15px;
        transition: color 0.3s ease;
        position: relative;
    }

    .navbar-nav .nav-link:hover {
        color: #ffa500;
        /* Warna aksen oranye */
    }

    /* Active Indicator */
    .navbar-nav .nav-link .active-indicator {
        position: absolute;
        bottom: -5px;
        left: 50%;
        width: 0;
        height: 3px;
        background-color: #ffa500;
        transition: width 0.3s ease, left 0.3s ease;
    }

    .navbar-nav .nav-link.active .active-indicator {
        width: 100%;
        left: 0;
    }

    /* Hover Effect */
    .navbar-nav .nav-item:hover .nav-link::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        width: 0;
        height: 3px;
        background-color: #ffa500;
        transition: width 0.3s ease, left 0.3s ease;
    }

    .navbar-nav .nav-item:hover .nav-link::after {
        width: 100%;
        left: 0;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .navbar-nav .nav-link {
            padding: 10px 0;
            text-align: center;
        }

        .navbar-nav .nav-item {
            margin: 0;
        }
    }

    /* Gradient Background */
    nav.navbar {
        background: linear-gradient(90deg, #0d3b66 0%, #00509e 100%);
    }

    /* Shadow Effect */
    nav.navbar {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Fixed Navigation */
    nav.navbar {
        position: sticky;
        top: 0;
        z-index: 1020;
    }
</style>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<!-- Bootstrap JS dan CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
