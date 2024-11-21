<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class DaftarPerusahaanController extends Controller
{
  // Method untuk menampilkan halaman daftar perusahaan
  public function index()
  {
    // Ambil semua data perusahaan dari model
    $perusahaan = Perusahaan::all();

    // Tampilkan view dengan data perusahaan
    return view('web.DaftarPerusahaan', compact('perusahaan'));
  }

  // Method untuk menampilkan halaman daftar perusahaan
  public function index2()
  {
    // Ambil semua data perusahaan dari model
    $perusahaan = Perusahaan::all();

    // Tampilkan view dengan data perusahaan
    return view('SIK.DaftarPerusahaan', compact('perusahaan'));
  }

  // Method untuk menyimpan data perusahaan
  public function store(Request $request)
  {
    // Validasi input
    $request->validate([
      'nama_perusahaan' => 'required|string|max:255',
      'link_perusahaan' => 'nullable|url',
      'cover' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
    ]);

    // Simpan file cover jika ada
    $coverPath = null;
    if ($request->hasFile('cover')) {
      $coverPath = $request->file('cover')->store('covers', 'public');
    }

    // Simpan data ke database
    Perusahaan::create([
      'nama_perusahaan' => $request->nama_perusahaan,
      'link_perusahaan' => $request->link_perusahaan,
      'cover' => $coverPath,
    ]);

    // Redirect ke halaman daftar perusahaan dengan pesan sukses
    return redirect()->route('daftar.perusahaan')->with('success', 'Perusahaan berhasil ditambahkan!');
  }
}
