<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
  use HasFactory;

  // Nama tabel di database
  protected $table = 'perusahaan';

  // Kolom-kolom yang bisa diisi secara massal
  protected $fillable = [
    'nama_perusahaan',
    'link_perusahaan',
    'cover',
  ];
}
