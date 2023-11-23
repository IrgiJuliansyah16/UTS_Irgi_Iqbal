<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = [
        'name',          // Nama tag baju yang bagus
        'description',   // Deskripsi tag baju yang bagus
        'status',        // Status tag baju yang bagus (aktif, tidak aktif, dll.)
        'color',         // Warna yang terkait dengan tag baju yang bagus
        'style',         // Gaya atau motif tag baju yang bagus
        'occasion',      // Kesempatan atau acara yang sesuai dengan tag baju yang bagus
        'material',      // Bahan pembuatan tag baju yang bagus
        'created_at',    // Kolom waktu pembuatan
        'updated_at',    // Kolom waktu pembaruan
        'deleted_at',    // Kolom waktu penghapusan (jika menggunakan soft delete)
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public $timestamps = true;

    // Jika Anda memiliki relasi dengan tabel lain, Anda bisa mendefinisikannya di sini.
}
