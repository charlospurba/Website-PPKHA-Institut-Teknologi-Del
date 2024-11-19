<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasborController extends Controller
{
    public function showDasbor()
    {
        // Kirim data ke view
        return view('SIK.DaSbor');
    }
}
