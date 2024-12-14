<!-- Tambahkan ini di bagian <head> pada file HTML Anda -->

<head>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CSS Kustom -->
    <style>
        /* Sidebar Styles */
        .app-sidebar {
            background: linear-gradient(180deg, #0d3b66 0%, #00509e 100%);
            color: #ffffff;
            min-height: 100vh;
            padding-top: 20px;
        }

        .app-sidebar .brand-link {
            color: #ffffff;
            text-decoration: none;
            padding: 0 20px;
            margin-bottom: 30px;
        }

        .app-sidebar .brand-link:hover {
            color: #00BFFF;
            /* Biru terang pada hover */
        }

        .app-sidebar .brand-image {
            width: 40px;
            margin-right: 10px;
        }

        .app-sidebar .nav-link {
            color: #ffffff;
            padding: 10px 20px;
            transition: color 0.3s;
            border-left: 3px solid transparent;
        }

        .app-sidebar .nav-link:hover {
            color: #00BFFF;
            /* Warna teks berubah saat di-hover */
        }

        .app-sidebar .nav-link.active {
            color: #00BFFF;
            /* Warna teks berubah pada link aktif */
            border-left-color: #00BFFF;
        }

        .app-sidebar .nav-link i {
            font-size: 1.2rem;
            margin-right: 10px;
        }

        .app-sidebar .nav-header {
            padding-left: 20px;
            font-size: 0.85rem;
            margin-top: 1.5rem;
            color: #bbbbbb;
        }

        .app-sidebar .btn-logout {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
            margin: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .app-sidebar .btn-logout:hover {
            background-color: #c82333;
            border-color: #bd2130;
            color: #ffffff;
        }

        /* Responsif */
        @media (max-width: 991px) {
            .app-sidebar {
                position: fixed;
                left: -250px;
                width: 250px;
                transition: left 0.3s;
            }

            .app-sidebar.open {
                left: 0;
            }
        }
    </style>
</head>

<!-- Sidebar -->
<aside class="app-sidebar" data-bs-theme="dark">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand">
        <a href="./index.html" class="brand-link d-flex align-items-center">
            <img src="{{ asset('assets/vendor/img/logo.png') }}" alt="SIS" class="brand-image">
            <span class="brand-text fw-bold fs-5">SIK IT DEL</span>
        </a>
    </div>

    <!-- Sidebar Wrapper -->
    <div class="sidebar-wrapper">
        <nav>
            <ul class="nav flex-column" role="menu">
                <!-- Dasbor -->
                <li class="nav-item">
                    <a href="{{ route('dasbor') }}"
                        class="nav-link d-flex align-items-center {{ request()->routeIs('dasbor') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dasbor</span>
                    </a>
                </li>

                <!-- Lowongan Kerja -->
                <li class="nav-item">
                    <a href="{{ route('lowongan_kerja') }}"
                        class="nav-link d-flex align-items-center {{ request()->routeIs('lowongan_kerja') ? 'active' : '' }}">
                        <i class="bi bi-briefcase-fill"></i>
                        <span>Lowongan Kerja</span>
                    </a>
                </li>

                <!-- Daftar Perusahaan -->
                <li class="nav-item">
                    <a href="{{ route('daftar_perusahaan') }}"
                        class="nav-link d-flex align-items-center {{ request()->routeIs('daftar_perusahaan') ? 'active' : '' }}">
                        <i class="bi bi-building"></i>
                        <span>Daftar Perusahaan</span>
                    </a>
                </li>

                <!-- Acara -->
                <li class="nav-item">
                    <a href="{{ route('acara_') }}"
                        class="nav-link d-flex align-items-center {{ request()->routeIs('acara_') ? 'active' : '' }}">
                        <i class="bi bi-calendar-event-fill"></i>
                        <span>Acara</span>
                    </a>
                </li>

                <!-- Berita -->
                <li class="nav-item">
                    <a href="{{ route('berita_') }}"
                        class="nav-link d-flex align-items-center {{ request()->routeIs('berita_') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </li>

                <!-- Artikel -->
                <li class="nav-item">
                    <a href="{{ route('artikel_') }}"
                        class="nav-link d-flex align-items-center {{ request()->routeIs('artikel_') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Artikel</span>
                    </a>
                </li>

                <!-- Platform Kami -->
                <li class="nav-item mb-2">
                    <a href="{{ route('kelola_pengguna') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('kelola_pengguna') ? 'active' : '' }}">
                        <i class="bi bi-app-indicator me-2"></i>
                        <span>Platform Kami</span>
                        </i>
                    </a>
                </li>


                <!-- Logout -->
                <li class="nav-header mt-4">Logout</li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        class="btn btn-logout  d-flex align-items-center justify-content-center"  style="background-color: #C82333 !important;">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
