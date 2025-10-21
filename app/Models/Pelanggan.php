<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    // Nama tabel yang dipakai oleh model ini
    protected $table = 'pelanggan';

    // Primary key dari tabel
    protected $primaryKey = 'pelanggan_id';

    // Kolom-kolom yang boleh diisi massal (mass assignable)
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
    ];
}
