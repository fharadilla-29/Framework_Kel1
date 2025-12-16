<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * Nama tabel yang digunakan model ini.
     *
     * @var string
     */
    protected $table = 'media';

    /**
     * Primary key dari tabel.
     *
     * @var string
     */
    protected $primaryKey = 'media_id';

    /**
     * Kolom yang dapat diisi secara mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ref_table',
        'ref_id',
        'jenis',
        'nama_file',
        'path',
        'mime_type',
        'ukuran',
    ];

    /**
     * Mendapatkan record yang terkait berdasarkan ref_table.
     */
    public function getRelatedModel()
    {
        return match ($this->ref_table) {
            'profil' => Profil::find($this->ref_id),
            'galeri' => Galeri::find($this->ref_id),
            default => null,
        };
    }
}

