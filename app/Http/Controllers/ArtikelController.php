<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
  public function index()
  {
    // Paginate the articles with 9 items per page and order by the most recent
    $artikel = Artikel::latest()->paginate(12);

    return view('web.artikel', compact('artikel'));
  }


  public function index2()
  {
    $artikel = Artikel::all();
    return view('SIK.Artikel.Artikel', compact('artikel')); // View untuk admin
  }

  public function search(Request $request)
  {
    $query = $request->input('query');
    $artikel = Artikel::where('judul_artikel', 'like', "%{$query}%")
      ->orderBy('created_at', 'desc')  // Mengurutkan berdasarkan created_at, 'desc' untuk descending (terbaru)
      ->paginate(12);

    return view('web.artikel', compact('artikel'));  // Pastikan ini sesuai dengan path view Anda
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
    // Fetch the article by ID
    $artikel = Artikel::findOrFail($id);

    // Fetch 3 random articles for recommendations
    $random_articles = Artikel::inRandomOrder()->limit(3)->get();

    // Return the view with the article and the random articles
    return view('web.DetailArtikel', compact('artikel', 'random_articles'));
  }

}
