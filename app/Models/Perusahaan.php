<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
  use HasFactory;

  protected $table = 'perusahaan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_perusahaan',
        'daerah_perusahaan',
        'link_perusahaan',
        'deskripsi_perusahaan',
        'cover_perusahaan',
    ];
}
