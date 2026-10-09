<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', $profil->nama_sekolah ?? 'SMK Zenith')
    </title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <style>
        /* =========================
       ANIMASI LANDING PAGE
    ========================= */

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(35px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .animate-on-scroll.show {
            opacity: 1;
            transform: translateY(0);
        }

        .animate-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .animate-left.show {
            opacity: 1;
            transform: translateX(0);
        }

        .animate-right {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .animate-right.show {
            opacity: 1;
            transform: translateX(0);
        }

        .animate-scale {
            opacity: 0;
            transform: scale(0.92);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .animate-scale.show {
            opacity: 1;
            transform: scale(1);
        }
    </style>

</head>


<body>


    {{-- ================= NAVBAR ================= --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">

        <div class="container">


            <!-- LOGO + NAMA SEKOLAH -->

            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}#beranda">

                @if (!empty($profil->logo))
                    <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" width="45" height="45"
                        class="rounded-circle me-2">
                @else
                    <i class="bi bi-mortarboard-fill fs-2 me-2"></i>
                @endif


                <span>

                    <span class="fw-bold d-block">

                        {{ $profil->nama_sekolah ?? 'SMK Zenith' }}

                    </span>

                    <small class="text-white-50">

                        Sekolah Pusat Keunggulan

                    </small>

                </span>

            </a>



            <!-- TOGGLE MOBILE -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>



            <!-- MENU -->

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">


                    <!-- HOME -->

                    <li class="nav-item">

                        <a class="nav-link text-white px-3" href="{{ route('home') }}#beranda">

                            Home

                        </a>

                    </li>



                    <!-- PROFIL SEKOLAH -->

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-white px-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            Profil Sekolah

                        </a>


                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">


                            <!-- PROFIL SEKOLAH -->

                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#profil">

                                    <i class="bi bi-building me-2"></i>

                                    Profil Sekolah

                                </a>

                            </li>



                            <!-- DATA GURU -->

                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#guru">

                                    <i class="bi bi-people-fill me-2"></i>

                                    Data Guru

                                </a>

                            </li>



                            <!-- DATA SISWA -->

                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#siswa">

                                    <i class="bi bi-mortarboard-fill me-2"></i>

                                    Data Siswa

                                </a>

                            </li>


                        </ul>

                    </li>



                    <!-- PROGRAM -->

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-white px-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            Program

                        </a>


                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">


                            <!-- PROGRAM KEAHLIAN -->

                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#jurusan">

                                    <i class="bi bi-mortarboard me-2"></i>

                                    Program Keahlian

                                </a>

                            </li>



                            <!-- EKSTRAKURIKULER -->

                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#ekstrakurikuler">

                                    <i class="bi bi-trophy me-2"></i>

                                    Ekstrakurikuler

                                </a>

                            </li>


                        </ul>

                    </li>



                    <!-- POJOK SISWA -->

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-white px-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            Pojok Siswa

                        </a>


                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">


                            <!-- PRESTASI -->

                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#prestasi">

                                    <i class="bi bi-trophy me-2"></i>

                                    Prestasi

                                </a>

                            </li>



                            <!-- EKSTRAKURIKULER -->


                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#ekstrakurikuler">

                                    <i class="bi bi-trophy me-2"></i>

                                    Ekstrakurikuler

                                </a>

                            </li>


                        </ul>

                    </li>



                    <!-- INFORMASI -->

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-white px-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            Informasi

                        </a>


                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">


                            <!-- BERITA -->

                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#berita">

                                    <i class="bi bi-newspaper me-2"></i>

                                    Berita

                                </a>

                            </li>



                            <!-- PENGUMUMAN -->

                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#pengumuman">

                                    <i class="bi bi-megaphone me-2"></i>

                                    Pengumuman

                                </a>

                            </li>



                            <!-- GALERI -->

                            <li>

                                <a class="dropdown-item" href="{{ route('home') }}#galeri">

                                    <i class="bi bi-images me-2"></i>

                                    Galeri

                                </a>

                            </li>


                        </ul>

                    </li>


                </ul>

                <a href="{{ route('login') }}" class="btn btn-light btn-sm px-3">
                    Login
                </a>

            </div>

        </div>

    </nav>



    {{-- ================= ISI HALAMAN ================= --}}

    @yield('content')



    <!-- FOOTER -->
    <footer class="bg-dark text-white mt-5">

        <div class="container py-5">

            <div class="row g-4">

                <!-- BRAND SEKOLAH -->
                <div class="col-lg-4 col-md-6">

                    <div class="d-flex align-items-center mb-3">

                        @if (!empty($profil->logo))
                            <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" width="55"
                                height="55" class="rounded-circle me-3">
                        @else
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width:55px;height:55px;">
                                <i class="bi bi-mortarboard-fill fs-3"></i>
                            </div>
                        @endif

                        <div>
                            <h5 class="fw-bold mb-0">
                                {{ $profil->nama_sekolah ?? 'SMK Zenith' }}
                            </h5>

                            <small class="text-white-50">
                                Sekolah Pusat Keunggulan
                            </small>
                        </div>

                    </div>

                    <p class="text-white-50 mb-0">
                        {{ $profil->nama_sekolah ?? 'SMK Zenith' }}
                        merupakan sekolah menengah kejuruan yang berkomitmen
                        mencetak generasi kompeten, kreatif, dan siap menghadapi
                        dunia kerja.
                    </p>

                </div>


                <!-- DATA SEKOLAH -->
                <div class="col-lg-2 col-md-6">

                    <h6 class="fw-bold mb-3">
                        Data Sekolah
                    </h6>

                    <div class="d-flex flex-column gap-2">

                        <a href="{{ route('home') }}#profil" class="text-white-50 text-decoration-none">
                            <i class="bi bi-building me-2"></i>
                            Profil Sekolah
                        </a>

                        <a href="{{ route('home') }}#guru" class="text-white-50 text-decoration-none">
                            <i class="bi bi-people-fill me-2"></i>
                            Data Guru
                        </a>

                        <a href="{{ route('home') }}#siswa" class="text-white-50 text-decoration-none">
                            <i class="bi bi-mortarboard-fill me-2"></i>
                            Data Siswa
                        </a>

                        <a href="{{ route('home') }}#jurusan" class="text-white-50 text-decoration-none">
                            <i class="bi bi-diagram-3-fill me-2"></i>
                            Program Keahlian
                        </a>

                    </div>

                </div>


                <!-- INFORMASI -->
                <div class="col-lg-2 col-md-6">

                    <h6 class="fw-bold mb-3">
                        Informasi
                    </h6>

                    <div class="d-flex flex-column gap-2">

                        <a href="{{ route('home') }}#berita" class="text-white-50 text-decoration-none">
                            <i class="bi bi-newspaper me-2"></i>
                            Berita
                        </a>

                        <a href="{{ route('home') }}#pengumuman" class="text-white-50 text-decoration-none">
                            <i class="bi bi-megaphone-fill me-2"></i>
                            Pengumuman
                        </a>

                        <a href="{{ route('home') }}#galeri" class="text-white-50 text-decoration-none">
                            <i class="bi bi-images me-2"></i>
                            Galeri
                        </a>

                        <a href="{{ route('home') }}#prestasi" class="text-white-50 text-decoration-none">
                            <i class="bi bi-award-fill me-2"></i>
                            Prestasi
                        </a>

                    </div>

                </div>


                <!-- KONTAK -->
                <div class="col-lg-4 col-md-6">

                    <h6 class="fw-bold mb-3">
                        Kontak Sekolah
                    </h6>

                    @if (!empty($profil->alamat))
                        <div class="d-flex mb-3">

                            <i class="bi bi-geo-alt-fill text-primary me-3 fs-5"></i>

                            <span class="text-white-50">
                                {{ $profil->alamat }}
                            </span>

                        </div>
                    @endif


                    @if (!empty($profil->kontak))
                        <div class="d-flex mb-3">

                            <i class="bi bi-telephone-fill text-primary me-3 fs-5"></i>

                            <span class="text-white-50">
                                {{ $profil->kontak }}
                            </span>

                        </div>
                    @endif


                    <div class="d-flex mb-3">

                        <i class="bi bi-envelope-fill text-primary me-3 fs-5"></i>

                        <span class="text-white-50">
                            Email Sekolah
                        </span>

                    </div>


                    <div class="d-flex">

                        <i class="bi bi-clock-fill text-primary me-3 fs-5"></i>

                        <span class="text-white-50">
                            Senin - Jumat
                        </span>

                    </div>

                </div>

            </div>

        </div>


        <!-- FOOTER BAWAH -->
        <div class="border-top border-secondary">

            <div class="container py-3">

                <div class="row align-items-center">

                    <div class="col-md-6 text-center text-md-start">

                        <small class="text-white-50">

                            &copy; {{ date('Y') }}

                            <strong class="text-white">
                                {{ $profil->nama_sekolah ?? 'SMK Zenith' }}
                            </strong>.

                            Semua hak dilindungi.

                        </small>

                    </div>


                    <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">

                        <small class="text-white-50">

                            <i class="bi bi-shield-check me-1"></i>
                            SchoolHub

                            <span class="mx-2">•</span>

                            Versi 1.0

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </footer>


    <!-- BOOTSTRAP JS -->

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const animatedElements = document.querySelectorAll(
                '.animate-on-scroll, .animate-left, .animate-right, .animate-scale'
            );

            const observer = new IntersectionObserver((entries) => {

                entries.forEach((entry) => {

                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');

                        observer.unobserve(entry.target);
                    }

                });

            }, {
                threshold: 0.15
            });

            animatedElements.forEach((element) => {
                observer.observe(element);
            });

        });
    </script>

</body>

</html>
