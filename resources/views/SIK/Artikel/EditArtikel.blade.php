<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
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
                            <h3 class="mb-0">Edit Artikel</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Artikel</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Judul Artikel -->
                    <div class="mb-3">
                        <label for="judul_artikel" class="form-label">Judul Artikel</label>
                        <input type="text" name="judul_artikel" class="form-control"
                            value="{{ $artikel->judul_artikel }}" required>
                    </div>

                    <!-- Isi Artikel -->
                    <div class="mb-3">
                        <label for="isi_artikel" class="form-label">Isi Artikel</label>
                        <textarea name="isi_artikel" class="form-control" rows="5" required>{{ $artikel->isi_artikel }}</textarea>
                    </div>

                    <!-- Cover Artikel -->
                    <div class="mb-3">
                        <label for="cover_artikel" class="form-label">Cover</label>
                        <input type="file" name="cover_artikel" class="form-control">
                        @if ($artikel->cover_artikel)
                            <img src="{{ asset('storage/' . $artikel->cover_artikel) }}" class="mt-2" width="100"
                                alt="Cover">
                        @endif
                    </div>

                    <!-- Sumber Artikel -->
                    <div class="mb-3">
                        <label for="sumber_artikel" class="form-label">Sumber Artikel</label>
                        <input type="text" name="sumber_artikel" class="form-control"
                            value="{{ $artikel->sumber_artikel }}">
                    </div>

                    <!-- Tombol Submit -->
                    <div class="mt-3">
                        <button type="submit" class="btn" style="background-color: #13C56B; color: white;">
                            Perbarui
                        </button>
                        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Batal</a>
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
