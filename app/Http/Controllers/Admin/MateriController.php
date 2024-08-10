<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Kursus;
use App\Http\Requests\MateriRequest;

class MateriController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Materi::with(['kursus']);
            
            return DataTables::of($query)
                ->editColumn('link_embed_materi', function ($materi) {
                    $links = '';
                    // Decode JSON menjadi array
                    $decodedLinks = json_decode($materi->link_embed_materi, true);

                    // Pastikan bahwa hasil decode adalah array dan bukan null
                    if (!is_null($decodedLinks) && is_array($decodedLinks)) {
                        foreach ($decodedLinks as $link) {
                            $links .= '<a href="' . $link . '" target="_blank" class="text-blue-600 underline block">' . $link . '</a>';
                        }
                    }
                    return $links;
                })
                ->addColumn('action', function ($materi) {
                    return '
                        <a class="block w-full px-2 py-1 mb-1 text-xs text-center text-white transition duration-500 bg-gray-700 border border-gray-700 rounded-md select-none ease hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                            href="' . route('admin.materi.edit', $materi->id) . '">
                            Sunting
                        </a>
                        <form class="block w-full" onsubmit="return confirm(\'Apakah anda yakin?\');" action="' . route('admin.materi.destroy', $materi->id) . '" method="POST">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="w-full px-2 py-1 text-xs text-white transition duration-500 bg-red-500 border border-red-500 rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                Hapus
                            </button>
                        </form>';
                })
                ->rawColumns(['action', 'link_embed_materi'])
                ->make(true);
        }

        return view('admin.materi.index');
    }

    public function create()
    {
        $kursus = Kursus::all();
        return view('admin.materi.create', [
            'kursus' => $kursus,
        ]);
    }

    public function store(MateriRequest $request)
    {
        $data = $request->all();

        $data['kursus_id'] = $request->input('kursus_id');

        // Simpan link embed materi sebagai array JSON
        if ($request->has('link_embed_materi')) {
            $data['link_embed_materi'] = json_encode($request->input('link_embed_materi'));
        } else {
            $data['link_embed_materi'] = json_encode([]);
        }

        Materi::create($data);

        return redirect()->route('admin.materi.index')->with('success', 'Materi created successfully.');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        // Decode link_embed_materi untuk mengisi form edit
        $links = json_decode($materi->link_embed_materi, true) ?: [];
        $kursus = Kursus::all(); // Ambil data kursus
        return view('admin.materi.edit', compact('materi', 'links', 'kursus'));
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $materi->judul = $request->input('judul');
        $materi->deskripsi = $request->input('deskripsi');
        $materi->kursus_id = $request->input('kursus_id');
        
        // Mengubah array menjadi JSON jika data link_embed_materi berbentuk array
        $linkEmbedMateri = $request->input('link_embed_materi');
        $materi->link_embed_materi = is_array($linkEmbedMateri) ? json_encode($linkEmbedMateri) : $linkEmbedMateri;

        $materi->save();

        return redirect()->route('admin.materi.index')->with('success', 'Materi updated successfully.');
    }

    public function destroy(Materi $materi)
    {
        $materi->delete();

        return redirect()->route('admin.materi.index')->with('success', 'Materi deleted successfully.');
    }
}
