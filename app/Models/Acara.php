<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
  use HasFactory;

  protected $table = 'acara';

  protected $fillable = [
    'judul_acara',
    'detail_acara',
    'lampiran',
  ];

  protected $casts = [
    'lampiran' => 'array', // Cast lampiran column as array
  ];
}

