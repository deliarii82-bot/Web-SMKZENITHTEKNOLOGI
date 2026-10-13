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
use App\Models\Prestasi;

class LandingController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        $kepalaSekolah = $profil;

        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalProgramKeahlian = Jurusan::count();

        $pengumumanTerbaru = Pengumuman::where('status', 'Publish')
            ->latest('tanggal')
            ->take(5)
            ->get();

        $beritaTerbaru = Berita::where('status', 'Publish')
            ->latest('tanggal')
            ->take(6)
            ->get();


        $galeri = Galeri::latest('tanggal')->take(3)->get();
        $ekstrakulikuler = Ekstrakulikuler::latest()->take(3)->get();
        $guru = Guru::orderBy('nama_guru', 'asc')->get();
        $jurusans = Jurusan::take(3)->get();
        $prestasi = Prestasi::latest('id')->take(3)->get();

        return view('landingpage.index', compact(
            'profil',
            'kepalaSekolah',
            'pengumumanTerbaru',
            'beritaTerbaru',
            'galeri',
            'ekstrakulikuler',
            'guru',
            'jurusans',
            'totalSiswa',
            'totalGuru',
            'totalProgramKeahlian',
            'prestasi'
        ));
    }

    // Program Keahlian (Pakai ID)
    public function programKeahlian()
    {
        $profil = ProfilSekolah::first();
        $jurusans = Jurusan::all();
        return view('landingpage.jurusan.index', compact('profil', 'jurusans'));
    }

    public function detailProgramKeahlian($id)
    {
        $profil = ProfilSekolah::first();
        $jurusan = Jurusan::findOrFail($id);
        return view('landingpage.jurusan.detail', compact('profil', 'jurusan'));
    }

    // Guru & Profil
    public function guru()
    {
        $profil = ProfilSekolah::first();
        $guru = Guru::all();
        return view('landingpage.guru.index', compact('profil', 'guru'));
    }

    public function profilSekolah()
    {
        $profil = ProfilSekolah::first();
        return view('landingpage.profil.index', compact('profil'));
    }

    // Berita (Pakai ID)
    public function berita()
    {
        $profil = ProfilSekolah::first();
        $berita = Berita::where('status', 'Publish')->latest('tanggal')->get();
        return view('landingpage.berita.index', compact('profil', 'berita'));
    }

    public function detailBerita($id)
    {
        $profil = ProfilSekolah::first();
        $berita = Berita::where('status', 'Publish')->findOrFail($id);
        return view('landingpage.berita.detail', compact('profil', 'berita'));
    }

    // Ekstrakulikuler (Pakai ID)

    public function ekstrakulikuler()
    {
        $profil = ProfilSekolah::first();


        $ekstrakulikuler = Ekstrakulikuler::all();

        return view('landingpage.ekstrakulikuler.index', compact('profil', 'ekstrakulikuler'));
    }


    public function detailEkstrakulikuler($id)
    {
        $profil = ProfilSekolah::first();
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        return view('landingpage.ekstrakulikuler.detail', compact('profil', 'ekstrakulikuler'));
    }

    // Prestasi (Pakai ID)
    public function prestasi()
    {
        $profil = ProfilSekolah::first();
        $prestasi = Prestasi::latest('id')->get();
        return view('landingpage.prestasi.index', compact('profil', 'prestasi'));
    }

    public function detailPrestasi($id)
    {
        $profil = ProfilSekolah::first();
        $prestasi = Prestasi::findOrFail($id);
        return view('landingpage.prestasi.detail', compact('profil', 'prestasi'));
    }

    public function siswa()
    {
        $profil = ProfilSekolah::first();

        $siswa = Siswa::with('jurusan')->orderBy('nama_siswa', 'asc')->get();

        return view('landingpage.siswa.index', compact('profil', 'siswa'));
    }


    public function galeri()
    {
        $profil = ProfilSekolah::first();
        // Tampilkan semua galeri dengan paginasi atau order terbaru
        $galeri = Galeri::latest('tanggal')->paginate(9);

        return view('landingpage.galeri.index', compact('profil', 'galeri'));
    }

    public function detailGaleri($id)
    {
        $profil = ProfilSekolah::first();
        $galeri = Galeri::findOrFail($id);

        return view('landingpage.galeri.detail', compact('profil', 'galeri'));
    }


}
