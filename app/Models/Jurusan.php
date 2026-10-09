<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    protected $primaryKey = 'id_jurusan';

    public $timestamps = false;

    protected $fillable = [
        'nama_jurusan',
        'singkatan',
        'deskripsi',
        'foto',
    ];
}
