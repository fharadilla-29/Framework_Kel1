<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Galeri::with('medias')->get();
        $profil = \DB::table('profil')->first() ?? (object)[];
        
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
            'deskripsi' => 'nullable|string',
        ]);

        Galeri::create($validated);
        return redirect('/galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit($galeri_id)
    {
        $galeri = Galeri::findOrFail($galeri_id);
        $profil = \DB::table('profil')->first() ?? (object)[];
        return view('galeri-edit', ['galeri' => $galeri, 'profil' => $profil]);
    }

    public function update(Request $request, $galeri_id)
    {
        $galeri = Galeri::findOrFail($galeri_id);
        
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $galeri->update($validated);
        return redirect('/galeri')->with('success', 'Galeri berhasil diupdate');
    }

    public function destroy($galeri_id)
    {
        $galeri = Galeri::findOrFail($galeri_id);
        
        // Delete related media
        Media::where('ref_table', 'galeri')->where('ref_id', $galeri_id)->delete();
        
        $galeri->delete();
        return redirect('/galeri')->with('success', 'Galeri berhasil dihapus');
    }
}
