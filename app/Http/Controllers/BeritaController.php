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
    $berita = Berita::all();
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
    Berita::create($validatedData);


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
    // Validate input
    $request->validate([
      'judul_berita' => 'required|string|max:255',
      'detail_berita' => 'required|string',
      'cover_berita' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $berita = Berita::findOrFail($id);

    // Handle cover_berita upload
    if ($request->hasFile('gambar')) {
      // Delete old cover_berita if exists
      if ($berita->gambar) {
        Storage::disk('public')->delete($berita->gambar);
      }
      // Store new cover_berita
      $coverBeritaPath = $request->file('gambar')->store('gambar', 'public');
      $berita->gambar = $coverBeritaPath;
    }

    // Update berita details
    $berita->judul_berita = $request->judul_berita;
    $berita->detail_berita = $request->detail_berita;
    $berita->save();

    return redirect()->route('berita_')->with('success', 'Berita berhasil diupdate!');
  }

  // Remove the specified berita from storage
  public function destroy($id)
  {
    $berita = Berita::find($id);

    if ($berita) {
      $berita->delete();
      return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Berita tidak ditemukan'], 404);
  }
}
