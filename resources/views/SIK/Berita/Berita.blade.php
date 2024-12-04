<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .btn {
            background-color: #098ECC !important;
            color: white !important;
            border-color: #098ECC !important;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #066D9E !important;
            border-color: #066D9E !important;
        }

        .btn:active,
        .btn:focus {
            background-color: #04577A !important;
            border-color: #04577A !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <!-- Header -->
        @include('components.header')

        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Main Content -->
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Berita</h3>
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
                            <div class="col-md-12 mb-3">
                                <div class="card" style="background-color: #E6EDF4; border-radius: 8px;">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <!-- Wrapper for Image and Content -->
                                        <div class="d-flex align-items-center">
                                            <!-- Cover -->
                                            <div style="flex: 0 0 auto;">
                                                @php
                                                // Ambil gambar secara random dari array gambar
                                                $randomImage = $item->gambar ? $item->gambar[array_rand($item->gambar)] : null;
                                                @endphp
                                                <img src="{{ asset('storage/' . $randomImage) }}" 
                                                    class="img-fluid rounded-start" 
                                                    alt="{{ $item->judul_berita }}" 
                                                    style="object-fit: cover; height: 120px; width: 100px; margin-right: 10px;">
                                            </div>
                                    
                                            <!-- Content -->
                                            <div>
                                                <h5 style="font-weight: bold; color: #2c3e50; margin: 0;">{{ $item->judul_berita }}</h5>
                                                <p style="color: #6c757d; margin: 5px 0 0 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $item->detail_berita }}
                                                </p>
                                            </div>
                                        </div>
                                    
                                        <!-- Actions -->
                                        <div style="flex: 0 0 auto; display: flex; gap: 8px; margin-left: auto;">
                                            <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-sm"
                                                style="background-color: #13C56B !important; border: 1px solid #13C56B !important;">Edit</a>
                                            <button class="btn btn-sm"
                                                style="background-color: #FF0000 !important; border: 1px solid #FF0000 !important;"
                                                onclick="openDeleteModal({{ $item->id }}, '{{ $item->judul_berita }}')">Hapus</button>
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline"></div>
            <strong>Copyright &copy; k3-project-pabwe</strong>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Ya, Tetap Hapus</button>
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

        document.getElementById('confirmDeleteButton').addEventListener('click', function () {
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
                        window.location.href = '{{ route("berita_") }}';
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
