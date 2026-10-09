<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PrestasiController;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\ProfilSekolah;
use App\Models\Siswa;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Galeri;


/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    // Profil sekolah
    $profil = ProfilSekolah::first();

    // Statistik
    $totalSiswa = Siswa::count();
    $totalGuru = Guru::count();
    $totalProgramKeahlian = Jurusan::count();

    // 3 program keahlian
    $jurusans = Jurusan::take(3)->get();

    // Kepala sekolah dari Profil Sekolah
    $kepalaSekolah = $profil;

    // Berita terbaru
    $beritaTerbaru = Berita::where('status', 'Publish')
        ->orderBy('tanggal', 'desc')
        ->take(3)
        ->get();

    // Semua ekstrakurikuler
    $ekstrakulikuler = Ekstrakulikuler::all();

    // Semua guru
    $guru = Guru::all();

    // Prestasi terbaru
    $prestasi = Prestasi::orderBy('id', 'desc')
        ->take(6)
        ->get();

    // Galeri terbaru
    $galeri = Galeri::orderBy('tanggal', 'desc')
        ->take(6)
        ->get();

    return view('landingpage.index', compact(
        'profil',
        'kepalaSekolah',
        'jurusans',
        'totalSiswa',
        'totalGuru',
        'totalProgramKeahlian',
        'beritaTerbaru',
        'ekstrakulikuler',
        'guru',
        'prestasi',
        'galeri'
    ));

})->name('home');


/*
|--------------------------------------------------------------------------
| PROGRAM KEAHLIAN - PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/program-keahlian', function () {

    $profil = ProfilSekolah::first();

    $jurusans = Jurusan::all();

    return view(
        'landingpage.jurusan.index',
        compact(
            'profil',
            'jurusans'
        )
    );

})->name('program-keahlian');


/*
|--------------------------------------------------------------------------
| GURU - PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/data-guru', function () {

    $profil = ProfilSekolah::first();

    $guru = Guru::all();

    return view(
        'landingpage.guru.index',
        compact(
            'profil',
            'guru'
        )
    );

})->name('guru.public');


/*
|--------------------------------------------------------------------------
| PROFIL SEKOLAH - PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/profil-sekolah-kami', function () {

    $profil = ProfilSekolah::first();

    return view(
        'landingpage.profil.index',
        compact('profil')
    );

})->name('profil.sekolah.public');


/*
|--------------------------------------------------------------------------
| BERITA - PUBLIC
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Semua berita
|--------------------------------------------------------------------------
*/

Route::get('/berita-sekolah', function () {

    $profil = ProfilSekolah::first();

    $berita = Berita::where('status', 'Publish')
        ->orderBy('tanggal', 'desc')
        ->get();

    return view(
        'landingpage.berita.index',
        compact(
            'profil',
            'berita'
        )
    );

})->name('berita.public');


/*
|--------------------------------------------------------------------------
| Detail berita
|--------------------------------------------------------------------------
*/

Route::get('/berita-sekolah/{id}', function ($id) {

    $profil = ProfilSekolah::first();

    $berita = Berita::where('status', 'Publish')
        ->findOrFail($id);

    return view(
        'landingpage.berita.detail',
        compact(
            'profil',
            'berita'
        )
    );

})->name('berita.detail');


/*
|--------------------------------------------------------------------------
| EKSTRAKURIKULER - PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/ekstrakurikuler', function () {

    $profil = ProfilSekolah::first();

    $ekstrakulikuler = Ekstrakulikuler::all();

    return view(
        'landingpage.ekstrakulikuler.index',
        compact(
            'profil',
            'ekstrakulikuler'
        )
    );

})->name('ekstrakulikuler.public');


/*
|--------------------------------------------------------------------------
| Detail ekstrakurikuler
|--------------------------------------------------------------------------
*/

Route::get('/ekstrakurikuler/{id}', function ($id) {

    $profil = ProfilSekolah::first();

    $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

    return view(
        'landingpage.ekstrakulikuler.detail',
        compact(
            'profil',
            'ekstrakulikuler'
        )
    );

})->name('ekstrakulikuler.detail');


/*
|--------------------------------------------------------------------------
| PRESTASI - PUBLIC
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Semua prestasi
|--------------------------------------------------------------------------
*/

Route::get('/prestasi-sekolah', function () {

    $profil = ProfilSekolah::first();

    $prestasi = Prestasi::orderBy('id', 'desc')->get();

    return view(
        'landingpage.prestasi.index',
        compact(
            'profil',
            'prestasi'
        )
    );

})->name('prestasi.public');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [
    LoginController::class,
    'showLogin'
])->name('login');


Route::post('/login', [
    LoginController::class,
    'login'
])->name('login.proses');


Route::post('/logout', [
    LoginController::class,
    'logout'
])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        $jumlahGuru = Guru::count();

        $jumlahSiswa = Siswa::count();

        $jumlahBerita = Berita::count();

        $jumlahEkstrakulikuler = Ekstrakulikuler::count();

        $jumlahPengumuman = Pengumuman::count();

        $profil = ProfilSekolah::first();

        // Pengumuman terbaru
        $pengumumanTerbaru = Pengumuman::orderBy(
            'tanggal',
            'desc'
        )->first();

        return view('dashboard', compact(
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahBerita',
            'jumlahEkstrakulikuler',
            'jumlahPengumuman',
            'pengumumanTerbaru',
            'profil'
        ));

    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | GURU - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'guru',
        GuruController::class
    );


    /*
    |--------------------------------------------------------------------------
    | SISWA - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'siswa',
        SiswaController::class
    );


    /*
    |--------------------------------------------------------------------------
    | JURUSAN - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'jurusan',
        JurusanController::class
    );


    /*
    |--------------------------------------------------------------------------
    | USER - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'user',
        UserController::class
    );


    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'pengumuman',
        PengumumanController::class
    );


    /*
    |--------------------------------------------------------------------------
    | PROFIL SEKOLAH - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'profil-sekolah',
        ProfilSekolahController::class
    );


    /*
    |--------------------------------------------------------------------------
    | BERITA - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'berita',
        BeritaController::class
    );


    /*
    |--------------------------------------------------------------------------
    | EKSTRAKURIKULER - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'ekstrakulikuler',
        EkstrakulikulerController::class
    );


    /*
    |--------------------------------------------------------------------------
    | GALERI - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'galeri',
        GaleriController::class
    );


    /*
    |--------------------------------------------------------------------------
    | PRESTASI - ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'prestasi',
        PrestasiController::class
    );


    /*
    |--------------------------------------------------------------------------
    | PROFIL ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/profil', function () {

        return view('admin.profil');

    })->name('profil');

});
