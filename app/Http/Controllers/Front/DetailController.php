<?php

namespace App\Http\Controllers\Front;

use App\Models\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    public function show($id)
    {
        // Ambil materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Pass data materi ke view
        return view('detail', [
            'materi' => $materi,
        ]);
    }
}
