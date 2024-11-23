<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand">
        <a href="./index.html" class="brand-link">
            <img src="{{ asset('assets/vendor/img/logo.png') }}" alt="SIS" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">SIK IT DEL</span>
        </a>
    </div>

    <!-- Sidebar Wrapper -->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" role="menu">

                <!-- Dasbor -->
                <li class="nav-item">
                    <a href="{{ route('dasbor') }}" class="nav-link {{ request()->routeIs('dasbor') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dasbor</p>
                    </a>
                </li>

                <!-- Beranda -->
                <li class="nav-item">
                    <a href="{{ route('lowongan_kerja') }}"
                        class="nav-link {{ request()->routeIs('lowongan_kerja') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house-door-fill"></i>
                        <p>
                            Lowongan Kerja
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('daftar_perusahaan') }}"
                        class="nav-link {{ request()->routeIs('daftar_perusahaan') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house-door-fill"></i>
                        <p>
                            Daftar Perusahaan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('acara_') }}" class="nav-link {{ request()->routeIs('acara_') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-house-door-fill"></i>
                        <p>
                            Acara
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('berita_') }}"
                        class="nav-link {{ request()->routeIs('berita_') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-house-door-fill"></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('artikel_') }}"
                        class="nav-link {{ request()->routeIs('artikel_') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-house-door-fill"></i>
                        <p>
                            Artikel
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#berandaMenu"
                        aria-expanded="false">
                        <i class="nav-icon bi bi-house-door-fill"></i>
                        <p>
                            Platform Kami
                        </p>
                    </a>

                </li>

                <!-- Profil -->


                <!-- Sarana & Prasarana -->


                <!-- Informasi -->


                <!-- Platform Kami -->
                < <!-- Admin -->


                    <!-- Logs -->
                    <li class="nav-header">LOGS</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-journal-code"></i>
                            <p>Catatan Perubahan</p>
                        </a>
                    </li>

                    <!-- Logout -->
                    <li class="nav-header mt-3">LOGOUT</li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="btn btn-danger">
                            <i class="nav-icon bi bi-box-arrow-right"></i>
                            <p>Logout</p>
                        </a>
                    </li>

            </ul>
        </nav>
    </div>
</aside>
