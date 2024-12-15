<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('components.navSIK')
        @include('components.sidebar')

        <!-- Main Content -->
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Daftar Berita</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Berita</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header text-end">
                    <button class="btn btn-primary"
                        style="background-color: #13C56B !important; border: 1px solid #13C56B !important;"
                        onclick="location.href='{{ route('berita_.tambah') }}'">Tambah Data</button>
                </div>

                <div class="container mt-4">
                    <div class="row">
                        @foreach ($berita as $index => $item)
                            <div class="col-12 mb-3">
                                <div class="card" style="background-color: #E6EDF4; border-radius: 8px; overflow: hidden;">
                                    <div class="card-body d-flex align-items-center">
                                        <!-- Wrapper for Image and Content -->
                                        <div class="d-flex align-items-center" style="flex: 1;">
                                            <!-- Cover -->
                                            <div class="me-3">
                                                @php
                                                    $randomImage = $item->gambar
                                                        ? $item->gambar[array_rand($item->gambar)]
                                                        : null;
                                                @endphp
                                                <img src="{{ asset('storage/' . $randomImage) }}"
                                                    class="img-fluid rounded"
                                                    alt="{{ $item->judul_berita }}"
                                                    style="object-fit: cover; height: 100px; width: 100px;">
                                            </div>
                
                                            <!-- Content -->
                                            <div style="flex: 1;">
                                                <h5 class="fw-bold text-dark mb-1">{{ $item->judul_berita }}</h5>
                                                <p class="text-secondary mb-0" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $item->detail_berita }}
                                                </p>
                                            </div>
                                        </div>
                
                                        <!-- Actions -->
                                        <div class="ms-auto d-flex gap-2">
                                            <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-sm btn-success">
                                                Edit
                                            </a>
                                            <button class="btn btn-sm btn-danger"
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
    </div>
    </main>

    <!-- Footer -->
    <footer class="app-footer">
        <div class="float-end d-none d-sm-inline"></div>
        <strong>Copyright &copy; 2024 PPKHA IT Del</strong>
    </footer>
    </div>

    <!-- Modal Hapus -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Berita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Kamu yakin ingin menghapus data berita <b id="beritaTitle"></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <!-- Tombol Batal dengan warna abu-abu dan teks putih -->
                        <button type="button" class="btn btn-secondary" style="color: white;"
                            data-bs-dismiss="modal">Batal</button>
                        <!-- Tombol Hapus dengan warna merah dan teks putih -->
                        <button type="button" class="btn"
                            style="background-color: #FF0000; border: 1px solid #FF0000; color: white;"
                            id="confirmDeleteButton">Ya, Tetap Hapus</button>
                    </div>
                </div>
            </div>
        </div>


    <!-- Scripts -->
    <script>
        let selectedId = null;

        function openDeleteModal(id, title) {
            selectedId = id;
            document.getElementById('beritaTitle').innerText = title;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            fetch(`/berita/${selectedId}`, {
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
                        window.location.href = '{{ route('berita_') }}';
                    } else {
                        console.error(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
