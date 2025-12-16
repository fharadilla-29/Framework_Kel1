<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    /**
     * Nama tabel yang digunakan model ini.
     *
     * @var string
     */
    protected $table = 'warga';

    /**
     * Primary key dari tabel.
     *
     * @var string
     */
    protected $primaryKey = 'warga_id';

    /**
     * Kolom yang dapat diisi secara mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
        'foto',
    ];

    /**
     * Casting kolom.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'jenis_kelamin' => 'string',
    ];

    /**
     * Accessor untuk mendapatkan jenis kelamin lengkap.
     */
    public function getJenisKelaminLengkapAttribute(): string
    {
        return $this->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';
    }
}
