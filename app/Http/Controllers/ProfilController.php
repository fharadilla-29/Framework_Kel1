<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Media;

class ProfilController extends Controller
{
    public function visimisi()
    {
        $profil = DB::table('profil')->first();
        return view('visi-misi', ['profil' => $profil]);
    }

    public function updateVisi(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
        ], [
            'visi.required' => 'Visi harus diisi',
        ]);

        DB::table('profil')->update([
            'visi' => $request->visi,
        ]);

        return redirect('/visi-misi')->with('success', 'Visi desa berhasil diperbarui!');
    }

    public function updateMisi(Request $request)
    {
        $request->validate([
            'misi' => 'required|string',
        ], [
            'misi.required' => 'Misi harus diisi',
        ]);

        DB::table('profil')->update([
            'misi' => $request->misi,
        ]);

        return redirect('/visi-misi')->with('success', 'Misi desa berhasil diperbarui!');
    }

    public function updateSejarah(Request $request)
    {
        $request->validate([
            'sejarah' => 'required|string',
        ], [
            'sejarah.required' => 'Sejarah harus diisi',
        ]);

        DB::table('profil')->update([
            'sejarah' => $request->sejarah,
        ]);

        return redirect('/identitas-desa')->with('success', 'Sejarah desa berhasil diperbarui!');
    }

    public function updateLokasi(Request $request)
    {
        $request->validate([
            'nama_desa' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'provinsi' => 'required|string',
        ]);

        DB::table('profil')->update([
            'nama_desa' => $request->nama_desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
        ]);

        return redirect('/identitas-desa')->with('success', 'Lokasi desa berhasil diperbarui!');
    }

    public function updateKontak(Request $request)
    {
        $request->validate([
            'alamat_kantor' => 'required|string',
            'telepon' => 'required|string',
            'email' => 'required|email',
        ]);

        DB::table('profil')->update([
            'alamat_kantor' => $request->alamat_kantor,
            'telepon' => $request->telepon,
            'email' => $request->email,
        ]);

        return redirect('/identitas-desa')->with('success', 'Kontak desa berhasil diperbarui!');
    }

    public function updateKontakAlamat(Request $request)
    {
        $request->validate([
            'alamat_kantor' => 'required|string',
        ], [
            'alamat_kantor.required' => 'Alamat kantor harus diisi',
        ]);

        DB::table('profil')->update([
            'alamat_kantor' => $request->alamat_kantor,
        ]);

        return redirect('/kontak-kantor')->with('success', 'Alamat kantor berhasil diperbarui!');
    }

    public function updateKontakTelepon(Request $request)
    {
        $request->validate([
            'telepon' => 'required|string',
        ], [
            'telepon.required' => 'Nomor telepon harus diisi',
        ]);

        DB::table('profil')->update([
            'telepon' => $request->telepon,
        ]);

        return redirect('/kontak-kantor')->with('success', 'Nomor telepon berhasil diperbarui!');
    }

    public function updateKontakEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
        ]);

        DB::table('profil')->update([
            'email' => $request->email,
        ]);

        return redirect('/kontak-kantor')->with('success', 'Email berhasil diperbarui!');
    }

    public function identitas()
    {
        $profil = DB::table('profil')->first();
        return view('identitas-desa', ['profil' => $profil]);
    }

    public function kontak()
    {
        $profil = DB::table('profil')->first();
        return view('kontak-kantor', ['profil' => $profil]);
    }

    /**
     * Navbar logo/media management
     */
    public function navbarMedia()
    {
        $navbarMedias = Media::where('ref_table', 'navbar')
                            ->orderBy('sort_order', 'asc')
                            ->get();
        return view('admin.navbar-media', ['medias' => $navbarMedias]);
    }

    /**
     * Get navbar media for display
     */
    public function getNavbarMedia()
    {
        $navbarMedias = Media::where('ref_table', 'navbar')
                            ->orderBy('sort_order', 'asc')
                            ->get();
        return response()->json($navbarMedias);
    }
}
