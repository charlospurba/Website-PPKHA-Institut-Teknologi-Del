<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Daftar Perusahaan</title>
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
                            <h3 class="mb-0">Tambah Daftar Perusahaan</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Daftar Perusahaan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Tambah Perusahaan -->
            <div class="container mt-3">
                <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control"
                            value="{{ old('nama_perusahaan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="daerah_perusahaan" class="form-label">Daerah Perusahaan</label>
                        <input type="text" name="daerah_perusahaan" id="daerah_perusahaan" class="form-control"
                            value="{{ old('daerah_perusahaan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="link_perusahaan" class="form-label">Link Perusahaan</label>
                        <input type="url" name="link_perusahaan" id="link_perusahaan" class="form-control"
                            value="{{ old('link_perusahaan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan</label>
                        <input type="text" name="deskripsi_perusahaan" id="deskripsi_perusahaan" class="form-control"
                            value="{{ old('deskripsi_perusahaan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="cover_perusahaan" class="form-label">Cover Perusahaan</label>
                        <input type="file" name="cover_perusahaan" id="cover_perusahaan" class="form-control">
                    </div>

                    <!-- Tombol Simpan dan Batal -->
                    <div class="mb-3">
                        <button type="submit" class="btn"
                            style="background-color: #13C56B; color: white; border: 1px solid #13C56B;">
                            Simpan
                        </button>
                        <a href="{{ route('daftar_perusahaan') }}" class="btn btn-secondary"
                            style="margin-left: 10px;">Batal</a>
                    </div>
                </form>
            </div>
        </main>
        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline"></div> <!--end::To the end-->
            <strong>Copyright &copy; 2024 PPKHA IT Del</strong>
        </footer>
    </div>
</body>

</html>
