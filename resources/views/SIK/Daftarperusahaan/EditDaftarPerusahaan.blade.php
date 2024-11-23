<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Perusahaan</title>
    <style>
        /* Gaya tombol utama */
        .btn {
            background-color: #098ECC !important;
            color: white !important;
            border-color: #098ECC !important;
            transition: all 0.3s ease-in-out;
        }

        /* Gaya hover tombol */
        .btn:hover {
            background-color: #066D9E !important;
            border-color: #066D9E !important;
            color: white !important;
        }

        /* Gaya aktif atau fokus */
        .btn:active,
        .btn:focus {
            background-color: #04577A !important;
            border-color: #04577A !important;
            color: white !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->

        @include('components.sidebar')
        <!--end::Sidebar--> <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Daftar Perusahaan</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Daftar Perusahaan
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h3>Edit Perusahaan</h3>
                    <!-- Formulir untuk Edit Perusahaan -->
                    <form action="{{ route('perusahaan.update', $perusahaan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Gunakan PUT untuk update -->

                        <!-- Input Nama Perusahaan -->
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" 
                                   class="form-control" value="{{ old('nama_perusahaan', $perusahaan->nama_perusahaan) }}" required>
                        </div>

                        <!-- Input Daerah Perusahaan -->
                        <div class="mb-3">
                            <label for="daerah_perusahaan" class="form-label">Daerah Perusahaan</label>
                            <input type="text" name="daerah_perusahaan" id="daerah_perusahaan" 
                                   class="form-control" value="{{ old('daerah_perusahaan', $perusahaan->daerah_perusahaan) }}" required>
                        </div>

                        <!-- Input Link Perusahaan -->
                        <div class="mb-3">
                            <label for="link_perusahaan" class="form-label">Link Perusahaan</label>
                            <input type="url" name="link_perusahaan" id="link_perusahaan" 
                                   class="form-control" value="{{ old('link_perusahaan', $perusahaan->link_perusahaan) }}" required>
                        </div>

                        <!-- Input Deskripsi Perusahaan -->
                        <div class="mb-3">
                            <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan</label>
                            <input type="text" name="deskripsi_perusahaan" id="deskripsi_perusahaan" 
                                   class="form-control" value="{{ old('deskripsi_perusahaan', $perusahaan->deskripsi_perusahaan) }}" required>
                        </div>

                        <!-- Input Cover Perusahaan -->
                        <div class="mb-3">
                            <label for="cover_perusahaan" class="form-label">Cover Perusahaan</label>
                            <input type="file" name="cover_perusahaan" id="cover_perusahaan" class="form-control">
                            <!-- Tampilkan cover lama jika ada -->
                            @if ($perusahaan->cover_perusahaan)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $perusahaan->cover_perusahaan) }}" 
                                         alt="Cover Perusahaan" width="150">
                                    <p class="text-muted mt-1">Gambar saat ini</p>
                                </div>
                            @endif
                        </div>

                        <!-- Tombol Simpan -->
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </main> <!--end::App Main-->

        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline"></div> <!--end::To the end-->
            <strong>© 2024 PPKHA IT Del. All rights reserved.</strong>
        </footer>
    </div> <!--end::App Wrapper-->
</body>
</html>
