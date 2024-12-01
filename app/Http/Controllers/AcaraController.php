<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
  // Menampilkan halaman utama acara untuk admin
  public function index()
  {
    $acara = Acara::all(); // Mengambil semua data acara
    return view('SIK.Acara.Acara', compact('acara')); // View untuk admin
  }

  // Menampilkan halaman utama acara untuk user
  public function index2()
  {
    $acara = Acara::orderBy('created_at', 'desc')->paginate(10);
    return view('web.Acara', compact('acara')); // Tampilkan ke view
  }

  public function show($id)
  {
    $acara = Acara::findOrFail($id);
    return view('web.detailAcara', compact('acara'));
  }


  // Menampilkan halaman tambah acara
  public function create()
  {
    return view('SIK.Acara.TambahAcara'); // View form tambah acara
  }

  // Menyimpan data acara baru
  public function store(Request $request)
  {
    // Validasi input
    $validatedData = $request->validate([
      'judul_acara' => 'required|string|max:255',
      'detail_acara' => 'required|string',
      'lampiran.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xlsx,xls|max:5120',
    ]);

    // Mengunggah lampiran jika ada
    $lampiranPaths = [];
    if ($request->hasFile('lampiran')) {
      foreach ($request->file('lampiran') as $file) {
        $lampiranPaths[] = $file->store('lampiran', 'public');
      }
    }

    // Menyimpan data ke database
    Acara::create([
      'judul_acara' => $validatedData['judul_acara'],
      'detail_acara' => $validatedData['detail_acara'],
      'lampiran' => $lampiranPaths,
    ]);

    return redirect()->route('acara_')->with('success', 'Acara berhasil ditambahkan!');
  }

  // Menampilkan halaman edit acara
  public function edit($id)
  {
    $acara = Acara::findOrFail($id); // Cari data berdasarkan ID
    return view('SIK.Acara.EditAcara', compact('acara')); // View form edit acara
  }

  // Memperbarui data acara
  public function update(Request $request, $id)
  {
    // Validasi input
    $validatedData = $request->validate([
      'judul_acara' => 'required|string|max:255',
      'detail_acara' => 'required|string',
      'lampiran.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xlsx,xls|max:5120',
    ]);

    $acara = Acara::findOrFail($id);

    // Menambahkan lampiran baru
    $lampiranPaths = $acara->lampiran ?? [];
    if ($request->hasFile('lampiran')) {
      foreach ($request->file('lampiran') as $file) {
        $lampiranPaths[] = $file->store('lampiran', 'public');
      }
    }

    // Memperbarui data
    $acara->update([
      'judul_acara' => $validatedData['judul_acara'],
      'detail_acara' => $validatedData['detail_acara'],
      'lampiran' => $lampiranPaths,
    ]);

    return redirect()->route('acara_')->with('success', 'Acara berhasil diperbarui!');
  }

  // Menghapus data acara
  public function destroy($id)
  {
    $acara = Acara::findOrFail($id);

    // Hapus lampiran jika ada
    if ($acara->lampiran) {
      foreach ($acara->lampiran as $file) {
        Storage::disk('public')->delete($file);
      }
    }

    // Hapus data acara
    $acara->delete();

    return response()->json(['success' => 'Acara berhasil dihapus!']);
  }

  public function search(Request $request)
  {
    $query = $request->input('query');
    $acara = Acara::where('judul_acara', 'like', "%{$query}%")
      ->orderBy('created_at', 'desc')
      ->paginate(10);

    return view('web.acara', compact('acara'));
  }
}
