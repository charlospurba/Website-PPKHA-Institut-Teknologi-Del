<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
  use HasFactory;

  protected $table = 'berita';

  // Mass assignable attributes
  protected $fillable = [
    'judul_berita',
    'detail_berita',
    'cover_berita',
  ];
}
