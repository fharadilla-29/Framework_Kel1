<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    /**
     * Nama tabel yang digunakan model ini.
     *
     * @var string
     */
    protected $table = 'berita';

    /**
     * Primary key dari tabel.
     *
     * @var string
     */
    protected $primaryKey = 'berita_id';

    /**
     * Kolom yang dapat diisi secara mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'isi_html',
        'penulis',
        'status',
        'terbit_at',
        'cover',
    ];

    /**
     * Casting kolom.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'terbit_at' => 'datetime',
    ];

    /**
     * Boot method untuk auto-generate slug.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    /**
     * Relasi ke kategori berita.
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'kategori_id');
    }
}

