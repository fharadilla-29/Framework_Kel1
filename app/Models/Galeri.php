<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Galeri extends Model
{
    /**
     * Nama tabel yang digunakan model ini.
     *
     * @var string
     */
    protected $table = 'galeri';

    /**
     * Primary key dari tabel.
     *
     * @var string
     */
    protected $primaryKey = 'galeri_id';

    /**
     * Kolom yang dapat diisi secara mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'deskripsi',
    ];

    /**
     * Relasi ke tabel media untuk foto-foto galeri.
     */
    public function fotos(): HasMany
    {
        return $this->hasMany(Media::class, 'ref_id', 'galeri_id')
            ->where('ref_table', 'galeri');
    }

    /**
     * Boot method untuk menghapus foto saat galeri dihapus.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($galeri) {
            // Hapus semua file fisik dan record media terkait
            foreach ($galeri->fotos as $foto) {
                if ($foto->path && Storage::disk('public')->exists($foto->path)) {
                    Storage::disk('public')->delete($foto->path);
                }
                $foto->delete();
            }
        });
    }
}
