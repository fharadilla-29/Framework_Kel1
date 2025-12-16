<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'lokasi', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'penyelenggara'];

    protected $casts = [
        'tanggal' => 'date',
        'waktu_mulai' => 'datetime:H:i',
        'waktu_selesai' => 'datetime:H:i',
    ];
}
