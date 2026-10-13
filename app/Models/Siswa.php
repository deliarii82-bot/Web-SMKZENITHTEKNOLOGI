<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'kelas',
        'jenis_kelamin',
        'tahun_masuk',
        'id_jurusan',
    ];

    public function kelasRelasi()
    {
        return $this->belongsTo(Kelas::class, 'kelas', 'id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
}
