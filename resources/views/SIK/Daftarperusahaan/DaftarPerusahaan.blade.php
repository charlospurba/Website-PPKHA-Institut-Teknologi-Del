<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Navbar</title>
    <style>
        /* Gaya tombol utama */
        .btn {
            background-color: #098ECC !important;
            color: white !important;
            border-color: #098ECC !important;
            transition: all 0.3s ease-in-out;
        }

        /* Gaya hover tombol */
        .btn:hover {
            background-color: #066D9E !important;
            border-color: #066D9E !important;
            color: white !important;
        }

        /* Gaya aktif atau fokus */
        .btn:active,
        .btn:focus {
            background-color: #04577A !important;
            border-color: #04577A !important;
            color: white !important;
            box-shadow: none !important;
        }
    </style>

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        @include('components.navSIK')
        @include('components.sidebar')
        <!--end::Sidebar--> <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Daftar Perusahaan</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Daftar Perusahaan
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="text-end">
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            style="background-color: #13C56B !important; color: white !important; border: 1px solid #13C56B !important;"
                            onclick="location.href='{{ route('daftar_perusahaan.tambah') }}'">Tambah Data</button>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        @if ($perusahaan && $perusahaan->isNotEmpty())
                            @foreach ($perusahaan as $index => $item)
                                <div class="col-md-12 mb-3">
                                    <div class="card" style="background-color: #E6EDF4; border-radius: 8px;">
                                        <div class="card-body d-flex align-items-center">
                                            <!-- Cover -->
                                            <div style="flex: 0 0 80px; margin-right: 16px;">
                                                @if ($item->cover_perusahaan)
                                                    <img src="{{ asset('storage/' . $item->cover_perusahaan) }}"
                                                        alt="Cover"
                                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                                @else
                                                    <div
                                                        style="width: 80px; height: 80px; background-color: #ddd; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                        <span>No Image</span>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Content -->
                                            <div style="flex: 1;">
                                                <h5 style="font-weight: bold; color: #2c3e50;">
                                                    {{ $item->nama_perusahaan }}</h5>
                                                <p style="color: #6c757d; margin: 0;">{{ $item->link_perusahaan }}</p>
                                            </div>

                                            <!-- Actions -->
                                            <div style="flex: 0 0 auto; display: flex; gap: 8px;">
                                                <a href="{{ route('perusahaan.edit', $item->id) }}" class="btn btn-sm"
                                                    style="background-color: #13C56B !important; color: white !important; border: 1px solid #13C56B !important;">
                                                    Edit
                                                </a>
                                                <button class="btn btn-sm"
                                                    style="background-color: #FF0000 !important; color: white !important; border: 1px solid #FF0000!important;"
                                                    onclick="openDeleteModal({{ $item->id }}, '{{ $item->nama_perusahaan }}')">
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <p class="text-center">Tidak ada data perusahaan yang tersedia.</p>
                            </div>
                        @endif
                    </div>
                </div>


            </div>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



        </main> <!--end::App Main--> <!--begin::Footer-->
        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline"></div> <!--end::To the end-->
            <!--begin::Copyright--> 
            <strong>Copyright &copy; 2024 PPKHA IT Del</strong>
            <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->

    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data Daftar Perusahaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Kamu yakin ingin menghapus Perusahaan <b id="dataTitle"></b>?</p>
                </div>
                <div class="modal-footer">
                    <!-- Tombol Batal dengan warna abu-abu dan teks putih -->
                    <button type="button" class="btn" style="background-color: #6c757d !important; color: white;"
                        data-bs-dismiss="modal">Batal</button>
                    <!-- Tombol Hapus dengan warna merah dan teks putih -->
                    <button type="button" class="btn"
                        style="background-color: #FF0000 !important; border: 1px solid #FF0000 !important; color: white !important;"
                        id="confirmDeleteButton">Ya, Tetap Hapus</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        let selectedId = null;

        function openDeleteModal(id, title) {
            selectedId = id;
            document.getElementById('dataTitle').innerText = title;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            fetch(`/perusahaan/${selectedId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (!response.ok) throw new Error('Gagal menghapus data.');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        window.location.href = '{{ route('daftar_perusahaan') }}';
                    } else {
                        console.error(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <script src={{ 'https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js' }}
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src={{ 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' }}
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src={{ 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js' }}
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src={{ '../../dist/js/adminlte.js' }}></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <!--end::Script-->
</body><!--end::Body-->

</html>
