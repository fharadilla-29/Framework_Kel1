<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Media;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource by category.
     */
    public function index($kategori)
    {
        $beritas = Berita::where('kategori', $kategori)->orderBy('tanggal_terbit', 'desc')->get();
        $profil = \DB::table('profil')->first() ?? (object)[];
        
        // Load media untuk setiap berita
        foreach ($beritas as $berita) {
            $berita->medias = Media::where('ref_table', 'berita')
                                     ->where('ref_id', $berita->id)
                                     ->orderBy('sort_order', 'asc')
                                     ->get();
        }
        
        return view('berita.' . $kategori, ['beritas' => $beritas, 'profil' => $profil]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($kategori)
    {
        return view('berita.create', ['kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_terbit' => 'required|date',
        ], [
            'judul.required' => 'Judul berita harus diisi',
            'konten.required' => 'Konten berita harus diisi',
            'gambar.image' => 'File harus berupa gambar',
            'tanggal_terbit.required' => 'Tanggal terbit harus diisi',
        ]);

        $data = $request->only(['judul', 'kategori', 'konten', 'tanggal_terbit']);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('berita', $filename, 'public');
            $data['gambar'] = $path;
        }

        Berita::create($data);

        return redirect('/berita/' . $request->kategori)->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('berita.edit', ['berita' => $berita]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_terbit' => 'required|date',
        ], [
            'judul.required' => 'Judul berita harus diisi',
            'konten.required' => 'Konten berita harus diisi',
            'gambar.image' => 'File harus berupa gambar',
        ]);

        $data = $request->only(['judul', 'konten', 'tanggal_terbit']);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($berita->gambar && \Storage::disk('public')->exists($berita->gambar)) {
                \Storage::disk('public')->delete($berita->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('berita', $filename, 'public');
            $data['gambar'] = $path;
        }

        $berita->update($data);

        return redirect('/berita/' . $berita->kategori)->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        // Delete image if exists
        if ($berita->gambar && \Storage::disk('public')->exists($berita->gambar)) {
            \Storage::disk('public')->delete($berita->gambar);
        }

        $kategori = $berita->kategori;
        $berita->delete();

        return redirect('/berita/' . $kategori)->with('success', 'Berita berhasil dihapus!');
    }
}

