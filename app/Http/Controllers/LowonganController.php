<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
  // Menampilkan halaman utama Lowongan Kerja

  public function index()
  {
    $lowongan = Lowongan::all(); // Mengambil semua data lowongan
    return view('SIK.Lowongankerja.LowonganKerja', compact('lowongan'));
  }

  public function index2()
  {
    $lowongan = Lowongan::all(); // Ambil data dari model
    return view('web.LowonganKerja', compact('lowongan'));
  }


  // Menampilkan halaman tambah lowongan
  public function create()
  {
    return view('SIK.Lowongankerja.TambahLowonganKerja');
  }

  // Menyimpan data baru
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'judul' => 'required|string|max:255',
      'nama_perusahaan' => 'required|string|max:255',
      'lokasi' => 'required|string|max:255',
      'deskripsi' => 'required|string',
      'jenis_pekerjaan' => 'required|string',
      'cover' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    if ($request->hasFile('cover')) {
      $path = $request->file('cover')->store('covers', 'public');
      $validatedData['cover'] = $path;
    }

    Lowongan::create($validatedData);
    return redirect()->route('lowongan_kerja')->with('success', 'Lowongan berhasil ditambahkan!');
  }

  // Menampilkan halaman edit lowongan
  public function edit($id)
  {
    $lowongan = Lowongan::findOrFail($id); // Cari data berdasarkan ID
    return view('SIK.Lowongankerja.EditLowonganKerja', compact('lowongan'));
  }

  // Memperbarui data
  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'judul' => 'required|string|max:255',
      'nama_perusahaan' => 'required|string|max:255',
      'lokasi' => 'required|string|max:255',
      'deskripsi' => 'required|string',
      'jenis_pekerjaan' => 'required|string',
      'cover' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $lowongan = Lowongan::findOrFail($id);

    if ($request->hasFile('cover')) {
      if ($lowongan->cover) {
        Storage::disk('public')->delete($lowongan->cover);
      }
      $path = $request->file('cover')->store('covers', 'public');
      $validatedData['cover'] = $path;
    }

    $lowongan->update($validatedData);
    return redirect()->route('lowongan_kerja')->with('success', 'Lowongan berhasil diperbarui!');
  }

  // Menghapus data
  public function destroy($id)
  {
    $lowongan = Lowongan::findOrFail($id);

    if ($lowongan->cover) {
      Storage::disk('public')->delete($lowongan->cover);
    }

    $lowongan->delete();
    return response()->json(['success' => 'Lowongan berhasil dihapus!']);
  }
}
