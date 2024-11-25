<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <script>
        // Fungsi untuk menghapus tampilan lampiran lama
        function removeAttachment(index) {
            document.getElementById(`lampiran-item-${index}`).remove();
        }
    </script>
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
                            <h3>Edit Berita</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Berita</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Edit Berita -->
            <div class="container mt-3">
                <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="judul_berita">Judul Berita</label>
                        <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                            value="{{ $berita->judul_berita }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="detail_berita">Detail Berita</label>
                        <textarea class="form-control" id="detail_berita" name="detail_berita" rows="4" required>{{ $berita->detail_berita }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar"></label>
                        <input type="file" class="form-control" id="gambar" name="gambar[]" multiple>
                        <small>Format: jpg, png, pdf, docx, xlsx, dll.</small>
                    </div>
                    <div class="mb-3">
                        <p>Lampiran Lama:</p>
                        @if ($berita->gambar)
                            @foreach ($berita->gambar as $index => $file)
                                <div id="lampiran-item-{{ $index }}" style="margin-bottom: 10px;">
                                    <a href="{{ asset('storage/' . $file) }}" target="_blank">Lihat Lampiran</a>
                                    <button type="button" class="btn btn-sm"
                                        style="background-color: #FF0000; color: white; border: none; margin-left: 10px;"
                                        onclick="removeAttachment({{ $index }})">X</button>
                                    <input type="hidden" name="existing_lampiran[]" value="{{ $file }}">
                                </div>
                            @endforeach
                        @else
                            Tidak ada gambar
                        @endif
                    </div>
                    <!-- Tombol Perbarui dan Batal -->
                    <button type="submit" class="btn"
                        style="background-color: #13C56B; color: white; border: none;">
                        Perbarui
                    </button>
                    <a href="{{ route('berita_') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
