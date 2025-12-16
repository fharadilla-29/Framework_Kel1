<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wargas = Warga::paginate(12);
        return view('warga.index', compact('wargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_ktp' => 'required|unique:wargas,no_ktp|digits:16',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:100',
            'telp' => 'required|string|max:20',
            'email' => 'required|email|unique:wargas,email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'no_ktp.required' => 'Nomor KTP harus diisi',
            'no_ktp.unique' => 'Nomor KTP sudah terdaftar',
            'no_ktp.digits' => 'Nomor KTP harus 16 digit',
            'nama.required' => 'Nama harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
            'agama.required' => 'Agama harus diisi',
            'pekerjaan.required' => 'Pekerjaan harus diisi',
            'telp.required' => 'Nomor telepon harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus JPEG, PNG, JPG, atau GIF',
            'foto.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('warga', $fotoName, 'public');
            $validated['foto'] = '/storage/' . $path;
        }

        Warga::create($validated);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            'no_ktp' => 'required|digits:16|unique:wargas,no_ktp,' . $warga->warga_id . ',warga_id',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:100',
            'telp' => 'required|string|max:20',
            'email' => 'required|email|unique:wargas,email,' . $warga->warga_id . ',warga_id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'no_ktp.required' => 'Nomor KTP harus diisi',
            'no_ktp.unique' => 'Nomor KTP sudah terdaftar',
            'no_ktp.digits' => 'Nomor KTP harus 16 digit',
            'nama.required' => 'Nama harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
            'agama.required' => 'Agama harus diisi',
            'pekerjaan.required' => 'Pekerjaan harus diisi',
            'telp.required' => 'Nomor telepon harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus JPEG, PNG, JPG, atau GIF',
            'foto.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Delete old foto if exists
            if ($warga->foto) {
                $oldPath = str_replace('/storage/', '', $warga->foto);
                \Storage::disk('public')->delete($oldPath);
            }
            
            $foto = $request->file('foto');
            $fotoName = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('warga', $fotoName, 'public');
            $validated['foto'] = '/storage/' . $path;
        }

        $warga->update($validated);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $warga)
    {
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus');
    }
}
