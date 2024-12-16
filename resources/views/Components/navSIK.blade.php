<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Navbar</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    
<style>
    /* Navbar styling */
    .navbar {
        background: #084A89 !important;
        color: white !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .navbar .nav-link {
        color: white !important; /* Warna teks link di navbar */
        transition: color 0.3s ease;
    }

    .navbar .nav-link:hover {
        color: #ffc107 !important; /* Warna teks saat hover */
        text-shadow: 0 0 10px #ffc107;
    }

    /* Dropdown menu styling */
    .dropdown-menu {
        background-color: #084A89 !important; /* Warna latar dropdown */
        border: none; /* Hilangkan border */
        transform: translateY(10px);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .dropdown-menu.show {
        transform: translateY(0);
        opacity: 1;
    }

    .dropdown-menu .dropdown-item {
        color: white !important; /* Warna teks dropdown */
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #098ECC !important; /* Warna saat hover */
        color: white !important;
    }

    /* User dropdown header */
    .user-header {
        background: linear-gradient(45deg, #098ECC, #098ECC);
        color: white !important; /* Warna teks header dropdown */
        text-align: center;
        padding: 20px;
    }

    .user-header img {
        margin-bottom: 10px;
        border: 2px solid white;
    }

    /* Tombol di bagian footer dropdown */
    .user-footer .btn {
        color: white !important; /* Warna teks tombol */
        background-color: #084A89 !important;
        border: none;
    }

    .user-footer .btn:hover {
        background-color: #098ECC !important;
        color: white !important;
    }
</style>

    
</head>

<body>
    <nav class="app-header navbar navbar-expand bg-body" style="background: #084A89 !important ">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Start Navbar Links-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
            </ul>
            <!--end::Start Navbar Links-->

            <!--begin::End Navbar Links-->
            <ul class="navbar-nav ms-auto">
                <!--begin::Navbar Search-->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                        <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                        <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                    </a>
                </li>
                <!--end::Fullscreen Toggle-->

                <!--begin::User Menu Dropdown-->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Gambar Pengguna -->
                        <img src="{{ asset('assets\vendor\img\user.png') }}" class="user-image shadow" alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Guest' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="userDropdown">
                        <!--begin::User Image-->
                        <li class="user-header">
                            <img src="{{ asset('assets\vendor\img\user.png') }}" class="user-image shadow"
                                alt="User Image">
                            <p>
                                <strong>{{ Auth::user()->name ?? 'Guest' }}</strong>
                                <small>Member since {{ Auth::user()->created_at->format('M. Y') ?? 'Unknown' }}</small>
                            </p>
                        </li>
                        <!--end::User Image-->

                        <!--begin::Menu Body-->
                       
                        <!--end::Menu Footer-->
                    </ul>
                </li>
                <!--end::User Menu Dropdown-->
            </ul>
            <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
    </nav>
</body>

</html>


