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
    'lowongan',
    'deskripsi',
    'lokasi',
    'perusahaan',
  ];
}