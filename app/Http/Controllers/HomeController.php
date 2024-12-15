<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Lowongan;

class HomeController extends Controller
{
    public function index()
    {
        $lowonganTerbaru = Lowongan::latest()->take(4)->get();
        // Mengambil acara terbaru
        $acaraTerbaru = Acara::latest()->take(3)->get();

        // Mengambil artikel terbaru
        $artikelTerbaru = Artikel::latest()->take(4)->get();

        // Mengambil berita terbaru
        $beritaTerbaru = Berita::latest()->take(5)->get()->map(function ($berita) {
            // Pastikan 'gambar' berisi string dan bukan array
            if (is_array($berita->gambar)) {
                $berita->gambar = $berita->gambar[0]; // Ambil gambar pertama jika gambar adalah array
            }
            return $berita;
        });

        // Kirim data ke view
        return view('web.home', compact('acaraTerbaru', 'artikelTerbaru', 'beritaTerbaru', 'lowonganTerbaru'));
    }

}
