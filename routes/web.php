<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProductController;

// Note: Profil data should be fetched inside route closures/controllers, not at boot time
// $profil = DB::table('profil')->first() ?? (object)[];

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/visi-misi', [ProfilController::class, 'visimisi'])->name('visi-misi');

Route::middleware(['auth'])->group(function () {
    Route::post('/visi-misi/update-visi', [ProfilController::class, 'updateVisi'])->name('profil.update-visi');
    Route::post('/visi-misi/update-misi', [ProfilController::class, 'updateMisi'])->name('profil.update-misi');
    Route::post('/identitas-desa/update-sejarah', [ProfilController::class, 'updateSejarah'])->name('profil.update-sejarah');
    Route::post('/identitas-desa/update-lokasi', [ProfilController::class, 'updateLokasi'])->name('profil.update-lokasi');
    Route::post('/identitas-desa/update-kontak', [ProfilController::class, 'updateKontak'])->name('profil.update-kontak');
    Route::post('/kontak-kantor/update-alamat', [ProfilController::class, 'updateKontakAlamat'])->name('profil.update-kontak-alamat');
    Route::post('/kontak-kantor/update-telepon', [ProfilController::class, 'updateKontakTelepon'])->name('profil.update-kontak-telepon');
    Route::post('/kontak-kantor/update-email', [ProfilController::class, 'updateKontakEmail'])->name('profil.update-kontak-email');
});

Route::get('/identitas-desa', [ProfilController::class, 'identitas'])->name('identitas-desa');

Route::get('/kontak-kantor', [ProfilController::class, 'kontak'])->name('kontak-kantor');

// Berita routes
Route::get('/berita/{kategori}', [BeritaController::class, 'index'])->name('berita.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/berita/{kategori}/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/edit/{berita}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');
});

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
    Route::get('/agenda/{agenda}/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
    Route::put('/agenda/{agenda}', [AgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/agenda/{agenda}', [AgendaController::class, 'destroy'])->name('agenda.destroy');
});

// Warga routes
Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/warga/{warga}/edit', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/warga/{warga}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/warga/{warga}', [WargaController::class, 'destroy'])->name('warga.destroy');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profil-edit', function () {
        $profil = \DB::table('profil')->first() ?? (object)[];
        return view('admin.profil-edit', ['profil' => $profil]);
    })->name('profil-edit');
    
    // Media management routes
    Route::get('/admin/media', [MediaController::class, 'index'])->name('media.index');
    Route::get('/admin/media/create', [MediaController::class, 'create'])->name('media.create');
    Route::post('/admin/media', [MediaController::class, 'store'])->name('media.store');
    Route::get('/admin/media/{media}/edit', [MediaController::class, 'edit'])->name('media.edit');
    Route::put('/admin/media/{media}', [MediaController::class, 'update'])->name('media.update');
    Route::delete('/admin/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
    Route::get('/api/media/{refTable}/{refId}', [MediaController::class, 'getByReference'])->name('media.getByReference');
    
    // Navbar media management routes
    Route::get('/admin/navbar-media', [ProfilController::class, 'navbarMedia'])->name('navbar-media.index');
    Route::get('/api/navbar-media', [ProfilController::class, 'getNavbarMedia'])->name('navbar-media.get');
    
    // Product management routes (admin only)
    Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
Route::middleware(['role:admin,petugas'])->group(function () {
    Route::get('/galeri/create', [GalleryController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [GalleryController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{galeri}/edit', [GalleryController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{galeri}', [GalleryController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{galeri}', [GalleryController::class, 'destroy'])->name('galeri.destroy');
});