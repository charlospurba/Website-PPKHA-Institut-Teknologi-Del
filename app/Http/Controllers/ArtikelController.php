<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
  // Display a listing of the articles
  public function index()
  {
    $artikel = Artikel::all();
    return view('web.Artikel', compact('artikel'));
  }

  public function index2()
  {
    $artikel = Artikel::all();
    return view('SIK.Artikel', compact('artikel'));
  }

  // Show the form for creating a new article
  public function create()
  {
    return view('web.ArtikelCreate');
  }

  // Store a newly created article in storage
  public function store(Request $request)
  {
    // Validate input
    $request->validate([
      'judul_artikel' => 'required|string|max:255',
      'isi_artikel' => 'required|string',
      'cover_artikel' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Handle cover_artikel upload
    $coverArtikelPath = null;
    if ($request->hasFile('cover_artikel')) {
      $coverArtikelPath = $request->file('cover_artikel')->store('cover_artikel', 'public');
    }

    // Save article to database
    Artikel::create([
      'judul_artikel' => $request->judul_artikel,
      'isi_artikel' => $request->isi_artikel,
      'cover_artikel' => $coverArtikelPath,
    ]);

    return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
  }

  // Display the specified article
  public function show($id)
  {
    $artikel = Artikel::findOrFail($id);
    return view('web.ArtikelShow', compact('artikel'));
  }

  // Show the form for editing the specified article
  public function edit($id)
  {
    $artikel = Artikel::findOrFail($id);
    return view('web.ArtikelEdit', compact('artikel'));
  }

  // Update the specified article in storage
  public function update(Request $request, $id)
  {
    // Validate input
    $request->validate([
      'judul_artikel' => 'required|string|max:255',
      'isi_artikel' => 'required|string',
      'cover_artikel' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $artikel = Artikel::findOrFail($id);

    // Handle cover_artikel upload
    if ($request->hasFile('cover_artikel')) {
      // Delete old cover_artikel if exists
      if ($artikel->cover_artikel) {
        Storage::disk('public')->delete($artikel->cover_artikel);
      }
      // Store new cover_artikel
      $coverArtikelPath = $request->file('cover_artikel')->store('cover_artikel', 'public');
      $artikel->cover_artikel = $coverArtikelPath;
    }

    // Update article details
    $artikel->judul_artikel = $request->judul_artikel;
    $artikel->isi_artikel = $request->isi_artikel;
    $artikel->save();

    return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diupdate!');
  }

  // Remove the specified article from storage
  public function destroy($id)
  {
    $artikel = Artikel::findOrFail($id);

    // Delete cover_artikel if exists
    if ($artikel->cover_artikel) {
      Storage::disk('public')->delete($artikel->cover_artikel);
    }

    $artikel->delete();

    return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
  }
}
