<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Galeri::all();
        $profil = \DB::table('profil')->first() ?? (object)[];
        
        // Load media untuk setiap gallery
        foreach ($galleries as $gallery) {
            $gallery->medias = Media::where('ref_table', 'galeri')
                                      ->where('ref_id', $gallery->id)
                                      ->orderBy('sort_order', 'asc')
                                      ->get();
        }
        
        return view('galeri', ['galleries' => $galleries, 'profil' => $profil]);
    }

    public function create()
    {
        $profil = \DB::table('profil')->first() ?? (object)[];
        return view('galeri-create', ['profil' => $profil]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('galeri', 'public');
            $validated['gambar'] = $path;
        }

        Galeri::create($validated);
        return redirect('/galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit(Galeri $galeri)
    {
        $profil = \DB::table('profil')->first() ?? (object)[];
        return view('galeri-edit', ['galeri' => $galeri, 'profil' => $profil]);
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar) {
                \Storage::disk('public')->delete($galeri->gambar);
            }
            $path = $request->file('gambar')->store('galeri', 'public');
            $validated['gambar'] = $path;
        }

        $galeri->update($validated);
        return redirect('/galeri')->with('success', 'Galeri berhasil diupdate');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar) {
            \Storage::disk('public')->delete($galeri->gambar);
        }
        $galeri->delete();
        return redirect('/galeri')->with('success', 'Galeri berhasil dihapus');
    }
}
