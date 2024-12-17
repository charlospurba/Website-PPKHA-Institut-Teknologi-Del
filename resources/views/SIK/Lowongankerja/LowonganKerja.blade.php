<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Kerja</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('components.navSIK')
        @include('components.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Lowongan Kerja</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Lowongan Kerja</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="text-end">
                        <a href="{{ route('lowongan.create') }}" class="btn"
                            style="background-color: #13C56B; color: white; border: 1px solid #13C56B;">
                            Tambah Data
                        </a>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        @foreach ($lowongan as $index => $loker)
                            <div class="col-md-12 mb-3">
                                <div class="card" style="background-color: #E6EDF4; border-radius: 8px;">
                                    <div class="card-body d-flex align-items-center">
                                        <!-- Cover -->
                                        <div style="flex: 0 0 80px; margin-right: 16px;">
                                            @if ($loker->cover)
                                                <img src="{{ asset('storage/' . $loker->cover) }}" alt="Cover"
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
                                            <h5 style="font-weight: bold; color: #2c3e50;">{{ $loker->judul }}</h5>
                                            <p style="color: #6c757d; margin: 0;">
                                                {{ $loker->perusahaan->nama_perusahaan ?? 'Perusahaan Tidak Diketahui' }}
                                            </p>
                                        </div>

                                        <!-- Actions -->
                                        <div style="flex: 0 0 auto; display: flex; gap: 8px;">
                                            <a href="{{ route('lowongan.edit', $loker->id) }}" class="btn btn-sm"
                                                style="background-color: #13C56B; color: white; border: 1px solid #13C56B;">
                                                Edit
                                            </a>
                                            <button class="btn btn-sm"
                                                style="background-color: #FF0000; color: white; border: 1px solid #FF0000;"
                                                onclick="openDeleteModal({{ $loker->id }}, '{{ $loker->judul }}')">
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
        </main>

        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline"></div> <!--end::To the end-->
            <strong>Copyright &copy; 2024 PPKHA IT Del</strong>
        </footer>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top"> <!-- Menempatkan modal di atas -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data Lowongan Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus data Job Vacancy <b id="jobTitle"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #6c757d; color: white;"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="background-color: #FF0000; color: white;"
                        id="confirmDeleteButton">
                        Ya, Tetap Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedId = null;

        function openDeleteModal(id, title) {
            selectedId = id; // Simpan ID yang akan dihapus
            document.getElementById('jobTitle').innerText = title; // Set judul ke dalam modal
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            fetch(`/lowongan/${selectedId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    location.reload();
                }
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
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <!--end::Script-->
</body>

</html>
