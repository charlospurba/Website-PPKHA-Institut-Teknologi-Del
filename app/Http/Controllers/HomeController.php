<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Acara;
use App\Models\Artikel;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil acara terbaru (misalnya 3 acara terakhir)
        $acaraTerbaru = Acara::latest()->take(3)->get();

        // Mengambil artikel terbaru (misalnya 3 artikel terakhir)
        $artikelTerbaru = Artikel::latest()->take(4)->get();

        // Mengirim data ke view
        return view('web.home', compact('acaraTerbaru', 'artikelTerbaru'));
    }
}