@extends('template-landing')

@section('title')
    {{ $profil->nama_sekolah ?? 'SMK Zenith Teknologi' }}
@endsection

@section('content')

    <!-- ===================================================== -->
    <!-- HERO -->
    <!-- ===================================================== -->

    <section id="heroCarousel" class="carousel slide carousel-fade mb-5" data-bs-ride="carousel" data-bs-interval="5000">

        <!-- Indikator Titik di Bawah -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>

        <div class="carousel-inner">

            <!-- SLIDE 1 (Data Profil dari Database) -->
            <div class="carousel-item active">
                <div class="position-relative bg-dark" style="min-height: 500px;">
                    <div class="ratio ratio-21x9">
                        <img src="{{ !empty($profil->foto) ? asset('storage/' . $profil->foto) : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1920&auto=format&fit=crop' }}"
                            alt="{{ $profil->nama_sekolah ?? 'Foto Sekolah' }}" class="w-100 h-100 object-fit-cover">
                    </div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-white">
                        <div class="container text-center">
                            <div class="fw-semibold mb-3">
                                SEKOLAH PUSAT KEUNGGULAN
                                <span class="mx-2">•</span>
                                {{ $profil->alamat ?? 'Indonesia' }}
                            </div>
                            <h1 class="display-3 fw-bold">
                                {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
                            </h1>
                            <p class="lead mx-auto mb-4">
                                {{ $profil->deskripsi ?? 'Selamat datang di website resmi sekolah.' }}
                            </p>
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="{{ route('profil.sekolah.public') }}" class="btn btn-primary">
                                    Pelajari Lebih Lanjut
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                                <a href="{{ route('program-keahlian') }}" class="btn btn-primary">
                                    Lihat Program Keahlian
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 2 (Fasilitas - Menggunakan placeholder gambar agar langsung tampil) -->
            <div class="carousel-item">
                <div class="position-relative bg-dark" style="min-height: 500px;">
                    <div class="ratio ratio-21x9">
                     <img src="{{ asset('gambar/hero/fasilitas.jpg') }}" alt="Fasilitas Sekolah" class="w-100 h-100 object-fit-cover">
                             alt="Fasilitas Sekolah" class="w-100 h-100 object-fit-cover">
                    </div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-white">
                        <div class="container text-center">
                            <div class="fw-semibold mb-3">
                                FASILITAS MODERN & LENGKAP
                            </div>
                            <h1 class="display-3 fw-bold">
                                Praktik Industri & Laboratorium
                            </h1>
                            <p class="lead mx-auto mb-4">
                                Mendukung sarana prasarana berbasis teknologi terkini untuk pembelajaran siswa.
                            </p>
                            <!-- Tombol Jelajahi Jurusan sudah dihapus sesuai permintaan -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Tombol Panah Kiri & Kanan -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Selanjutnya</span>
        </button>

    </section>


{{-- SAMBUTAN KEPALA SEKOLAH --}}
<section id="Sambutan" class="py-5 bg-white animate-on-scroll">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-semibold mb-2">Sambutan</span>
            <h2 class="fw-bold">Sambutan Kepala Sekolah</h2>
        </div>

        <div class="card border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="row g-0">

                <div class="col-lg-4 text-white text-center p-5 d-flex flex-column align-items-center justify-content-center"
                     style="background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);">


                    <div class="mb-4">
                        @if($profil && !empty($profil->foto_kepala_sekolah))
                            <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                                 alt="{{ $profil->kepala_sekolah }}"
                                 class="rounded-circle shadow-sm border border-3 border-white object-fit-cover"
                                 style="width: 150px; height: 150px; object-position: top;">
                        @else
                            <div class="rounded-circle shadow-sm border border-3 border-white bg-white text-primary d-flex align-items-center justify-content-center mx-auto"
                                 style="width: 150px; height: 150px;">
                                <i class="bi bi-person-fill display-3"></i>
                            </div>
                        @endif
                    </div>


                    <h4 class="fw-bold mb-1">{{ $profil->kepala_sekolah ?? 'Nama Kepala Sekolah' }}</h4>
                    <p class="text-white-50 small mb-0">Kepala Sekolah</p>
                </div>


                <div class="col-lg-8 p-4 p-lg-5 d-flex flex-column justify-content-center bg-white">
                    <div class="text-muted" style="line-height: 1.9; font-size: 1.05rem;">
                        <p>
                            Assalamu'alaikum Warahmatullahi Wabarakatuh Salam sejahtera untuk kita semua, Puji syukur kita panjatkan ke hadirat Allah SWT atas rahmat dan karunia-Nya, sehingga website resmi sekolah ini dapat hadir sebagai sarana informasi, komunikasi, dan kolaborasi antara sekolah, peserta didik, orang tua, alumni, serta masyarakat luas.
                        </p>
                        <p>
                            Website ini kami kembangkan sebagai wujud komitmen kami untuk transparansi dan kemajuan teknologi informasi di lingkungan pendidikan. Di dalamnya, tersaji berbagai informasi seputar kegiatan sekolah, kurikulum, prestasi siswa, berita terbaru, serta layanan digital lainnya yang mendukung proses pembelajaran dan manajemen sekolah yang lebih baik.
                        </p>
                        <p class="mb-0">
                            Kami berharap, kehadiran website ini dapat menjadi jembatan interaksi yang positif, memperkuat sinergi antara sekolah dan seluruh stakeholder pendidikan. Kami juga terbuka terhadap masukan dan saran untuk pengembangan website ini agar semakin bermanfaat dan relevan dengan kebutuhan zaman. Akhir kata, semoga website ini membawa manfaat dan menjadi salah satu langkah nyata dalam memajukan dunia pendidikan, khususnya di lingkungan kita tercinta. Terima kasih atas kunjungan Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- ===================================================== -->
    <!-- PROFIL SEKOLAH -->
    <!-- ===================================================== -->

    <section id="profil" class="py-5 bg-light">

        <div class="container py-4">

            <div class="text-center mb-5">

                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">

                    <i class="bi bi-building me-1"></i>

                    Profil Sekolah

                </span>

                <h2 class="fw-bold mt-3">
                    {{ $profil->nama_sekolah ?? 'Profil Sekolah' }}
                </h2>

                <p class="text-muted mb-0">
                    Mengenal lebih dekat sekolah kami
                </p>

            </div>


            <div class="row align-items-center g-5">

                <!-- FOTO SEKOLAH -->

                <div class="col-lg-6 animate-left">

                    @if (!empty($profil->foto))
                        <div class="overflow-hidden rounded-4 shadow-sm">

                            <img src="{{ asset('storage/' . $profil->foto) }}"
                                alt="{{ $profil->nama_sekolah ?? 'Foto Sekolah' }}" class="img-fluid w-100"
                                style="height:380px;object-fit:cover;">

                        </div>
                    @else
                        <div class="rounded-4 bg-primary-subtle d-flex align-items-center justify-content-center"
                            style="height:380px;">

                            <div class="text-center text-primary">

                                <i class="bi bi-building display-1"></i>

                                <p class="mt-3 mb-0">
                                    Foto sekolah belum tersedia
                                </p>

                            </div>

                        </div>
                    @endif

                </div>


                <!-- DATA SEKOLAH -->

                <div class="col-lg-6 animate-right">

                    <h3 class="fw-bold mb-4">
                        {{ $profil->nama_sekolah ?? 'SMK Zenith' }}
                    </h3>


                    @if (!empty($profil->alamat))
                        <div class="d-flex mb-4">

                            <div class="me-3">

                                <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:45px;height:45px;">

                                    <i class="bi bi-geo-alt-fill"></i>

                                </div>

                            </div>

                            <div>

                                <h6 class="fw-bold mb-1">
                                    Alamat Sekolah
                                </h6>

                                <p class="text-muted mb-0">
                                    {{ $profil->alamat }}
                                </p>

                            </div>

                        </div>
                    @endif


                    @if (!empty($profil->kontak))
                        <div class="d-flex mb-4">

                            <div class="me-3">

                                <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:45px;height:45px;">

                                    <i class="bi bi-telephone-fill"></i>

                                </div>

                            </div>

                            <div>

                                <h6 class="fw-bold mb-1">
                                    Kontak
                                </h6>

                                <p class="text-muted mb-0">
                                    {{ $profil->kontak }}
                                </p>

                            </div>

                        </div>
                    @endif


                    @if (!empty($profil->visi_misi))
                        <div class="mt-4">

                            <h5 class="fw-bold mb-3">

                                <i class="bi bi-bullseye text-primary me-2"></i>

                                Visi & Misi

                            </h5>

                            <div class="text-muted">

                                {!! nl2br(e($profil->visi_misi)) !!}

                            </div>

                        </div>
                    @endif

                </div>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- STATISTIK SEKOLAH -->
    <!-- ===================================================== -->

    <section id="statistik" class="py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">

                    <i class="bi bi-bar-chart-fill me-1"></i>

                    Statistik

                </span>

                <h2 class="fw-bold mt-3">
                    {{ $profil->nama_sekolah ?? 'SMK Zenith' }} dalam Angka
                </h2>

                <p class="text-muted">
                    Gambaran singkat data sekolah
                </p>

            </div>


            <div class="row g-4">

                <!-- SISWA -->

                <div class="col-md-4">

                    <div class="card h-100 border-0 shadow-sm text-center animate-scale shadow-sm">

                        <div class="card-body p-4">

                            <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex p-3 mb-3">

                                <i class="bi bi-mortarboard-fill fs-2"></i>

                            </div>

                            <h2 class="fw-bold">
                                {{ $totalSiswa ?? 0 }}
                            </h2>

                            <p class="text-muted mb-0">
                                Peserta Didik
                            </p>

                        </div>

                    </div>

                </div>


                <!-- GURU -->

                <div class="col-md-4">

                    <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll">

                        <div class="card-body p-4">

                            <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex p-3 mb-3">

                                <i class="bi bi-person-badge-fill fs-2"></i>

                            </div>

                            <h2 class="fw-bold">
                                {{ $totalGuru ?? 0 }}
                            </h2>

                            <p class="text-muted mb-0">
                                Guru & Tenaga Pendidik
                            </p>

                        </div>

                    </div>

                </div>


                <!-- PROGRAM KEAHLIAN -->

                <div class="col-md-4">

                    <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll">

                        <div class="card-body p-4">

                            <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex p-3 mb-3">

                                <i class="bi bi-book-fill fs-2"></i>

                            </div>

                            <h2 class="fw-bold">
                                {{ $totalProgramKeahlian ?? 0 }}
                            </h2>

                            <p class="text-muted mb-0">
                                Program Keahlian
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- PROGRAM KEAHLIAN -->
    <!-- ===================================================== -->

    <!-- ===================================================== -->
    <!-- PROGRAM KEAHLIAN -->
    <!-- ===================================================== -->

    <section id="jurusan" class="py-5 bg-light">

        <div class="container">

            <!-- HEADER -->
            <div class="text-center mb-5">

                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                    <i class="bi bi-mortarboard-fill me-1"></i>
                    Program Kami
                </span>

                <h2 class="fw-bold mt-3">
                    Program Keahlian
                </h2>

                <p class="text-muted">
                    Pilihan program keahlian yang tersedia di sekolah
                </p>

            </div>


            <!-- CARD PROGRAM KEAHLIAN -->
            <div class="row g-4 justify-content-center">

                @forelse($jurusans as $item)
                    <div class="col-lg-4 col-md-6">

                        <div class="card h-100 border-0 shadow-sm overflow-hidden animate-scale">

                            <!-- FOTO -->
                            @if (!empty($item->foto))
                                <div style="height:240px; overflow:hidden;">

                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_jurusan }}"
                                        class="w-100 h-100" style="object-fit:cover;">

                                </div>
                            @else
                                <div class="bg-primary-subtle text-primary d-flex align-items-center justify-content-center"
                                    style="height:240px;">

                                    <i class="bi bi-mortarboard-fill display-3"></i>

                                </div>
                            @endif


                            <!-- ISI CARD -->
                            <div class="card-body d-flex flex-column p-4">

                                <!-- SINGKATAN -->
                                @if (!empty($item->singkatan))
                                    <div class="mb-2">

                                        <span class="badge bg-primary">
                                            {{ $item->singkatan }}
                                        </span>

                                    </div>
                                @endif


                                <!-- NAMA JURUSAN -->
                                <h4 class="fw-bold mb-3">

                                    {{ $item->nama_jurusan }}

                                </h4>


                                <!-- DESKRIPSI DIPOTONG -->
                                <p class="text-muted mb-4">

                                    {{ Str::limit(strip_tags($item->deskripsi), 180, '...') }}

                                </p>


                                <!-- BUTTON -->
                                <div class="mt-auto">

                                    <a href="{{ route('program-keahlian') }}" class="btn btn-primary">

                                        Pelajari Lebih Lanjut

                                        <i class="bi bi-arrow-right ms-1"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-primary text-center">

                            <i class="bi bi-info-circle me-2"></i>

                            Data program keahlian belum tersedia.

                        </div>

                    </div>
                @endforelse

            </div>


            <!-- BUTTON LIHAT SEMUA -->
            <div class="text-center mt-5">

                <a href="{{ route('program-keahlian') }}" class="btn btn-primary px-4">

                    Lihat Semua Program Keahlian

                    <i class="bi bi-arrow-right ms-2"></i>

                </a>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- TENAGA PENDIDIK -->
    <!-- ===================================================== -->

    <section id="guru" class="py-5 bg-light">

        <div class="container py-4">

            <div class="text-center mb-5">

                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">

                    <i class="bi bi-people-fill me-1"></i>

                    TENAGA PENDIDIK

                </span>

                <h2 class="display-5 fw-bold mt-3 mb-3">

                    Kenali Guru-Guru

                    <span class="text-primary">
                        Kami.
                    </span>

                </h2>

                <p class="text-muted fs-5 mb-0">

                    Didukung oleh tenaga pendidik yang kompeten,
                    berpengalaman, dan siap mendampingi peserta didik.

                </p>

            </div>


            @if (isset($guru) && $guru->count() > 0)

                @php
                    $kelompokGuru = $guru->chunk(4);
                @endphp


                <div id="carouselGuru" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">

                        @foreach ($kelompokGuru as $index => $kelompok)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                                <div class="row g-4 justify-content-center">

                                    @foreach ($kelompok as $item)
                                        <div class="col-lg-3 col-md-6">

                                            <div class="card h-100 border-0 shadow-sm overflow-hidden animate-scale">

                                                @if (!empty($item->foto))
                                                    <div class="ratio ratio-4x3">

                                                        <img src="{{ asset('gambar/guru/' . $item->foto) }}"
                                                            alt="{{ $item->nama_guru }}"
                                                            class="w-100 h-100 object-fit-cover">

                                                    </div>
                                                @else
                                                    <div
                                                        class="ratio ratio-4x3 bg-primary-subtle d-flex align-items-center justify-content-center">

                                                        <i class="bi bi-person-fill text-primary display-2"></i>

                                                    </div>
                                                @endif


                                                <div class="card-body text-center p-4">

                                                    <h5 class="fw-bold mb-2">
                                                        {{ $item->nama_guru }}
                                                    </h5>

                                                    @if (!empty($item->jabatan))
                                                        <span class="badge bg-primary-subtle text-primary mb-2">
                                                            {{ $item->jabatan }}
                                                        </span>
                                                    @endif



                                                </div>

                                            </div>

                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        @endforeach

                    </div>


                    @if ($kelompokGuru->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselGuru"
                            data-bs-slide="prev">

                            <span class="carousel-control-prev-icon bg-primary rounded-circle p-3"
                                aria-hidden="true"></span>

                            <span class="visually-hidden">
                                Sebelumnya
                            </span>

                        </button>


                        <button class="carousel-control-next" type="button" data-bs-target="#carouselGuru"
                            data-bs-slide="next">

                            <span class="carousel-control-next-icon bg-primary rounded-circle p-3"
                                aria-hidden="true"></span>

                            <span class="visually-hidden">
                                Berikutnya
                            </span>

                        </button>
                    @endif


                    @if ($kelompokGuru->count() > 1)
                        <div class="carousel-indicators position-static mt-4 mb-0">

                            @foreach ($kelompokGuru as $index => $kelompok)
                                <button type="button" data-bs-target="#carouselGuru"
                                    data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach

                        </div>
                    @endif

                </div>
            @else
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="fw-bold text-dark mb-3" style="min-height: 48px;">
                        {{ $item->nama_guru }}
                    </h5>

                    <div class="mt-auto">
                        <span class="badge bg-primary-subtle text-primary">
                            {{ $item->jabatan ?? 'Tenaga Pendidik' }}
                        </span>
                    </div>
                </div>

            @endif


            <div class="text-center mt-4">

                <a href="{{ route('guru.public') }}" class="btn btn-primary">
                    Lihat Semua Guru
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- KEUNGGULAN SMK ZENITH -->
    <!-- ===================================================== -->

    <section id="keunggulan" class="py-5 bg-white">

        <div class="container py-4">

            <div class="text-center mb-5">

                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">



                    Keunggulan Kami

                </span>

                <h2 class="display-5 fw-bold mt-3 mb-3">
                    Keunggulan {{ $profil->nama_sekolah ?? 'SMK Zenith' }}
                </h2>

                <p class="text-muted fs-5 mb-0">

                    Membangun generasi kompeten, kreatif, dan siap menghadapi
                    dunia kerja di era teknologi.

                </p>

            </div>


            <div class="row g-4 justify-content-center">

                <!-- 1 -->

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm animate-on-scroll">

                        <div class="card-body p-4">

                            <div class="bg-primary-subtle text-primary rounded-4 d-inline-flex p-3 mb-4">

                                <i class="bi bi-cpu-fill fs-3"></i>

                            </div>

                            <h4 class="fw-bold mb-3">
                                Pembelajaran Berbasis Teknologi
                            </h4>

                            <p class="text-muted mb-0">

                                Proses pembelajaran memanfaatkan teknologi digital
                                dan metode pembelajaran modern untuk meningkatkan
                                kemampuan peserta didik menghadapi perkembangan zaman.

                            </p>

                        </div>

                    </div>

                </div>


                <!-- 2 -->

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm animate-on-scroll">

                        <div class="card-body p-4">

                            <div class="bg-primary-subtle text-primary rounded-4 d-inline-flex p-3 mb-4">

                                <i class="bi bi-briefcase-fill fs-3"></i>

                            </div>

                            <h4 class="fw-bold mb-3">
                                Link & Match Dunia Industri
                            </h4>

                            <p class="text-muted mb-0">

                                Pembelajaran diarahkan sesuai kebutuhan dunia kerja
                                melalui kerja sama industri, praktik kerja lapangan,
                                dan pengembangan kompetensi profesional.

                            </p>

                        </div>

                    </div>

                </div>


                <!-- 3 -->

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm animate-on-scroll">

                        <div class="card-body p-4">

                            <div class="bg-primary-subtle text-primary rounded-4 d-inline-flex p-3 mb-4">

                                <i class="bi bi-trophy-fill fs-3"></i>

                            </div>

                            <h4 class="fw-bold mb-3">
                                Sertifikasi & Prestasi
                            </h4>

                            <p class="text-muted mb-0">

                                Peserta didik didorong untuk mengembangkan kompetensi,
                                mengikuti sertifikasi keahlian, serta berprestasi
                                dalam berbagai bidang akademik dan nonakademik.

                            </p>

                        </div>

                    </div>

                </div>


                <!-- 4 -->

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm animate-on-scroll">

                        <div class="card-body p-4">

                            <div class="bg-primary-subtle text-primary rounded-4 d-inline-flex p-3 mb-4">

                                <i class="bi bi-lightbulb-fill fs-3"></i>

                            </div>

                            <h4 class="fw-bold mb-3">
                                Project-Based Learning
                            </h4>

                            <p class="text-muted mb-0">

                                Peserta didik belajar melalui proyek nyata untuk
                                melatih kreativitas, kemampuan memecahkan masalah,
                                kerja sama tim, dan menghasilkan karya.

                            </p>

                        </div>

                    </div>

                </div>


                <!-- 5 -->

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm animate-on-scroll">

                        <div class="card-body p-4">

                            <div class="bg-primary-subtle text-primary rounded-4 d-inline-flex p-3 mb-4">

                                <i class="bi bi-people-fill fs-3"></i>

                            </div>

                            <h4 class="fw-bold mb-3">
                                Lingkungan Belajar Positif
                            </h4>

                            <p class="text-muted mb-0">

                                Menciptakan lingkungan sekolah yang aman, nyaman,
                                inklusif, dan mendorong peserta didik untuk berkembang
                                sesuai minat dan potensi masing-masing.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- EKSTRAKURIKULER -->
    <!-- ===================================================== -->

    <section id="ekstrakurikuler" class="py-5 bg-light">

        <div class="container py-4">

            <div class="text-center mb-5">

                <span class="badge bg-primary rounded-pill px-3 py-2">

                    <i class="bi bi-trophy me-1"></i>

                    Kegiatan Sekolah

                </span>

                <h2 class="fw-bold mt-3 mb-2">
                    Ekstrakurikuler
                </h2>

                <p class="text-muted mb-0">

                    Berbagai kegiatan ekstrakurikuler untuk mengembangkan
                    minat, bakat, dan kreativitas siswa.

                </p>

            </div>


            @if (isset($ekstrakulikuler) && $ekstrakulikuler->count())
                <!-- ROW HARUS DI LUAR FOREACH -->
                <div class="row g-4">

                    @foreach ($ekstrakulikuler as $item)
                        <div class="col-lg-4 col-md-6">

                            <div class="card h-100 border-0 shadow-sm overflow-hidden animate-scale">

                                <!-- FOTO -->

                                <div class="bg-light d-flex align-items-center justify-content-center"
                                    style="height:230px;">

                                    @if ($item->gambar)
                                        <img src="{{ asset('gambar/ekstrakulikuler/' . $item->gambar) }}"
                                            alt="{{ $item->nama_ekskul }}" class="w-100 h-100"
                                            style="object-fit:cover;">
                                    @else
                                        <i class="bi bi-trophy text-secondary" style="font-size:75px;"></i>
                                    @endif

                                </div>


                                <!-- ISI CARD -->

                                <div class="card-body p-4 d-flex flex-column">

                                    <h5 class="fw-bold mb-3">
                                        {{ $item->nama_ekskul }}
                                    </h5>


                                    @if ($item->pembina)
                                        <div class="d-flex align-items-start mb-2">

                                            <i class="bi bi-person-badge text-primary me-2 mt-1"></i>

                                            <div>

                                                <small class="text-muted d-block">
                                                    Pembina
                                                </small>

                                                <span>
                                                    {{ $item->pembina }}
                                                </span>

                                            </div>

                                        </div>
                                    @endif


                                    @if ($item->jadwal_latihan)
                                        <div class="d-flex align-items-start mb-3">

                                            <i class="bi bi-calendar-event text-primary me-2 mt-1"></i>

                                            <div>

                                                <small class="text-muted d-block">
                                                    Jadwal Latihan
                                                </small>

                                                <span>
                                                    {{ $item->jadwal_latihan }}
                                                </span>

                                            </div>

                                        </div>
                                    @endif


                                    <div class="mt-auto">

                                        <a href="{{ route('ekstrakulikuler.detail', ['id' => $item->getKey()]) }}"
                                            class="btn btn-primary w-100">
                                            Selengkapnya
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>


                <div class="text-center mt-5">

                    <a href="{{ route('ekstrakulikuler.public') }}" class="btn btn-primary px-4 py-2">
                        Lihat Semua Ekstrakurikuler
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>
            @else
                <div class="text-center py-5">

                    <i class="bi bi-trophy text-muted" style="font-size:70px;"></i>

                    <h4 class="fw-bold mt-3">
                        Belum Ada Ekstrakurikuler
                    </h4>

                    <p class="text-muted mb-0">
                        Data kegiatan ekstrakurikuler belum tersedia.
                    </p>

                </div>
            @endif

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- PRESTASI -->
    <!-- ===================================================== -->

    <section id="prestasi" class="py-5 bg-white">

        <div class="container py-4">

            <!-- HEADER -->

            <div class="text-center mb-5">

                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">

                    <i class="bi bi-award-fill me-1"></i>

                    Prestasi Sekolah

                </span>

                <h2 class="fw-bold mt-3 mb-2">
                    Prestasi Siswa
                </h2>

                <p class="text-muted mb-0">

                    Berbagai pencapaian dan prestasi yang diraih
                    oleh peserta didik {{ $profil->nama_sekolah ?? 'SMK Zenith' }}.

                </p>

            </div>


            @if (isset($prestasi) && $prestasi->count())
                <!-- CARD PRESTASI -->

                <div class="row g-4">

                    @foreach ($prestasi as $item)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                                {{-- 1. Foto --}}
                                <div class="position-relative">
                                    @if (!empty($item->foto))
                                        <img src="{{ asset('gambar/prestasi/' . $item->foto) }}" class="card-img-top"
                                            alt="{{ $item->judul }}" style="height: 220px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                            style="height: 220px;">
                                            <i class="bi bi-trophy text-muted display-4"></i>
                                        </div>
                                    @endif
                                </div>

                                {{-- 2. Judul & Keterangan --}}
                                <div class="card-body p-4 d-flex flex-column">
                                    <h5 class="card-title fw-bold mb-2 text-dark">
                                        {{ $item->nama_prestasi }}
                                    </h5>

                                    <p class="card-text text-muted small flex-grow-1 mb-3">
                                        {{ Str::limit(strip_tags($item->deskripsi ?? ($item->keterangan ?? '')), 100) }}
                                    </p>

                                    {{-- 3. Tombol Ke Halaman Detail --}}
                                    <a href="{{ route('prestasi.detail', $item->id ?? $item->getKey()) }}"
                                        class="btn btn-outline-primary btn-sm rounded-pill w-100 py-2 mt-auto">
                                        Detail Prestasi <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


                <!-- TOMBOL SEMUA PRESTASI -->

                <div class="text-center mt-5">

                    <a href="{{ route('prestasi.public') }}" class="btn btn-primary px-4 py-2">
                        Lihat Semua Prestasi
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>
            @else
                <div class="text-center py-5">

                    <i class="bi bi-award text-muted" style="font-size:70px;"></i>

                    <h4 class="fw-bold mt-3">
                        Belum Ada Prestasi
                    </h4>

                    <p class="text-muted mb-0">
                        Data prestasi siswa belum tersedia.
                    </p>

                </div>
            @endif

        </div>

    </section>





    {{-- =========================================================
     GALERI SEKOLAH
========================================================= --}}
    <section id="galeri" class="py-5 bg-white">
        <div class="container py-4">

            {{-- Judul Section --}}
            <div class="text-center mb-5">
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                    <i class="bi bi-images me-1"></i>
                    Dokumentasi Sekolah
                </span>

                <h2 class="fw-bold mt-3 mb-2">
                    Galeri Sekolah
                </h2>

                <p class="text-muted mb-0">
                    Dokumentasi kegiatan dan berbagai aktivitas
                    {{ $profil->nama_sekolah ?? 'SMK Zenith' }}.
                </p>
            </div>

            {{-- Jika Ada Data Galeri --}}
            @if (isset($galeri) && $galeri->count())
                <div class="row g-4">

                    @foreach ($galeri as $item)
                        <div class="col-lg-4 col-md-6">

                            <div class="card h-100 border-0 shadow-sm overflow-hidden animate-scale rounded-4">

                                {{-- Media --}}
                                <div class="position-relative bg-light overflow-hidden" style="height: 240px;">

                                    {{-- FOTO --}}
                                    @if ($item->kategori === 'Foto')
                                        @if (!empty($item->file))
                                            <img src="{{ asset('gambar/galeri/' . $item->file) }}"
                                                alt="{{ $item->judul }}" class="w-100 h-100"
                                                style="object-fit: cover;">
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                <i class="bi bi-image text-muted" style="font-size: 70px;"></i>
                                            </div>
                                        @endif

                                        {{-- VIDEO --}}
                                    @elseif($item->kategori === 'Video')
                                        @if (!empty($item->file))
                                            <video class="w-100 h-100" style="object-fit: cover;">
                                                <source src="{{ asset('gambar/galeri/' . $item->file) }}">
                                            </video>
                                            <div class="position-absolute top-50 start-50 translate-middle">
                                                <i class="bi bi-play-circle-fill text-white opacity-75"
                                                    style="font-size: 50px;"></i>
                                            </div>
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                <i class="bi bi-play-circle text-primary" style="font-size: 70px;"></i>
                                            </div>
                                        @endif
                                    @endif

                                    {{-- Badge Kategori --}}
                                    <div class="position-absolute top-0 start-0 m-3">
                                        @if ($item->kategori === 'Foto')
                                            <span class="badge bg-primary rounded-pill px-3 py-2">
                                                <i class="bi bi-camera me-1"></i>
                                                Foto
                                            </span>
                                        @else
                                            <span class="badge bg-danger rounded-pill px-3 py-2">
                                                <i class="bi bi-play-circle me-1"></i>
                                                Video
                                            </span>
                                        @endif
                                    </div>

                                </div>

                                {{-- Isi Card --}}
                                <div class="card-body p-4 d-flex flex-column">

                                    {{-- Judul --}}
                                    <h5 class="fw-bold mb-2 text-dark">
                                        {{ $item->judul }}
                                    </h5>

                                    {{-- Keterangan --}}
                                    @if (!empty($item->keterangan))
                                        <p class="text-muted small mb-3">
                                            {{ Str::limit(strip_tags($item->keterangan), 90, '...') }}
                                        </p>
                                    @endif

                                    {{-- Tanggal & Tombol Detail --}}
                                    <div class="mt-auto d-flex align-items-center justify-content-between pt-3 border-top">
                                        @if (!empty($item->tanggal))
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-event text-primary me-1"></i>
                                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                            </small>
                                        @else
                                            <span></span>
                                        @endif

                                        <a href="{{ route('galeri.detail', $item->id ?? $item->getKey()) }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                            Detail <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

                {{-- Tombol Lihat Semua Galeri --}}
                <div class="text-center mt-5">
                    <a href="{{ route('galeri.public') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
                        Lihat Semua Galeri
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>

                {{-- Jika Belum Ada Data --}}
            @else
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-images text-muted" style="font-size: 70px;"></i>
                        <h4 class="fw-bold mt-3">
                            Belum Ada Galeri
                        </h4>
                        <p class="text-muted mb-0">
                            Dokumentasi kegiatan sekolah belum tersedia.
                        </p>
                    </div>
                </div>
            @endif

        </div>
    </section>



    <!-- ===================================================== -->
    <!-- PENGUMUMAN -->
    <!-- ===================================================== -->

    <section id="pengumuman" class="py-5 bg-light">

        <div class="container py-4">

            <div class="text-center mb-5">

                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                    <i class="bi bi-megaphone-fill me-1"></i>
                    Informasi Sekolah
                </span>

                <h2 class="fw-bold mt-3 mb-2">
                    Pengumuman Terbaru
                </h2>

                <p class="text-muted mb-0">
                    Informasi penting untuk seluruh warga sekolah
                    {{ $profil->nama_sekolah ?? 'SMK Cendikia Teknologi' }}.
                </p>

            </div>

            <div class="row g-4">

                @forelse($pengumumanTerbaru as $item)
                    <div class="col-lg-4 col-md-6">

                        <div class="card h-100 border-0 shadow-sm">

                            <div class="card-body p-4">

                                <div class="d-flex align-items-center mb-3">

                                    <div class="bg-primary-subtle text-primary rounded-3 p-3 me-3">
                                        <i class="bi bi-megaphone-fill fs-4"></i>
                                    </div>

                                    <small class="text-muted">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                    </small>

                                </div>

                                <h5 class="fw-bold mb-3">
                                    {{ $item->judul }}
                                </h5>

                                <p class="text-muted">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 140) }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center py-4">

                        <i class="bi bi-megaphone text-muted display-4"></i>

                        <p class="text-muted mt-3 mb-0">
                            Belum ada pengumuman terbaru.
                        </p>

                    </div>
                @endforelse

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- BERITA -->
    <!-- ===================================================== -->

    <section id="berita" class="py-5">

        <div class="container py-4">

            <div class="text-center mb-5">

                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">

                    <i class="bi bi-newspaper me-1"></i>

                    Informasi Terkini

                </span>

                <h2 class="fw-bold display-6 mt-3 mb-2">
                    Berita Terbaru
                </h2>

                <p class="text-muted mb-0">

                    Ikuti perkembangan dan kegiatan terbaru di
                    {{ $profil->nama_sekolah ?? 'SMK Zenith' }}

                </p>

            </div>


            <div class="row g-4 justify-content-center">

                @forelse($beritaTerbaru as $berita)
                    <div class="col-lg-4 col-md-6">

                        <div class="card text-white border-0 rounded-4 overflow-hidden shadow h-100 animate-on-scroll">

                            <!-- GAMBAR -->

                            @if (!empty($berita->gambar))
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                    class="w-100" style="height:300px;object-fit:cover;">
                            @else
                                <div class="bg-primary-subtle text-primary d-flex align-items-center justify-content-center"
                                    style="height:300px;">

                                    <i class="bi bi-newspaper" style="font-size:70px;"></i>

                                </div>
                            @endif


                            <!-- OVERLAY -->

                            <div class="card-img-overlay d-flex flex-column justify-content-end p-4"
                                style="background:linear-gradient(transparent 20%, rgba(0,60,150,0.9));">

                                <h4 class="card-title fw-bold mb-2">
                                    {{ $berita->judul }}
                                </h4>

                                <p class="card-text small mb-3">

                                    {{ Str::limit(strip_tags($berita->isi), 100) }}

                                </p>

                                <div>

                                    <a href="{{ route('berita.detail', $berita->id_berita) }}" class="btn btn-primary">
                                        Baca Selengkapnya
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        <div class="py-5">

                            <i class="bi bi-newspaper display-4 text-muted"></i>

                            <p class="text-muted mt-3">
                                Belum ada berita terbaru.
                            </p>

                        </div>

                    </div>
                @endforelse

            </div>


            <div class="text-center mt-5">

                <a href="{{ route('berita.public') }}" class="btn btn-primary">
                    Lihat Semua Berita
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>

    </section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>





@endsection
