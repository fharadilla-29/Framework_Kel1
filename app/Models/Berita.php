<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['judul', 'kategori', 'konten', 'gambar', 'tanggal_terbit'];

    protected $casts = [
        'tanggal_terbit' => 'date',
    ];
}
