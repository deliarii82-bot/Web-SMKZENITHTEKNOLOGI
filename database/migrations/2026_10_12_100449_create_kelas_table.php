<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit jika berbeda dari bentuk plural standar
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
    ];

    // Relasi ke Siswa (Satu kelas memiliki banyak siswa)
    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id');
    }
}
