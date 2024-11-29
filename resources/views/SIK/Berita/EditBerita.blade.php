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
                        <label for="gambar">Tambah Gambar</label>
                        <div id="new-gambar-container">
                            <!-- Input baru akan ditambahkan di sini -->
                        </div>
                        <button type="button" class="btn btn-sm btn-primary" onclick="addNewInput()">Tambah Gambar</button>
                        <small>Format: jpg, png, pdf, docx, xlsx, dll.</small>
                    </div>
                    
                    <div class="mb-3">
                        <p>Lampiran Lama:</p>
                        @if ($berita->gambar)
                            @foreach ($berita->gambar as $index => $file)
                                <div id="lampiran-item-{{ $index }}" class="d-flex align-items-center mb-2">
                                    <a href="{{ asset('storage/' . $file) }}" target="_blank" class="me-2">Lihat Lampiran</a>
                                    <label>
                                        <input type="checkbox" name="hapus_gambar[]" value="{{ $file }}"> Hapus
                                    </label>
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

<script>
    let newInputIndex = 0;

    function addNewInput() {
        const container = document.getElementById('new-gambar-container');
        const newInput = document.createElement('div');
        newInput.classList.add('mb-2');
        newInput.id = `new-input-${newInputIndex}`;
        newInput.innerHTML = `
            <input type="file" class="form-control" name="gambar[]" required>
            <button type="button" class="btn btn-sm btn-danger mt-1" onclick="removeNewInput(${newInputIndex})">Hapus</button>
        `;
        container.appendChild(newInput);
        newInputIndex++;
    }

    function removeNewInput(index) {
        const inputToRemove = document.getElementById(`new-input-${index}`);
        if (inputToRemove) {
            inputToRemove.remove();
        }
    }
</script>


</html>
