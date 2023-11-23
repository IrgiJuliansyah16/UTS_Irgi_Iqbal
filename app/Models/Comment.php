<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'content',
        'post_id',
    ];

    public $timestamps = true;
    // Jika Anda memiliki relasi dengan tabel lain, Anda bisa mendefinisikannya di sini.
}
