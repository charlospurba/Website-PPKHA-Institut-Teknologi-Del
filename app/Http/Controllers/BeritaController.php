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

  // Show the form for creating a new berita
  public function create()
  {
    return view('web.BeritaCreate');
  }

  // Store a newly created berita in storage
  public function store(Request $request)
  {
    // Validate input
    $request->validate([
      'judul_berita' => 'required|string|max:255',
      'detail_berita' => 'required|string',
      'cover_berita' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Handle cover_berita upload
    $coverBeritaPath = null;
    if ($request->hasFile('cover_berita')) {
      $coverBeritaPath = $request->file('cover_berita')->store('cover_berita', 'public');
    }

    // Save berita to database
    Berita::create([
      'judul_berita' => $request->judul_berita,
      'detail_berita' => $request->detail_berita,
      'cover_berita' => $coverBeritaPath,
    ]);

    return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
  }

  // Display the specified berita
  public function show($id)
  {
    $berita = Berita::findOrFail($id);
    return view('web.BeritaShow', compact('berita'));
  }

  // Show the form for editing the specified berita
  public function edit($id)
  {
    $berita = Berita::findOrFail($id);
    return view('web.BeritaEdit', compact('berita'));
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
    if ($request->hasFile('cover_berita')) {
      // Delete old cover_berita if exists
      if ($berita->cover_berita) {
        Storage::disk('public')->delete($berita->cover_berita);
      }
      // Store new cover_berita
      $coverBeritaPath = $request->file('cover_berita')->store('cover_berita', 'public');
      $berita->cover_berita = $coverBeritaPath;
    }

    // Update berita details
    $berita->judul_berita = $request->judul_berita;
    $berita->detail_berita = $request->detail_berita;
    $berita->save();

    return redirect()->route('berita.index')->with('success', 'Berita berhasil diupdate!');
  }

  // Remove the specified berita from storage
  public function destroy($id)
  {
    $berita = Berita::findOrFail($id);

    // Delete cover_berita if exists
    if ($berita->cover_berita) {
      Storage::disk('public')->delete($berita->cover_berita);
    }

    $berita->delete();

    return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
  }
}
