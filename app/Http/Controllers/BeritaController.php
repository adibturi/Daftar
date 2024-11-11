<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = new Berita();
        $berita->judul = $request->input('judul');
        $berita->konten = $request->input('konten');

        // Jika ada file gambar yang diunggah, simpan gambar tersebut
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/gambar_berita', $filename);
            $berita->gambar = $filename;
        }

        $berita->save();

        return redirect()->back()->with('success', 'Berita berhasil dibuat!');
    }

    public function index()
    {
        // Ambil sejumlah berita awal untuk ditampilkan di halaman pertama
        $berita = Berita::orderBy('created_at', 'desc')->paginate(3); // Tampilkan 3 berita pertama
        return view('homepage', compact('berita'));
    }

    public function loadMore(Request $request)
    {
        $page = $request->input('page', 1);
        $limit = 3;
        $offset = ($page - 1) * $limit;

        $berita = Berita::orderBy('created_at', 'desc')->skip($offset)->take($limit + 1)->get();

        // Cek apakah masih ada data untuk dimuat
        $hasMoreData = $berita->count() > $limit;

        // Batasi berita yang dikembalikan ke jumlah yang diinginkan
        $berita = $berita->take($limit);

        return response()->json([
            'berita' => view('partials.berita-list', compact('berita'))->render(),
            'hasMoreData' => $hasMoreData
        ]);
    }
}
