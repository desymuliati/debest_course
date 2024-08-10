<?php

namespace App\Http\Controllers\Front;

use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        // Mengambil 4 kursus terbaru
        $kursus = Kursus::latest()->take(4)->get();

        return view('landing', [
            'kursus' => $kursus
        ]);
    }
}
