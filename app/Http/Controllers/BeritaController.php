<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
  // Display a listing of the berita
  public function index()
  {
    $berita = Berita::all();
    return view('web.Berita', compact('berita'));
  }

  // Display a listing of the berita
  public function index2()
  {
    $berita = Berita::orderBy('created_at', 'desc')->get();
    return view('SIK.Berita.Berita', compact('berita'));
  }

  public function index3()
  {
    $berita = Berita::all();
    return view('SIK.Berita.TambahBerita', compact('berita'));
  }

  public function index4()
  {
    $berita = Berita::all();
    return view('SIK.Berita.EditBerita', compact('berita'));
  }

  // Show the form for creating a new berita
  public function create()
  {
    return view('web.BeritaCreate');
  }

  // Store a newly created berita in storage
  public function store(Request $request)
  {
    // Validasi input
    $validatedData = $request->validate([
      'judul_berita' => 'required|string',
      'detail_berita' => 'required|string',
      'gambar.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xlsx,xls|max:5120',
    ]);

    // Mengunggah lampiran jika ada
    $gambarPaths = [];
    if ($request->hasFile('gambar')) {
      foreach ($request->file('gambar') as $file) {
        $gambarPaths[] = $file->store('gambar', 'public');
      }
    }

    // Menyimpan data ke database
    Berita::create([
      'judul_berita' => $validatedData['judul_berita'],
      'detail_berita' => $validatedData['detail_berita'],
      'gambar' => $gambarPaths,
    ]);
      

    return redirect()->route('berita_')->with('success', 'Berita berhasil ditambahkan!');
  }

  // Display the specified berita
  public function show($id)
  {
    $berita = Berita::findOrFail($id);
    return view('web.DetailBerita', compact('berita'));
  }

  // Show the form for editing the specified berita
  public function edit($id)
  {
    $berita = Berita::findOrFail($id);
    return view('SIK.Berita.EditBerita', compact('berita'));
  }

  // Update the specified berita in storage
  public function update(Request $request, $id)
  {
      $validatedData = $request->validate([
          'judul_berita' => 'required|string',
          'detail_berita' => 'required|string',
          'gambar.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xlsx,xls|max:5120',
      ]);
  
      $berita = Berita::findOrFail($id);
  
      // Hapus gambar lama jika dicentang
      if ($request->has('hapus_gambar')) {
          foreach ($request->hapus_gambar as $file) {
              if (Storage::disk('public')->exists($file)) {
                  Storage::disk('public')->delete($file);
              }
          }
  
          // Filter gambar yang tidak dihapus
          $berita->gambar = array_diff($berita->gambar ?? [], $request->hapus_gambar);
      }
  
      // Tambah gambar baru
      $gambarPaths = $berita->gambar ?? [];
      if ($request->hasFile('gambar')) {
          foreach ($request->file('gambar') as $file) {
              $gambarPaths[] = $file->store('gambar', 'public');
          }
      }
  
      // Update berita
      $berita->update([
          'judul_berita' => $validatedData['judul_berita'],
          'detail_berita' => $validatedData['detail_berita'],
          'gambar' => $gambarPaths,
      ]);
  
      return redirect()->route('berita_')->with('success', 'Berita berhasil diupdate!');
  }
  

  // Remove the specified berita from storage
  public function destroy($id)
  {
      try {
          $berita = Berita::findOrFail($id);
          $berita->delete();
  
          return response()->json(['success' => true]);
      } catch (\Exception $e) {
          return response()->json(['success' => false, 'message' => 'Gagal menghapus berita.'], 500);
      }
  }
  
  
}
