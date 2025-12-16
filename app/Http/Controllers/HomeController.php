<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profil = DB::table('profil')->first();
        return view('home', ['profil' => $profil]);
    }
}
