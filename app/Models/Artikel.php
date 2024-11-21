<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
  use HasFactory;

  // Specify the table name if it doesn't follow Laravel's naming convention
  protected $table = 'artikel';

  // Mass assignable attributes
  protected $fillable = [
    'judul_artikel',
    'isi_artikel',
    'cover_artikel',
  ];
}
