<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('judul');           // Kolom untuk judul lowongan
            $table->string('perusahaan');      // Kolom untuk nama perusahaan
            $table->string('cover')->nullable(); // Kolom untuk cover (gambar), bisa null
            $table->string('lokasi');          // Kolom untuk lokasi penempatan
            $table->text('deskripsi');         // Kolom untuk deskripsi lowongan
            $table->string('jenis_pekerjaan'); // Kolom untuk jenis pekerjaan (dropdown)
            $table->timestamps();             // Kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lowongan'); // Menghapus tabel jika rollback
    }
};
