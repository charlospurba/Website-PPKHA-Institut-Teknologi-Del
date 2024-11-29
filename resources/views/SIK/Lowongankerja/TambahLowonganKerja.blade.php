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
        @include('components.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Tambah Lowongan Kerja</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Lowongan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <form action="{{ route('lowongan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Judul Lowongan</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Cover</label>
                                <input type="file" name="cover" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Lokasi Penempatan</label>
                                <input type="text" name="lokasi" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="link_perusahaan" class="form-label">Link Perusahaan</label>
                                <input type="url" name="link_perusahaan" id="link_perusahaan" class="form-control" value="{{ old('link_perusahaan') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label>Deskripsi Lowongan</label>
                                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Kualifikasi</label>
                                <textarea name="kualifikasi" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Benefit</label>
                                <textarea name="benefit" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Jenis Pekerjaan</label>
                                <select name="jenis_pekerjaan" class="form-select" required>
                                    <option value="Full-time">Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Magang">Magang</option>
                                    <option value="Kontrak">Kontrak</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn"
                                style="background-color: #13C56B; color: white; border: 1px solid #13C56B;">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
