<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Acara</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('components.sidebar')

        <main class="app-main">
            <!-- Breadcrumb -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Daftar Acara</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Acara</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="text-end">
                        <!-- Tombol Tambah Data -->
                        <a href="{{ route('acara.create') }}" class="btn"
                            style="background-color: #13C56B; color: white; border: 1px solid #13C56B;">
                            Tambah Data
                        </a>
                    </div>
                </div>

                <!-- Daftar Acara -->
                <div class="container mt-4">
                    <div class="row">
                        @foreach ($acara as $index => $item)
                            <div class="col-md-12 mb-3">
                                <div class="card"
                                    style="background-color: #E6EDF4; border-radius: 8px; max-height: 120px; overflow: hidden;">
                                    <div class="card-body d-flex align-items-center">
                                        <!-- Detail Acara -->
                                        <div style="flex: 1;">
                                            <h5 style="font-weight: bold; color: #2c3e50;">{{ $item->judul_acara }}</h5>
                                            <p
                                                style="color: #6c757d; margin: 0; max-height: 60px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                {{ Str::limit($item->detail_acara, 100, '...') }}
                                            </p>
                                        </div>

                                        <!-- Tombol Aksi -->
                                        <div style="flex: 0 0 auto; display: flex; gap: 8px;">
                                            <a href="{{ route('acara.edit', $item->id) }}" class="btn btn-sm"
                                                style="background-color: #13C56B; color: white; border: 1px solid #13C56B;">
                                                Edit
                                            </a>
                                            <button class="btn btn-sm"
                                                style="background-color: #FF0000; color: white; border: 1px solid #FF0000;"
                                                onclick="openDeleteModal({{ $item->id }}, '{{ $item->judul_acara }}')">
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

        <footer class="app-footer">
            <strong>Copyright &copy; 2024 PPKHA IT Del.</strong>
        </footer>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data Acara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus data acara <b id="acaraTitle"></b>?</p>
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
            selectedId = id; // Simpan ID acara yang akan dihapus
            document.getElementById('acaraTitle').innerText = title; // Set judul acara di dalam modal
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            fetch(`/acara/${selectedId}`, {
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
