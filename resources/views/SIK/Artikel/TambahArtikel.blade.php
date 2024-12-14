<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('components.navSIK')
        @include('components.sidebar')

        <main class="app-main">
            <!-- Header -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Tambah Artikel</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Artikel</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Tambah Artikel -->
            <div class="container mt-3">
                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul_artikel">Judul Artikel</label>
                        <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi_artikel">Isi Artikel</label>
                        <textarea class="form-control" id="isi_artikel" name="isi_artikel" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="cover_artikel">Cover</label>
                        <input type="file" class="form-control" id="cover_artikel" name="cover_artikel">
                    </div>
                    <div class="mb-3">
                        <label for="sumber_artikel">Sumber Artikel</label>
                        <input type="text" class="form-control" id="sumber_artikel" name="sumber_artikel">
                    </div>
                    <!-- Tombol Simpan dan Batal -->
                    <button type="submit" class="btn"
                        style="background-color: #13C56B; color: white; border: none;">
                        Simpan
                    </button>
                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Batal</a>
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
