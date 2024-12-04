<!DOCTYPE html>
<html lang="en">

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Acara</title>
    <script>
        // Fungsi untuk menghapus tampilan lampiran lama dan menandainya sebagai dihapus
        function removeAttachment(index, file) {
            // Menghapus tampilan lampiran dari UI
            const lampiranItem = document.getElementById(`lampiran-item-${index}`);
            lampiranItem.remove();

            // Menambahkan input hidden yang menandakan bahwa file ini dihapus
            const inputDeleted = document.createElement('input');
            inputDeleted.type = 'hidden';
            inputDeleted.name = 'deleted_lampiran[]'; // Menyimpan file yang dihapus
            inputDeleted.value = file;

            // Menambahkan input ke form
            const form = document.querySelector('form');
            form.appendChild(inputDeleted);
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
                            <h3>Edit Acara</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Acara</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Edit Acara -->
            <div class="container mt-3">
                <form action="{{ route('acara.update', $acara->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="judul_acara">Judul Acara</label>
                        <input type="text" class="form-control" id="judul_acara" name="judul_acara"
                            value="{{ $acara->judul_acara }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="detail_acara">Detail Acara</label>
                        <textarea class="form-control" id="detail_acara" name="detail_acara" rows="4" required>{{ $acara->detail_acara }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="lampiran">Lampiran Baru</label>
                        <input type="file" class="form-control" id="lampiran" name="lampiran[]" multiple>
                        <small>Format: jpg, png, pdf, docx, xlsx, dll.</small>
                    </div>
                    <div class="mb-3">
                        <p>Lampiran Lama:</p>
                        @if ($acara->lampiran)
                            @foreach ($acara->lampiran as $index => $file)
                                <div id="lampiran-item-{{ $index }}" style="margin-bottom: 10px;">
                                    <a href="{{ asset('storage/' . $file) }}" target="_blank">Lihat Lampiran</a>
                                    <button type="button" class="btn btn-sm"
                                        style="background-color: #FF0000; color: white; border: none; margin-left: 10px;"
                                        onclick="removeAttachment({{ $index }}, '{{ $file }}')">X</button>
                                    <input type="hidden" name="existing_lampiran[]" value="{{ $file }}">
                                </div>
                            @endforeach
                        @else
                            Tidak ada lampiran
                        @endif
                    </div>
                    <!-- Tombol Perbarui dan Batal -->
                    <button type="submit" class="btn"
                        style="background-color: #13C56B; color: white; border: none;">
                        Perbarui
                    </button>
                    <a href="{{ route('acara_') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
