<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
  use HasFactory;

  protected $table = 'acara';

  // Mass assignable attributes
  protected $fillable = [
    'judul_acara',
    'detail_acara',
    'lampiran',
  ];
}
