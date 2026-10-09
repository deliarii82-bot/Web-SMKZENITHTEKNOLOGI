<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Galeri;
use App\Models\Ekstrakulikuler;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Jurusan;

class LandingController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        // Kepala Sekolah dari tabel Guru
        $kepalaSekolah = Guru::where('jabatan', 'Kepala Sekolah')->first();

        // Data jumlah untuk statistik
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalProgramKeahlian = Jurusan::count();

        $pengumuman = Pengumuman::where('status', 'Publish')
            ->latest('tanggal')
            ->take(5)
            ->get();

        $berita = Berita::where('status', 'Publish')
            ->latest('tanggal')
            ->take(6)
            ->get();

        $galeri = Galeri::latest('tanggal')
            ->take(8)
            ->get();

        $ekskul = Ekstrakulikuler::all();
        $guru = Guru::all();

        // Hanya tampilkan 3 program di landing page
        $jurusans = Jurusan::take(3)->get();

        return view('landingpage.index', [
            'profil' => $profil,
            'kepalaSekolah' => $kepalaSekolah,

            'pengumuman' => $pengumuman,
            'berita' => $berita,
            'galeri' => $galeri,
            'ekskul' => $ekskul,
            'guru' => $guru,
            'jurusans' => $jurusans,

            'totalSiswa' => $totalSiswa,
            'totalGuru' => $totalGuru,
            'totalProgramKeahlian' => $totalProgramKeahlian,
        ]);
    }
}
