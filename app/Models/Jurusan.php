<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_jurusan',
        'nama_jurusan',
        'singkatan',
        'deskripsi',
        'foto',
    ];
}
