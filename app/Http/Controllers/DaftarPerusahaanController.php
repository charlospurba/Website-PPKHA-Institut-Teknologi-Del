<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Storage;

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
    return view('SIK.Daftarperusahaan.DaftarPerusahaan', compact('perusahaan'));
  }

  public function index3()
  {
    // Ambil semua data perusahaan dari model
    $perusahaan = Perusahaan::all();

    // Tampilkan view dengan data perusahaan
    return view('SIK.Daftarperusahaan.TambahDaftarPerusahaan', compact('perusahaan'));
  }

  public function edit($id)
  {
    // Ambil semua data perusahaan dari model
    $perusahaan = Perusahaan::findOrFail($id);

    // Tampilkan view dengan data perusahaan
    return view('SIK.Daftarperusahaan.EditDaftarPerusahaan', compact('perusahaan'));
  }

  // Method untuk menyimpan data perusahaan
  public function store(Request $request)
  {
    // Validasi input
    $validated = $request->validate([
      'nama_perusahaan' => 'required|string|max:255',
      'daerah_perusahaan' => 'required|string|max:255',
      'link_perusahaan' => 'required|url',
      'deskripsi_perusahaan' => 'required|string',
      'cover_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('cover_perusahaan')) {
      $path = $request->file('cover_perusahaan')->store('cover_perusahaan', 'public');
      $validated['cover_perusahaan'] = $path;
    }

    Perusahaan::create($validated);
    return redirect()->route('daftar_perusahaan')->with('success', 'Perusahaan berhasil ditambahkan!');
  }

  public function edit1($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('daftar_perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama_perusahaan' => 'required|string|max:255',
        'daerah_perusahaan' => 'required|string|max:255',
        'link_perusahaan' => 'required|url',
        'deskripsi_perusahaan' => 'required|string',
        'cover_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $perusahaan = Perusahaan::findOrFail($id);

    if ($request->hasFile('cover_perusahaan')) {
        if ($perusahaan->cover_perusahaan) {
            Storage::disk('public')->delete($perusahaan->cover_perusahaan);
        }
        $validated['cover_perusahaan'] = $request->file('cover_perusahaan')->store('perusahaan_covers', 'public');
    }

    $perusahaan->update($validated);

    return redirect()->route('daftar_perusahaan')->with('success', 'Perusahaan berhasil diperbarui.');
}


    
    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        if ($perusahaan->cover_perusahaan) {
            Storage::disk('public')->delete($perusahaan->cover_perusahaan);
        }

        $perusahaan->delete();

        return redirect()->route('daftar_perusahaan')->with('success', 'Perusahaan berhasil dihapus.');
    }
}
