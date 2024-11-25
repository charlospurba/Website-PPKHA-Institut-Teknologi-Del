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

            <div class="card mb-4">
                <div class="card-header">
                    <form action="{{ route('lowongan.update', $lowongan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Judul Lowongan</label>
                                <input type="text" name="judul" class="form-control" value="{{ $lowongan->judul }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                <input type="text" id="nama_perusahaan" name="nama_perusahaan" 
                                       class="form-control" 
                                       value="{{ $lowongan->perusahaan->nama_perusahaan ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label>Cover</label>
                                <input type="file" name="cover" class="form-control">
                                @if ($lowongan->cover)
                                    <img src="{{ asset('storage/' . $lowongan->cover) }}" alt="Cover" width="100">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>Lokasi Penempatan</label>
                                <input type="text" name="lokasi" class="form-control"
                                    value="{{ $lowongan->lokasi }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi Lowongan</label>
                                <textarea name="deskripsi" class="form-control" rows="4" required>{{ $lowongan->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Pekerjaan</label>
                                <select name="jenis_pekerjaan" class="form-select" required>
                                    <option value="Full-time"
                                        {{ $lowongan->jenis_pekerjaan == 'Full-time' ? 'selected' : '' }}>Full-time
                                    </option>
                                    <option value="Part-time"
                                        {{ $lowongan->jenis_pekerjaan == 'Part-time' ? 'selected' : '' }}>Part-time
                                    </option>
                                    <option value="Magang"
                                        {{ $lowongan->jenis_pekerjaan == 'Magang' ? 'selected' : '' }}>Magang
                                    </option>
                                    <option value="Kontrak"
                                        {{ $lowongan->jenis_pekerjaan == 'Kontrak' ? 'selected' : '' }}>Kontrak
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn"
                                style="background-color: #13C56B; color: white; border: 1px solid #13C56B;">
                                Perbarui
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
