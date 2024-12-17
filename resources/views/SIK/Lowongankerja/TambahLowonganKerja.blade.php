<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lowongan Kerja</title>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('components.navSIK')
        @include('components.sidebar')

        <main class="app-main">
            <!-- App Content Header -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Tambah Lowongan Kerja</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Lowongan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Tambah Lowongan Kerja -->
            <div class="container mt-3">
                <form action="{{ route('lowongan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Lowongan</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" name="cover" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Penempatan</label>
                        <input type="text" name="lokasi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="link_perusahaan" class="form-label">Link Perusahaan</label>
                        <input type="url" name="link_perusahaan" id="link_perusahaan" class="form-control"
                            value="{{ old('link_perusahaan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Lowongan</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="kualifikasi" class="form-label">Kualifikasi</label>
                        <textarea name="kualifikasi" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="benefit" class="form-label">Benefit</label>
                        <textarea name="benefit" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
                        <select name="jenis_pekerjaan" class="form-select" required>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Magang">Magang</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </div>

                    <!-- Tombol Simpan dan Batal -->
                    <div class="mb-3">
                        <button type="submit" class="btn"
                            style="background-color: #13C56B; color: white; border: 1px solid #13C56B;">
                            Simpan
                        </button>
                        <a href="{{ route('lowongan_kerja') }}" class="btn btn-secondary"
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
