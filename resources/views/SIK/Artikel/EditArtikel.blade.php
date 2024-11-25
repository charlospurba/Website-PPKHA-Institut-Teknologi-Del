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

            <div class="card mb-4">
                <div class="card-header">
                    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Judul Artikel</label>
                                <input type="text" name="judul_artikel" class="form-control"
                                    value="{{ $artikel->judul_artikel }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Isi Artikel</label>
                                <textarea name="isi_artikel" class="form-control" rows="5" required>{{ $artikel->isi_artikel }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Cover</label>
                                <input type="file" name="cover_artikel" class="form-control">
                                @if ($artikel->cover_artikel)
                                    <img src="{{ asset('storage/' . $artikel->cover_artikel) }}" class="mt-2"
                                        width="100" alt="Cover">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>Sumber Artikel</label>
                                <input type="text" name="sumber_artikel" class="form-control"
                                    value="{{ $artikel->sumber_artikel }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn" style="background-color: #13C56B; color: white;">
                                Simpan
                            </button>
                            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
