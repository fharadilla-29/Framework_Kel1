<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    protected $table = 'kategori_berita';
    protected $primaryKey = 'kategori_id';
    
    protected $fillable = ['nama', 'slug', 'deskripsi'];
    
    public function beritas()
    {
        return $this->hasMany(Berita::class, 'kategori_id', 'kategori_id');
    }
}
