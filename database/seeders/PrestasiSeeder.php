<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prestasi')->insert([
            [
                'nama_prestasi' => 'Olimpiade Siswa Indonesia',
                'nama_siswa'    => 'Irham Fauzan',
                'tingkat'       => 'Sekolah',
                'peringkat'     => 'Juara 1',
                'keterangan'    => 'Prestasi membanggakan dalam ajang kompetisi sains dan teknologi tingkat sekolah.',
                'foto'          => null,
                'tahun_ajaran'  => '2026',
            ],
            [
                'nama_prestasi' => 'Lomba Kompetensi Siswa (LKS) Web Technologies',
                'nama_siswa'    => 'Ahmad Rifai',
                'tingkat'       => 'Kabupaten/Kota',
                'peringkat'     => 'Juara 1',
                'keterangan'    => 'Meraih juara pertama dalam pembuatan aplikasi web interaktif berbasis Laravel.',
                'foto'          => null,
                'tahun_ajaran'  => '2026',
            ],
            [
                'nama_prestasi' => 'Turnamen Futsal Pelajar',
                'nama_siswa'    => 'Tim Futsal SMK Zenith',
                'tingkat'       => 'Kecamatan',
                'peringkat'     => 'Juara 2',
                'keterangan'    => 'Menampilkan kerja sama tim yang solid dalam turnamen futsal antar SMK.',
                'foto'          => null,
                'tahun_ajaran'  => '2026',
            ],
            [
                'nama_prestasi' => 'Olimpiade Matematika Terbuka',
                'nama_siswa'    => 'Siti Nurhaliza',
                'tingkat'       => 'Provinsi',
                'peringkat'     => 'Juara 3',
                'keterangan'    => 'Berhasil menembus babak final dan meraih posisi tiga besar tingkat provinsi.',
                'foto'          => null,
                'tahun_ajaran'  => '2025',
            ],
            [
                'nama_prestasi' => 'Lomba Desain Grafis & UI/UX',
                'nama_siswa'    => 'Rian Hidayat',
                'tingkat'       => 'Kabupaten/Kota',
                'peringkat'     => 'Juara Harapan 1',
                'keterangan'    => 'Mengembangkan prototipe desain aplikasi sistem informasi sekolah modern.',
                'foto'          => null,
                'tahun_ajaran'  => '2026',
            ],
            [
                'nama_prestasi' => 'Kompetisi Cyber Security Youth',
                'nama_siswa'    => 'Fajar Pratama',
                'tingkat'       => 'Nasional',
                'peringkat'     => 'Juara 2',
                'keterangan'    => 'Menunjukkan keahlian dalam analisis keamanan jaringan dan web penetration testing.',
                'foto'          => null,
                'tahun_ajaran'  => '2026',
            ],
            [
                'nama_prestasi' => 'Lomba PMR & Pertolongan Pertama',
                'nama_siswa'    => 'Tim PMR Wira',
                'tingkat'       => 'Kabupaten/Kota',
                'peringkat'     => 'Juara 1',
                'keterangan'    => 'Mendapatkan penghargaan tim terbaik dalam penanganan ketangkasan pertolongan pertama.',
                'foto'          => null,
                'tahun_ajaran'  => '2025',
            ],
            [
                'nama_prestasi' => 'Festival Musik & Seni Pelajar',
                'nama_siswa'    => 'Dewi Anggraeni',
                'tingkat'       => 'Sekolah',
                'peringkat'     => 'Juara 1',
                'keterangan'    => 'Menjuarai kategori solo vokal pada ajang kreasi seni tahunan sekolah.',
                'foto'          => null,
                'tahun_ajaran'  => '2026',
            ],
            [
                'nama_prestasi' => 'Kejuaraan Pencak Silat Remaja',
                'nama_siswa'    => 'M. Arya Yudha',
                'tingkat'       => 'Provinsi',
                'peringkat'     => 'Juara 1',
                'keterangan'    => 'Meraih medali emas dalam ajang olahraga bela diri tingkat regional.',
                'foto'          => null,
                'tahun_ajaran'  => '2026',
            ],
            [
                'nama_prestasi' => 'Pramuka Penegak Bantara Terbaik',
                'nama_siswa'    => 'Budi Santoso',
                'tingkat'       => 'Kecamatan',
                'peringkat'     => 'Juara 1',
                'keterangan'    => 'Terpilih sebagai peserta terbaik dalam perkemahan bakti kepramukaan.',
                'foto'          => null,
                'tahun_ajaran'  => '2025',
            ],
        ]);
    }
}
