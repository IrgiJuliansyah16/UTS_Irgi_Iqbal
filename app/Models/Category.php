<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories'; // Ganti 'categories' dengan nama tabel yang sesuai

    protected $fillable = [
        'name',         // Nama kategori baju
        'description',  // Deskripsi kategori baju
        'status',       // Status kategori baju (aktif, tidak aktif, dll.)
        'color',        // Warna yang terkait dengan kategori baju
        'size',         // Ukuran yang terkait dengan kategori baju
        'season',       // Musim yang sesuai dengan kategori baju (musim panas, musim dingin, dll.)
        'material',     // Bahan pembuatan kategori baju
        'created_at',   // Kolom waktu pembuatan
        'updated_at',   // Kolom waktu pembaruan
        'deleted_at',   // Kolom waktu penghapusan (jika menggunakan soft delete)
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public $timestamps = true;

    // Jika Anda memiliki relasi dengan tabel lain, Anda bisa mendefinisikannya di sini.
}
