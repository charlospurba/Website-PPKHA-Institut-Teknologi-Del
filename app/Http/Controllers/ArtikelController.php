<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
  public function index()
  {
    $artikel = Artikel::all();
    return view('web.Artikel', compact('artikel')); // View untuk user
  }

  public function index2()
  {
    $artikel = Artikel::all();
    return view('SIK.Artikel.Artikel', compact('artikel')); // View untuk admin
  }

  public function create()
  {
    return view('SIK.Artikel.TambahArtikel');
  }

  public function store(Request $request)
  {
    $request->validate([
      'judul_artikel' => 'required|string|max:255',
      'isi_artikel' => 'required|string',
      'cover_artikel' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
      'sumber_artikel' => 'nullable|string|max:255',
    ]);

    // Proses upload cover artikel jika ada
    $coverPath = null;
    if ($request->hasFile('cover_artikel')) {
      $coverPath = $request->file('cover_artikel')->store('cover_artikel', 'public');
    }

    // Simpan data artikel ke database
    Artikel::create([
      'judul_artikel' => $request->judul_artikel,
      'isi_artikel' => $request->isi_artikel,
      'cover_artikel' => $coverPath,
      'sumber_artikel' => $request->sumber_artikel,
    ]);

    // Redirect kembali ke halaman admin (index2)
    return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
  }

  public function edit($id)
  {
    $artikel = Artikel::findOrFail($id);
    return view('SIK.Artikel..EditArtikel', compact('artikel'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'judul_artikel' => 'required|string|max:255',
      'isi_artikel' => 'required|string',
      'cover_artikel' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
      'sumber_artikel' => 'nullable|string|max:255',
    ]);

    $artikel = Artikel::findOrFail($id);

    if ($request->hasFile('cover_artikel')) {
      if ($artikel->cover_artikel) {
        Storage::disk('public')->delete($artikel->cover_artikel);
      }
      $coverPath = $request->file('cover_artikel')->store('cover_artikel', 'public');
      $artikel->cover_artikel = $coverPath;
    }

    $artikel->judul_artikel = $request->judul_artikel;
    $artikel->isi_artikel = $request->isi_artikel;
    $artikel->sumber_artikel = $request->sumber_artikel;
    $artikel->save();

    return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
  }

  public function destroy($id)
  {
    $artikel = Artikel::findOrFail($id);

    // Hapus cover jika ada
    if ($artikel->cover_artikel) {
      Storage::disk('public')->delete($artikel->cover_artikel);
    }

    // Hapus data artikel
    $artikel->delete();

    return response()->json(['success' => 'Artikel berhasil dihapus!']);
  }

  public function show($id)
  {
    $artikel = Artikel::findOrFail($id); // Cari artikel berdasarkan ID
    return view('web.DetailArtikel', compact('artikel')); // Tampilkan halaman detail
  }

}
