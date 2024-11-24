<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Acara</title>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('components.sidebar')

        <main class="app-main">
            <!-- Header -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Tambah Acara</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Acara</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Tambah Acara -->
            <div class="container mt-3">
                <form action="{{ route('acara.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul_acara">Judul Acara</label>
                        <input type="text" class="form-control" id="judul_acara" name="judul_acara" required>
                    </div>
                    <div class="mb-3">
                        <label for="detail_acara">Detail Acara</label>
                        <textarea class="form-control" id="detail_acara" name="detail_acara" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="lampiran">Lampiran</label>
                        <input type="file" class="form-control" id="lampiran" name="lampiran[]" multiple>
                        <small>Format: jpg, png, pdf, docx, xlsx, dll.</small>
                    </div>
                    <!-- Tombol Simpan dan Batal -->
                    <button type="submit" class="btn"
                        style="background-color: #13C56B; color: white; border: none;">
                        Simpan
                    </button>
                    <a href="{{ route('acara_') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
