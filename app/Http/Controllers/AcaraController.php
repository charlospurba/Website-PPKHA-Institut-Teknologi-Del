<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
  // Display a listing of the acara
  public function index()
  {
    $acara = Acara::all();
    return view('web.Acara', compact('acara'));
  }

  // Display a listing of the acara
  public function index2()
  {
    $acara = Acara::all();
    return view('SIK.Acara.Acara', compact('acara'));
  }

  public function index3()
  {
    $acara = Acara::all();
    return view('SIK.Acara.TambahAcara', compact('acara'));
  }




  // Show the form for creating a new acara
  public function create()
  {
    return view('web.AcaraCreate');
  }

  // Store a newly created acara in storage
  public function store(Request $request)
  {
    // Validate input
    $request->validate([
      'judul_acara' => 'required|string|max:255',
      'detail_acara' => 'required|string',
      'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx|max:5120',
    ]);

    // Handle lampiran (attachment) upload
    $lampiranPath = null;
    if ($request->hasFile('lampiran')) {
      $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
    }

    // Save acara to database
    Acara::create([
      'judul_acara' => $request->judul_acara,
      'detail_acara' => $request->detail_acara,
      'lampiran' => $lampiranPath,
    ]);

    return redirect()->route('acara.index')->with('success', 'Acara berhasil ditambahkan!');
  }

  // Display the specified acara
  public function show($id)
  {
    $acara = Acara::findOrFail($id);
    return view('web.AcaraShow', compact('acara'));
  }

  // Show the form for editing the specified acara
  public function edit($id)
  {
    $acara = Acara::findOrFail($id);
    return view('web.AcaraEdit', compact('acara'));
  }

  // Update the specified acara in storage
  public function update(Request $request, $id)
  {
    // Validate input
    $request->validate([
      'judul_acara' => 'required|string|max:255',
      'detail_acara' => 'required|string',
      'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx|max:5120',
    ]);

    $acara = Acara::findOrFail($id);

    // Handle lampiran upload
    if ($request->hasFile('lampiran')) {
      // Delete old lampiran if exists
      if ($acara->lampiran) {
        Storage::disk('public')->delete($acara->lampiran);
      }
      // Store new lampiran
      $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
      $acara->lampiran = $lampiranPath;
    }

    // Update acara details
    $acara->judul_acara = $request->judul_acara;
    $acara->detail_acara = $request->detail_acara;
    $acara->save();

    return redirect()->route('acara.index')->with('success', 'Acara berhasil diupdate!');
  }

  // Remove the specified acara from storage
  public function destroy($id)
  {
    $acara = Acara::findOrFail($id);

    // Delete lampiran if exists
    if ($acara->lampiran) {
      Storage::disk('public')->delete($acara->lampiran);
    }

    $acara->delete();

    return redirect()->route('acara.index')->with('success', 'Acara berhasil dihapus!');
  }
}
