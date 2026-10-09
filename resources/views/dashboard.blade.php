@extends('template')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="mb-4">
            <h2 class="fw-bold mb-1">Dashboard</h2>
            <p class="text-muted mb-0">
                Selamat datang di Sistem Informasi Sekolah SMK Cendikia Teknologi.
            </p>
        </div>


        {{-- CARD STATISTIK --}}
        <div class="row g-4 mb-4">

            {{-- GURU --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="text-muted mb-2">
                                    Total Guru
                                </p>

                                <h2 class="fw-bold text-dark mb-1">
                                    {{ $jumlahGuru }}
                                </h2>

                                <a href="{{ route('guru.index') }}" class="text-primary text-decoration-none">
                                    Data guru sekolah
                                </a>
                            </div>

                            <div class="bg-primary bg-opacity-10 text-primary rounded p-3">
                                <i class="bi bi-person-badge fs-3"></i>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- SISWA --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="text-muted mb-2">
                                    Total Siswa
                                </p>

                                <h2 class="fw-bold text-dark mb-1">
                                    {{ $jumlahSiswa }}
                                </h2>

                                <a href="{{ route('siswa.index') }}" class="text-success text-decoration-none">
                                    Data siswa sekolah
                                </a>
                            </div>

                            <div class="bg-success bg-opacity-10 text-success rounded p-3">
                                <i class="bi bi-mortarboard fs-3"></i>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- BERITA --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="text-muted mb-2">
                                    Total Berita
                                </p>

                                <h2 class="fw-bold text-dark mb-1">
                                    {{ $jumlahBerita }}
                                </h2>

                                <a href="{{ route('berita.index') }}" class="text-warning text-decoration-none">
                                    Informasi berita sekolah
                                </a>
                            </div>

                            <div class="bg-warning bg-opacity-10 text-warning rounded p-3">
                                <i class="bi bi-newspaper fs-3"></i>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- EKSTRAKULIKULER --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="text-muted mb-2">
                                    Total Ekstrakulikuler
                                </p>

                                <h2 class="fw-bold text-dark mb-1">
                                    {{ $jumlahEkstrakulikuler }}
                                </h2>

                                <a href="{{ route('ekstrakulikuler.index') }}" class="text-danger text-decoration-none">
                                    Kegiatan sekolah
                                </a>
                            </div>

                            <div class="bg-danger bg-opacity-10 text-danger rounded p-3">
                                <i class="bi bi-trophy fs-3"></i>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>


        {{-- INFORMASI SEKOLAH + MENU CEPAT --}}
        <div class="row g-4 mb-4">

            {{-- PROFIL SEKOLAH --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-white border-0 p-4">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h5 class="fw-bold mb-1">
                                    Profil Sekolah
                                </h5>

                                <p class="text-muted mb-0">
                                    Informasi singkat sekolah
                                </p>
                            </div>

                            <i class="bi bi-building fs-3 text-primary"></i>

                        </div>

                    </div>


                    <div class="card-body px-4 pb-4">

                        <div class="row">

                            {{-- LOGO --}}
                            <div class="col-md-4 mb-3 mb-md-0">

                                <div class="bg-light rounded-3 h-100
                                        d-flex align-items-center
                                        justify-content-center"
                                    style="min-height: 180px;">

                                    @if ($profil && $profil->logo)
                                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah"
                                            style="
                                            width: 150px;
                                            height: 150px;
                                            object-fit: contain;
                                         ">
                                    @else
                                        <i class="bi bi-building text-secondary" style="font-size: 70px;"></i>
                                    @endif

                                </div>

                            </div>


                            {{-- DATA SEKOLAH --}}
                            <div class="col-md-8">

                                <h4 class="fw-bold">
                                    {{ $profil->nama_sekolah ?? 'SMK Zenith' }}
                                </h4>

                                <p class="text-muted">
                                    {{ $profil->deskripsi ?? 'Sistem Informasi Sekolah untuk mengelola data dan informasi sekolah.' }}
                                </p>


                                <div class="row mt-3">

                                    <div class="col-sm-6 mb-3">

                                        <small class="text-muted d-block">
                                            Kepala Sekolah
                                        </small>

                                        <strong>
                                            {{ $profil->kepala_sekolah ?? '-' }}
                                        </strong>

                                    </div>


                                    <div class="col-sm-6 mb-3">

                                        <small class="text-muted d-block">
                                            NPSN
                                        </small>

                                        <strong>
                                            {{ $profil->npsn ?? '-' }}
                                        </strong>

                                    </div>


                                    <div class="col-sm-6">

                                        <small class="text-muted d-block">
                                            Tahun Berdiri
                                        </small>

                                        <strong>
                                            {{ $profil->tahun_berdiri ?? '-' }}
                                        </strong>

                                    </div>


                                    <div class="col-sm-6">

                                        <small class="text-muted d-block">
                                            Kontak
                                        </small>

                                        <strong>
                                            {{ $profil->kontak ?? '-' }}
                                        </strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- INFORMASI BAWAH --}}
        <div class="row g-4">

          {{-- PENGUMUMAN --}}
<div class="col-lg-6">

    <div class="card border-0 shadow-sm h-100">

        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="fw-bold mb-1">
                        Pengumuman
                    </h5>

                    <p class="text-muted mb-0">
                        Informasi terbaru sekolah
                    </p>
                </div>

                <i class="bi bi-megaphone fs-3 text-primary"></i>

            </div>

        </div>

        <div class="card-body">

            @if ($pengumumanTerbaru)

                <div class="border rounded-3 p-3">

                    <h6 class="fw-bold mb-2">
                        {{ $pengumumanTerbaru->judul }}
                    </h6>

                    <p class="text-muted small mb-3">
                        {{ \Illuminate\Support\Str::limit(
                            strip_tags($pengumumanTerbaru->isi),
                            120
                        ) }}
                    </p>

                    <small class="text-muted">
                        <i class="bi bi-calendar3 me-1"></i>

                        {{ \Carbon\Carbon::parse(
                            $pengumumanTerbaru->tanggal
                        )->format('d M Y') }}
                    </small>

                </div>

            @else

                <div class="text-center py-4">

                    <i class="bi bi-megaphone text-secondary"
                       style="font-size:45px;"></i>

                    <p class="text-muted mt-3 mb-0">
                        Belum ada pengumuman.
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>


            {{-- EKSTRAKULIKULER --}}
            <div class="col-lg-6">

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white border-0 p-4">

                        <div class="d-flex justify-content-between">

                            <div>

                                <h5 class="fw-bold mb-1">
                                    Ekstrakulikuler
                                </h5>

                                <p class="text-muted mb-0">
                                    Kegiatan siswa
                                </p>

                            </div>

                            <i class="bi bi-trophy
                                  fs-3 text-danger"></i>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="text-center py-4">

                            <i class="bi bi-trophy
                                  text-secondary"
                                style="font-size:45px;"></i>

                            <p class="text-muted mt-3 mb-0">
                                Belum ada data ekstrakulikuler.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
