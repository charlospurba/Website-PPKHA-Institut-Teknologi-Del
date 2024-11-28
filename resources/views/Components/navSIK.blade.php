<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Navbar</title>
    <style>
        /* Navbar styling */
        .navbar {
            background: linear-gradient(45deg, #098ECC, #6DAB8D, #098ECC);
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        /* Navbar hover effect */
        .navbar-nav .nav-link {
            color: white !important;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
            text-shadow: 0 0 10px #ffc107;
        }

        /* User dropdown animation */
        .dropdown-menu {
            transform: translateY(10px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .dropdown-menu.show {
            transform: translateY(0);
            opacity: 1;
        }

        /* Profile image */
        .user-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .user-image:hover {
            transform: scale(1.1);
        }

        /* User dropdown header */
        .user-header {
            background: linear-gradient(45deg, #098ECC, #098ECC);
            color: white;
            text-align: center;
            padding: 20px;
        }

        .user-header img {
            margin-bottom: 10px;
            border: 2px solid white;
        }

        /* Tombol hover tetap biru */
        .user-footer .btn:hover,
        .dropdown-menu .dropdown-item:hover {
            background-color: #098ECC !important;
            color: white !important;
        }

        /* Tetap biru saat diklik */
        .user-footer .btn:active,
        .user-footer .btn:focus,
        .dropdown-menu .dropdown-item:active,
        .dropdown-menu .dropdown-item:focus {
            background-color: #098ECC !important;
            color: white !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body>
    <nav class="app-header navbar navbar-expand bg-body">
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
                        <img src="{{ asset('assets/img/team/wairor.png') }}" class="user-image shadow" alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Guest' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="userDropdown">
                        <!--begin::User Image-->
                        <li class="user-header">
                            <img src="{{ asset('assets/img/team/wairor.png') }}" class="user-image shadow"
                                alt="User Image">
                            <p>
                                <strong>{{ Auth::user()->name ?? 'Guest' }}</strong>
                                <small>Member since {{ Auth::user()->created_at->format('M. Y') ?? 'Unknown' }}</small>
                            </p>
                        </li>
                        <!--end::User Image-->

                        <!--begin::Menu Body-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="{{ route('login') }}" class="btn btn-default btn-flat float-end">Sign out</a>
                        </li>
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
