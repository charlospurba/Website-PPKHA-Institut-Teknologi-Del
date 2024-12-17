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
    // Ambil semua data lowongan yang diurutkan berdasarkan 'updated_at' secara menurun (data terbaru di atas)
    $lowongan = Lowongan::orderBy('updated_at', 'desc')->get(); 

    

    return view('SIK.Lowongankerja.LowonganKerja', compact('lowongan'));
}


public function index2()
{
    // Ambil semua data lowongan yang diurutkan berdasarkan 'updated_at' secara menurun
    $lowongan = Lowongan::orderBy('updated_at', 'desc')->get();

    return view('web.LowonganKerja', compact('lowongan'));
}



  // Menampilkan halaman tambah lowongan
  public function create()
  {
    return view('SIK.Lowongankerja.TambahLowonganKerja');
  }

  public function show($id)
  {
    // Pastikan hanya mendapatkan satu data
    $lowongan = Lowongan::find($id);

    if (!$lowongan) {
      return abort(404, 'Lowongan tidak ditemukan');
    }

    return view('web.DetailLowongan', compact('lowongan'));
  }



  // Menyimpan data baru
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'judul' => 'required|string',
      'nama_perusahaan' => 'required|string',
      'lokasi' => 'required|string',
      'deskripsi' => 'required|string',
      'kualifikasi' => 'required|string',
      'benefit' => 'required|string',
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
      'judul' => 'required|string',
      'nama_perusahaan' => 'required|string',
      'lokasi' => 'required|string',
      'deskripsi' => 'required|string',
      'kualifikasi' => 'required|string',
      'benefit' => 'required|string',
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

  // Menampilkan halaman daftar lowongan dengan fitur pencarian
  public function search(Request $request)
  {
    $query = $request->input('query');
    $lowongan = Lowongan::where('judul', 'like', "%{$query}%")
      ->orderBy('created_at', 'desc')  // Mengurutkan berdasarkan created_at, 'desc' untuk descending (terbaru)
      ->paginate(10);

    return view('web.LowonganKerja', compact('lowongan'));  // Pastikan ini sesuai dengan path view Anda
  }
}
