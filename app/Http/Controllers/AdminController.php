<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Agenda;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalGaleri = Galeri::count();
        $totalBerita = Berita::count();
        $totalAgenda = Agenda::count();
        $adminCount = User::where('role', 'admin')->count();
        $petugasCount = User::where('role', 'petugas')->count();
        $wargaCount = User::where('role', 'warga')->count();
        $profil = DB::table('profil')->first() ?? (object)[];
        
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalGaleri' => $totalGaleri,
            'totalBerita' => $totalBerita,
            'totalAgenda' => $totalAgenda,
            'adminCount' => $adminCount,
            'petugasCount' => $petugasCount,
            'wargaCount' => $wargaCount,
            'profil' => $profil,
            'currentUser' => Auth::user(),
        ]);
    }
}
