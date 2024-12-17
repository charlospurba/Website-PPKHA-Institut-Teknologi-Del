<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna</title>
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
            color: white !important;
        }

        .btn:active,
        .btn:focus {
            background-color: #04577A !important;
            border-color: #04577A !important;
            color: white !important;
            box-shadow: none !important;
        }

        /* Animasi slide-in dari atas */
        @keyframes slideInFromTop {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal.slide-top .modal-dialog {
            animation: slideInFromTop 0.5s ease-out;
        }
    </style>
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
                            <h3 class="mb-0">Kelola Pengguna</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Kelola Pengguna</li>
                            </ol>
                        </div>
                        <div class="col text-end" style="padding: 10px">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal" style="background-color: #13C56B !important; color: white !important; border: 1px solid #13C56B !important;">
                                Tambah Pengguna
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daftar Pengguna</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <button class="btn btn-sm"
                                                    style="background-color: #FF0000 !important; color: white !important; border: 1px solid #FF0000 !important;"
                                                    onclick="openDeleteModal('{{ $user->id }}', '{{ $user->name }}')">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Modal Hapus -->
        <div class="modal fade slide-top" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah kamu yakin ingin menghapus data pengguna <b id="user"></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color: #6c757d !important; color: white !important;"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="background-color: #FF0000 !important; color: white !important;"
                        id="confirmDeleteButton">
                        Ya, Tetap Hapus
                    </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let selectedId = null;

            function openDeleteModal(userId, userName) {
                selectedId = userId;
                document.getElementById('user').innerText = userName;
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            }

            document.getElementById('confirmDeleteButton').addEventListener('click', function () {
                fetch(`/kelola_pengguna/${selectedId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                        deleteModal.hide();
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal menghapus pengguna.');
                });
            });
        </script>

        <footer class="app-footer">
            <strong>Copyright &copy; 2024 PPKHA IT Del</strong>
        </footer>
    </div>

    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- Modal Tambah Pengguna -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserLabel">Tambah Kelola Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"   style="background-color: #FF0000 !important; border: 1px solid #FF0000 !important; color: white !important;">Batal</button>
                        <button type="submit" class="btn btn-primary" style="background-color: #13C56B !important; color: white !important; border: 1px solid #13C56B !important;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
