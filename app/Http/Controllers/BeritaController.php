<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource by category slug.
     */
    public function index($kategori)
    {
        // Find kategori by slug
        $kategoriBerita = KategoriBerita::where('slug', $kategori)->first();
        
        if ($kategoriBerita) {
            $beritas = Berita::with('medias')
                            ->where('kategori_id', $kategoriBerita->kategori_id)
                            ->where('status', 'terbit')
                            ->orderBy('terbit_at', 'desc')
                            ->get();
        } else {
            $beritas = collect();
        }
        
        $profil = \DB::table('profil')->first() ?? (object)[];
        
        // Use dynamic view instead of hardcoded category views
        return view('berita.index', [
            'beritas' => $beritas, 
            'profil' => $profil,
            'kategori' => $kategori,
            'kategoriBerita' => $kategoriBerita
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($kategori)
    {
        $kategoriBerita = KategoriBerita::where('slug', $kategori)->first();
        return view('berita.create', ['kategori' => $kategori, 'kategoriBerita' => $kategoriBerita]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_slug' => 'required|string',
            'isi_html' => 'required|string',
            'penulis' => 'required|string|max:100',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'terbit_at' => 'nullable|date',
        ], [
            'judul.required' => 'Judul berita harus diisi',
            'isi_html.required' => 'Konten berita harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'cover.image' => 'File harus berupa gambar',
        ]);

        $kategoriBerita = KategoriBerita::where('slug', $request->kategori_slug)->first();
        
        if (!$kategoriBerita) {
            return back()->with('error', 'Kategori tidak ditemukan');
        }

        $data = [
            'kategori_id' => $kategoriBerita->kategori_id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi_html' => $request->isi_html,
            'penulis' => $request->penulis,
            'status' => 'terbit',
            'terbit_at' => $request->terbit_at ?? now(),
        ];

        // Handle image upload
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('berita', $filename, 'public');
            $data['cover'] = $path;
        }

        Berita::create($data);

        return redirect('/berita/' . $request->kategori_slug)->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($berita_id)
    {
        $berita = Berita::with('kategori')->findOrFail($berita_id);
        return view('berita.edit', ['berita' => $berita]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $berita_id)
    {
        $berita = Berita::with('kategori')->findOrFail($berita_id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_html' => 'required|string',
            'penulis' => 'required|string|max:100',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'terbit_at' => 'nullable|date',
        ], [
            'judul.required' => 'Judul berita harus diisi',
            'isi_html.required' => 'Konten berita harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'cover.image' => 'File harus berupa gambar',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi_html' => $request->isi_html,
            'penulis' => $request->penulis,
            'terbit_at' => $request->terbit_at ?? $berita->terbit_at,
        ];

        // Handle image upload
        if ($request->hasFile('cover')) {
            // Delete old image if exists
            if ($berita->cover && \Storage::disk('public')->exists($berita->cover)) {
                \Storage::disk('public')->delete($berita->cover);
            }

            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('berita', $filename, 'public');
            $data['cover'] = $path;
        }

        $berita->update($data);

        $kategoriSlug = $berita->kategori ? $berita->kategori->slug : 'ekonomi';
        return redirect('/berita/' . $kategoriSlug)->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($berita_id)
    {
        $berita = Berita::with('kategori')->findOrFail($berita_id);
        
        // Delete image if exists
        if ($berita->cover && \Storage::disk('public')->exists($berita->cover)) {
            \Storage::disk('public')->delete($berita->cover);
        }

        $kategoriSlug = $berita->kategori ? $berita->kategori->slug : 'ekonomi';
        $berita->delete();

        return redirect('/berita/' . $kategoriSlug)->with('success', 'Berita berhasil dihapus!');
    }
}

