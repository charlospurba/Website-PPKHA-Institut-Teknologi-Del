<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Navbar</title>
    <link rel="stylesheet" href={{ 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' }}>
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

        @include('components.sidebar')
        <!--end::Sidebar--> <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Berita</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Berita
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
                            onclick="location.href='{{ route('berita_.tambah') }}'">Tambah Data</button>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        @foreach ($berita as $index => $item)
                            <div class="col-md-12 mb-3">
                                <div class="card" style="background-color: #E6EDF4; border-radius: 8px;">
                                    <div class="card-body d-flex align-items-center">
                                        <!-- Cover -->


                                        <!-- Content -->
                                        <div style="flex: 1;">
                                            <h5 style="font-weight: bold; color: #2c3e50;">{{ $item->judul_berita }}
                                            </h5>
                                            <p
                                                style="
        color: #6c757d; 
        margin: 0; 
        display: -webkit-box; 
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical; 
        overflow: hidden; 
        text-overflow: ellipsis;">
                                                {{ $item->detail_berita }}
                                            </p>
                                        </div>

                                        <!-- Actions -->
                                        <div style="flex: 0 0 auto; display: flex; gap: 8px;">
                                            <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-sm"
                                                style="background-color: #13C56B !important; color: white !important; border: 1px solid #13C56B !important;">
                                                Edit
                                            </a>
                                            <button class="btn btn-sm"
                                                style="background-color: #FF0000 !important; color: white !important; border: 1px solid #FF0000 !important;"
                                                onclick="openDeleteModal({{ $item->id }}, '{{ $item->judul_berita }}')">
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



        </main> <!--end::App Main--> <!--begin::Footer-->
        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline"></div> <!--end::To the end-->
            <!--begin::Copyright--> <strong>
                Copyright &copy; k3-project-pabwe
            </strong>
            <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->

    <!-- Modal Hapus -->
    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus berita <b id="beritaTitle"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        let selectedId = null;

        function openDeleteModal(id, title) {
            selectedId = id; // Simpan ID yang akan dihapus
            document.getElementById('beritaTitle').innerText = title; // Set judul ke dalam modal
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            // Kirim permintaan DELETE ke server
            fetch(`/berita/${selectedId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Pastikan CSRF token dimasukkan dengan benar
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal menghapus data.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Jika berhasil, langsung refresh halaman tanpa notifikasi
                        window.location.href = '{{ route('berita_') }}'; // Redirect ke halaman berita
                    } else {
                        // Tangani error dari server
                        console.error(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Tampilkan error di console untuk debugging
                });
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
