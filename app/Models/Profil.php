<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Profil extends Model
{
    /**
     * Nama tabel yang digunakan model ini.
     *
     * @var string
     */
    protected $table = 'profil';

    /**
     * Primary key dari tabel.
     *
     * @var string
     */
    protected $primaryKey = 'profil_id';

    /**
     * Kolom yang dapat diisi secara mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'alamat_kantor',
        'email',
        'telepon',
        'visi',
        'misi',
        'logo',
    ];

    /**
     * Relasi ke tabel media untuk logo.
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'profil_id')
            ->where('ref_table', 'profil');
    }

    /**
     * Mendapatkan logo profil.
     */
    public function logo()
    {
        return $this->hasOne(Media::class, 'ref_id', 'profil_id')
            ->where('ref_table', 'profil')
            ->where('jenis', 'logo');
    }
}

