<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
  use HasFactory;

  // Nama tabel di database
  protected $table = 'lowongan';

  // Kolom-kolom yang bisa diisi secara massal
  protected $fillable = [
    'judul',           // Kolom untuk judul lowongan
    'perusahaan',      // Kolom untuk nama perusahaan
    'cover',           // Kolom untuk cover (gambar)
    'lokasi',          // Kolom untuk lokasi penempatan
    'deskripsi',       // Kolom untuk deskripsi lowongan
    'jenis_pekerjaan', // Kolom untuk jenis pekerjaan
  ];
}
