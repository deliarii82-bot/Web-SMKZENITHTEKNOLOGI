<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $primaryKey = 'id_berita';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'isi',
        'slug',
        'tanggal',
        'gambar',
        'status',
        'id_user',
    ];
}
