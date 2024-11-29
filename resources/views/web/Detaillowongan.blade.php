<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Detail Lowongan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <style>
    /* Styling untuk card deskripsi, kualifikasi, dan benefit */
    .custom-card {
      max-width: 900px; /* Membatasi lebar card */
      margin: 0 auto; /* Menempatkan card di tengah */
    }

    .section-header {
      font-size: 20px;
      font-weight: bold;
    }

    .section-content {
      font-size: 16px;
      line-height: 1.5;
    }
  </style>
</head>

<body>
  @include('components.navbar')

  <!-- Job Title Section -->
  <section id="detail-perusahaan" class="container py-5">
    <div class="card mb-4">
      <div class="card-body">
        <div class="job-detail-container d-flex align-items-center gap-3" style="display: flex; align-items: center;">
          <!-- Gambar -->
          @if ($lowongan->cover)
            <img src="{{ asset('storage/' . $lowongan->cover) }}" alt="Cover"
              class="job-cover" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
          @else
            <div
              style="width: 150px; height: 150px; background-color: #ddd; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
              <span>No Image</span>
            </div>
          @endif
      
          <!-- Detail Perusahaan dan Job Info -->
          <div style="flex-grow: 1;">
            <h1 class="job-title" style="font-size: 24px; margin: 0; color: #354A7B">{{ $lowongan->nama_perusahaan }}</h1>
            <p class="job-info" style="margin: 4px 0; color: #354A7B"> {{ $lowongan->judul }}</p>
            <button class="btn" style="background-color: #B9965B; color: white">
              {{ $lowongan->jenis_pekerjaan }}
            </button>
            <div>
              <p style="font-size: 14px; margin-bottom: 4px;"><strong>Lokasi:</strong> {{ $lowongan->lokasi }}</p>
              <p class="text-muted">Tanggal Publish {{ $lowongan->created_at->format('d F Y') }}</p>
            </div>
          </div>
      
          <!-- Tombol Apply -->
          <div style="margin-left: auto;">
            <button class="btn" style="background-color: #9BBDDC; color: white" onclick="window.location.href='#'">Apply</button>
          </div>
        </div>
      </div>
      
    </div>

    <!-- Deskripsi Lowongan Card -->
    <div class="card custom-card mb-4">
      <div class="card-header">
        <h2 class="section-header" style="color: #354A7B">Deskripsi Lowongan</h2>
      </div>
      <div class="card-body">
        <p class="section-content">{{ $lowongan->deskripsi }}</p>
      </div>
    </div>

    <!-- Kualifikasi Card -->
    <div class="card custom-card mb-4">
      <div class="card-header">
        <h2 class="section-header" style="color: #354A7B">Kualifikasi</h2>
      </div>
      <div class="card-body">
        <ul class="section-content list-style">
          <li> {!! nl2br(e($lowongan->kualifikasi)) !!}</li>
        </ul>
      </div>
    </div>

    <!-- Benefit Card -->
    <div class="card custom-card mb-4">
      <div class="card-header">
        <h2 class="section-header" style="color: #354A7B">Benefit</h2>
      </div>
      <div class="card-body">
        <ul class="section-content list-style">
          <li>{{ $lowongan->benefit }}</li>
        </ul>
      </div>
    </div>
  </section>

  @include('components.footer')

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
