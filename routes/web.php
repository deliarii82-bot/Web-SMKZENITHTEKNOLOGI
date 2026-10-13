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
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PrestasiController;

use App\Http\Controllers\LandingController;





/*

|--------------------------------------------------------------------------

| LANDING PAGE (PUBLIC)

|--------------------------------------------------------------------------

*/

Route::get('/', [LandingController::class, 'index'])->name('home');



Route::get('/program-keahlian', [LandingController::class, 'programKeahlian'])->name('program-keahlian');

Route::get('/program-keahlian/{id}', [LandingController::class, 'detailProgramKeahlian'])->name('program-keahlian.detail');



Route::get('/data-guru', [LandingController::class, 'guru'])->name('guru.public');

Route::get('/profil-sekolah-kami', [LandingController::class, 'profilSekolah'])->name('profil.sekolah.public');



Route::get('/berita-sekolah', [LandingController::class, 'berita'])->name('berita.public');

Route::get('/berita-sekolah/{id}', [LandingController::class, 'detailBerita'])->name('berita.detail');



Route::get('/ekstrakurikuler', [LandingController::class, 'ekstrakulikuler'])->name('ekstrakulikuler.public');

Route::get('/ekstrakurikuler/{id}', [LandingController::class, 'detailEkstrakulikuler'])->name('ekstrakulikuler.detail');



Route::get('/prestasi-sekolah', [LandingController::class, 'prestasi'])->name('prestasi.public');

Route::get('/prestasi-sekolah/{id}', [LandingController::class, 'detailPrestasi'])->name('prestasi.detail');



Route::get('/data-siswa', [LandingController::class, 'siswa'])->name('siswa.public');



Route::get('/galeri-sekolah', [LandingController::class, 'galeri'])->name('galeri.public');

Route::get('/galeri-sekolah/{id}', [LandingController::class, 'detailGaleri'])->name('galeri.detail');

Route::get('/galeri/{galeri}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');



Route::get('/daftar-siswa', [SiswaController::class, 'publicIndex'])->name('public.siswa');

Route::get('/profil-saya', function () {
    return view('profil-saya');
})->name('profil.saya');



Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

    Route::post('/login', [LoginController::class, 'login'])->name('login.proses');

});



/*

|--------------------------------------------------------------------------

| PANEL ADMIN (AUTH ONLY)

|--------------------------------------------------------------------------

*/

Route::middleware('auth')->group(function () {



    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



    Route::get('/dashboard', function () {

        $jumlahGuru = \App\Models\Guru::count();

        $jumlahSiswa = \App\Models\Siswa::count();

        $jumlahBerita = \App\Models\Berita::count();

        $jumlahEkstrakulikuler = \App\Models\Ekstrakulikuler::count();

        $jumlahPengumuman = \App\Models\Pengumuman::count();

        $profil = \App\Models\ProfilSekolah::first();

        $pengumumanTerbaru = \App\Models\Pengumuman::latest('tanggal')->first();

        $beritaTerbaru = \App\Models\Berita::first();



        return view('dashboard', compact(

            'jumlahGuru', 'jumlahSiswa', 'jumlahBerita',

            'jumlahEkstrakulikuler', 'jumlahPengumuman', 'pengumumanTerbaru', 'profil', 'beritaTerbaru'

        ));

    })->name('dashboard');








    Route::resource('guru', GuruController::class);

    Route::resource('siswa', SiswaController::class);

    Route::resource('jurusan', JurusanController::class);

    Route::resource('user', UserController::class);

    Route::resource('pengumuman', PengumumanController::class);

    Route::resource('profil-sekolah', ProfilSekolahController::class);

    Route::resource('berita', BeritaController::class);

    Route::resource('ekstrakulikuler', EkstrakulikulerController::class);

    Route::resource('galeri', GaleriController::class);

    Route::resource('prestasi', PrestasiController::class);

    Route::resource('kelas', KelasController::class);



    // Profil Admin

    Route::get('/profil', function () {

        return view('admin.profil');

    })->name('profil');

});
