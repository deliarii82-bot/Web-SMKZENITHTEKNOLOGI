<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('siswas')->insert([
            [
                'nisn' => '0085484637',
                'nama_siswa' => 'Adelia',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 4, // DPIB[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484638',
                'nama_siswa' => 'Aditya Pratama',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2024',
                'id_jurusan' => 5, // DKV[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484639',
                'nama_siswa' => 'Siti Nur Aisyah',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 6, // TSM[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484640',
                'nama_siswa' => 'Rizki Ramadhan',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 7, // TEI[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484641',
                'nama_siswa' => 'Dewi Lestari',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 8, // TJKT[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484642',
                'nama_siswa' => 'Muhammad Fajar',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 9, // Bisnis Digital[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484643',
                'nama_siswa' => 'Anisa Rahmawati',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 10, // TKR[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484644',
                'nama_siswa' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 11, // PPLG[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484645',
                'nama_siswa' => 'Siti Aminah',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 4, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484646',
                'nama_siswa' => 'Dimas Anggara',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 5, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484647',
                'nama_siswa' => 'Rina Melati',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 6, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484648',
                'nama_siswa' => 'Budi Santoso',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 7, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484649',
                'nama_siswa' => 'Nengsih Wulandari',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 8, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484650',
                'nama_siswa' => 'Reza Pahlevi',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 9, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484651',
                'nama_siswa' => 'Fitri Handayani',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 10, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484652',
                'nama_siswa' => 'Yoga Pratama',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 11, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484653',
                'nama_siswa' => 'Maya Sari',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 4, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484654',
                'nama_siswa' => 'Galih Permana',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 5, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484655',
                'nama_siswa' => 'Indah Permatasari',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 6, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484656',
                'nama_siswa' => 'Fikri Haikal',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 7, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484657',
                'nama_siswa' => 'Tika Lestari',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 8, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484658',
                'nama_siswa' => 'Bayu Segara',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 9, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484659',
                'nama_siswa' => 'Lesti Kejora',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 10, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484660',
                'nama_siswa' => 'Rian Hidayat',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 11, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484661',
                'nama_siswa' => 'Siti Badriah',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 4, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484662',
                'nama_siswa' => 'Diki Candra',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 5, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484663',
                'nama_siswa' => 'Wulan Guritno',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 6, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484664',
                'nama_siswa' => 'Zaky Ahmad',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 7, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484665',
                'nama_siswa' => 'Nabila Syakieb',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 8, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484666',
                'nama_siswa' => 'Iqbaal Ramadhan',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 9, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484667',
                'nama_siswa' => 'Vanesha Prescilla',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 10, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484668',
                'nama_siswa' => 'Al Ghazali',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 11, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484669',
                'nama_siswa' => 'Safira Crespin',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 4, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484670',
                'nama_siswa' => 'Jefri Nichol',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 5, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484671',
                'nama_siswa' => 'Amanda Manopo',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 6, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484672',
                'nama_siswa' => 'Angga Aldi',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 7, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484673',
                'nama_siswa' => 'Natasha Wilona',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 8, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484674',
                'nama_siswa' => 'Verrell Bramasta',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 9, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484675',
                'nama_siswa' => 'Ranty Maria',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 10, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484676',
                'nama_siswa' => 'Rizky Nazar',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 11, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484677',
                'nama_siswa' => 'Syifa Hadju',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 4, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484678',
                'nama_siswa' => 'Arbani Yasiz',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 5, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484679',
                'nama_siswa' => 'Yoriko Angeline',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 6, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484680',
                'nama_siswa' => 'Bryan Domani',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 7, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484681',
                'nama_siswa' => 'Mawar de Jongh',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 8, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484682',
                'nama_siswa' => 'Basmalah Gralind',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 9, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484683',
                'nama_siswa' => 'Raden Rakha',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 10, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484684',
                'nama_siswa' => 'Sridevi DA',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 11, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484685',
                'nama_siswa' => 'Eby DA',
                'jenis_kelamin' => 'laki-laki',
                'tahun_masuk' => '2025',
                'id_jurusan' => 4, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0085484686',
                'nama_siswa' => 'Kinan Aulia',
                'jenis_kelamin' => 'perempuan',
                'tahun_masuk' => '2024',
                'id_jurusan' => 5, //[cite: 4]
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
