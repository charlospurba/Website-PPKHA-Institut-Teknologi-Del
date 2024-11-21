<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class LowonganController extends Controller
{
  // Method untuk menampilkan halaman Lowongan Kerja
  public function index()
  {
    // Ambil data lowongan dari model Lowongan
    $lowongan = Lowongan::first();

    // Tampilkan view LowonganKerja dengan data lowongan
    return view('web.LowonganKerja', compact('lowongan'));
  }

  // Method untuk menampilkan halaman Lowongan Kerja
  public function index2()
  {
    // Ambil data lowongan dari model Lowongan
    $loker = Lowongan::first();

    // Tampilkan view LowonganKerja dengan data lowongan
    return view('SIK.LowonganKerja', compact('loker'));
  }

}