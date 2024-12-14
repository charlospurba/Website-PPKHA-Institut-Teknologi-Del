<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lowongan Kerja</title>
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
                            <h3 class="mb-0">Edit Lowongan Kerja</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Lowongan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Edit Lowongan Kerja -->
            <div class="container mt-3">
                <form action="{{ route('lowongan.update', $lowongan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Lowongan</label>
                        <input type="text" name="judul" class="form-control" value="{{ $lowongan->judul }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control"
                            value="{{ $lowongan->perusahaan->nama_perusahaan ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" name="cover" class="form-control">
                        @if ($lowongan->cover)
                            <img src="{{ asset('storage/' . $lowongan->cover) }}" alt="Cover" width="100">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Penempatan</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ $lowongan->lokasi }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Lowongan</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required>{{ $lowongan->deskripsi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
                        <select name="jenis_pekerjaan" class="form-select" required>
                            <option value="Full-time" {{ $lowongan->jenis_pekerjaan == 'Full-time' ? 'selected' : '' }}>
                                Full-time</option>
                            <option value="Part-time" {{ $lowongan->jenis_pekerjaan == 'Part-time' ? 'selected' : '' }}>
                                Part-time</option>
                            <option value="Magang" {{ $lowongan->jenis_pekerjaan == 'Magang' ? 'selected' : '' }}>Magang
                            </option>
                            <option value="Kontrak" {{ $lowongan->jenis_pekerjaan == 'Kontrak' ? 'selected' : '' }}>
                                Kontrak</option>
                        </select>
                    </div>

                    <!-- Tombol Perbarui dan Batal -->
                    <div class="mb-3">
                        <button type="submit" class="btn"
                            style="background-color: #13C56B; color: white; border: 1px solid #13C56B;">
                            Perbarui
                        </button>
                        <a href="{{ route('lowongan_kerja') }}" class="btn btn-secondary"
                            style="margin-left: 10px;">Batal</a>
                    </div>
                </form>
            </div>
        </main>
        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline"></div> <!--end::To the end-->
            <strong>© 2024 PPKHA IT Del. All rights reserved.</strong>
        </footer>
    </div>
</body>

</html>
