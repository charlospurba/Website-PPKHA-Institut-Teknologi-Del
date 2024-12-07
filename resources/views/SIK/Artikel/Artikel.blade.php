<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('components.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Artikel</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Artikel</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="text-end">
                        <a href="{{ route('artikel.create') }}" class="btn"
                            style="background-color: #13C56B; color: white;">
                            Tambah Artikel
                        </a>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        @foreach ($artikel as $index => $item)
                            <div class="col-md-12 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body d-flex align-items-center">
                                        <!-- Cover -->
                                        <div class="me-3">
                                            @if ($item->cover_artikel)
                                                <img src="{{ asset('storage/' . $item->cover_artikel) }}" alt="Cover"
                                                    style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                            @else
                                                <div
                                                    style="width: 80px; height: 80px; background-color: #ddd; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                    <span>No Image</span>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Content -->
                                        <div class="flex-grow-1">
                                            <h5>{{ $item->judul_artikel }}</h5>
                                            <p class="text-muted">Sumber: {{ $item->sumber_artikel }}</p>
                                        </div>

                                        <!-- Actions -->
                                        <div>
                                            <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-sm"
                                                style="background-color: #13C56B; color: white;">Edit</a>
                                            <button class="btn btn-sm" style="background-color: #FF0000; color: white;"
                                                onclick="openDeleteModal({{ $item->id }}, '{{ $item->judul_artikel }}')">Hapus</button>
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
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus data artikel <b id="articleTitle"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="background-color: #FF0000; color: white;"
                        id="confirmDeleteButton">Ya, Tetap Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        let selectedId = null;

        function openDeleteModal(id, title) {
            selectedId = id;
            document.getElementById('articleTitle').innerText = title;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            fetch(`/artikel/${selectedId}`, {
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
                        window.location.href = '{{ route('artikel_') }}';
                    } else {
                        console.error(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
