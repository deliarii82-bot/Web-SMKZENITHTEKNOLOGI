<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Sekolah SMK Cendikia Teknologi">

    @php
        $profil = DB::table('profil_sekolahs')->first();
    @endphp
    <title>@yield('title', 'Dashboard') | {{ $profil->nama_sekolah ?? 'SMK Zenith Teknologi' }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <div class="admin-shell">

        <!-- Sidebar -->
        <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">

            <!-- HEADER SIDEBAR: Logo & Nama Sekolah -->
            <div class="sidebar-header text-center py-3">
                <a class="brand-mark d-flex flex-column align-items-center text-decoration-none"
                    href="{{ route('dashboard') }}">
                    <!-- Logo di Atas -->
                    <span class="brand-icon mb-2">
                        @if (isset($profil->logo) && $profil->logo)
                            <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo"
                                class="img-fluid rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <i class="bi bi-building fs-2" aria-hidden="true"></i>
                        @endif
                    </span>

                    <!-- Nama Sekolah di Bawah Logo -->
                    <span class="brand-title fw-bold text-wrap text-center"
                        style="font-size: 0.95rem; line-height: 1.2;">
                        {{ $profil->nama_sekolah ?? 'SMK Zenith' }}
                    </span>
                </a>
            </div>

            <!-- Menu Sidebar -->
            <nav class="sidebar-nav">

                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <span class="nav-icon">
                        <i class="bi bi-speedometer2"></i>
                    </span>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

                <div class="sidebar-section">
                    <span>UTAMA</span>
                </div>

                <a class="nav-link {{ request()->routeIs('profil-sekolah.*') ? 'active' : '' }}"
                    href="{{ route('profil-sekolah.index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-building"></i>
                    </span>
                    <span class="nav-text">
                        Profil Sekolah
                    </span>
                </a>

                <div class="sidebar-section">
                    <span>DATA SEKOLAH</span>
                </div>

                <a class="nav-link {{ request()->routeIs('guru.*') ? 'active' : '' }}"
                    href="{{ route('guru.index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-person-badge"></i>
                    </span>
                    <span class="nav-text">
                        Guru
                    </span>
                </a>

                <a class="nav-link {{ request()->routeIs('siswa.*') ? 'active' : '' }}"
                    href="{{ route('siswa.index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-mortarboard"></i>
                    </span>
                    <span class="nav-text">
                        Siswa
                    </span>
                </a>

                <a class="nav-link {{ request()->routeIs('jurusan.*') ? 'active' : '' }}"
                    href="{{ route('jurusan.index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-book"></i>
                    </span>
                    <span class="nav-text">
                        Program Keahlian
                    </span>
                </a>

                @if (strtolower(auth()->user()->role) == 'admin')
                    <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}"
                        href="{{ route('user.index') }}">
                        <span class="nav-icon">
                            <i class="bi bi-people"></i>
                        </span>
                        <span class="nav-text">
                            User
                        </span>
                    </a>
                @endif

                <div class="sidebar-section">
                    <span>INFORMASI</span>
                </div>

                <a class="nav-link {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}"
                    href="{{ route('pengumuman.index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-megaphone"></i>
                    </span>
                    <span class="nav-text">
                        Pengumuman
                    </span>
                </a>

                <a class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}"
                    href="{{ route('berita.index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-newspaper"></i>
                    </span>
                    <span class="nav-text">
                        Berita
                    </span>
                </a>

                <a class="nav-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}"
                    href="{{ route('galeri.index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-images"></i>
                    </span>
                    <span class="nav-text">
                        Galeri
                    </span>
                </a>

                <div class="sidebar-section">
                    <span>KEGIATAN</span>
                </div>

                <a class="nav-link {{ request()->routeIs('ekstrakulikuler.*') ? 'active' : '' }}"
                    href="{{ route('ekstrakulikuler.index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-trophy"></i>
                    </span>
                    <span class="nav-text">
                        Ekstrakulikuler
                    </span>
                </a>

                <a class="nav-link {{ request()->routeIs('prestasi.*') ? 'active' : '' }}"
                    href="{{ route('prestasi.index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-award"></i>
                    </span>
                    <span class="nav-text">
                        Prestasi
                    </span>
                </a>

            </nav>

        </aside>

        <!-- Bagian Utama -->
        <div class="admin-main">

            <!-- Navbar Admin -->
            <nav class="navbar admin-navbar navbar-expand bg-white">

                <div class="container-fluid px-3 px-lg-4">

                    {{-- <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar"
                        aria-expanded="true" aria-label="Toggle sidebar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> --}}

                    <!-- Profil Admin -->
                    <div class="dropdown ms-auto">
                        <button class="btn btn-light border dropdown-toggle btn-sm" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ auth()->user()->name ?? (auth()->user()->role ?? 'User') }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li>
                                <a class="dropdown-item small" href="{{ route('profil') }}">
                                    <i class="bi bi-person me-2"></i> Profil
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item small text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>

            </nav>

            <!-- Isi Halaman -->
            <main class="dashboard-content p-3 p-lg-4">
                @yield('content')
            </main>

        </div>

    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
