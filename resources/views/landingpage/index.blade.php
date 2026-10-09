@extends('template-landing')

@section('title')
    {{ $profil->nama_sekolah ?? 'SMK Cendikia Teknologi' }}
@endsection

@section('content')

    <!-- ===================================================== -->
    <!-- HERO -->
    <!-- ===================================================== -->

    <section class="position-relative">

        <div class="ratio ratio-21x9">

            <img
                src="{{ !empty($profil->foto) ? asset('storage/' . $profil->foto) : asset('assets/images/sekolah.jpg') }}"
                alt="{{ $profil->nama_sekolah ?? 'Foto Sekolah' }}"
                class="w-100 h-100 object-fit-cover"
            >

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

                    <a
                        href="{{ route('profil.sekolah.public') }}"
                        class="btn btn-primary"
                    >
                        Pelajari Lebih Lanjut
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>

                    <a
                        href="{{ route('program-keahlian') }}"
                        class="btn btn-primary"
                    >
                        Lihat Program Keahlian
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- SAMBUTAN KEPALA SEKOLAH -->
    <!-- ===================================================== -->

    <section id="sambutan" class="py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <span class="badge bg-primary rounded-pill px-3 py-2">

                    <i class="bi bi-chat-quote me-1"></i>

                    Sambutan

                </span>

                <h2 class="fw-bold mt-3">
                    Sambutan Kepala Sekolah
                </h2>

                <p class="text-muted">
                    Pesan dan sambutan dari kepala sekolah
                </p>

            </div>


            <div class="card shadow-sm border-0 animate-on-scroll">

                <div class="row g-0">

                    <!-- FOTO KEPALA SEKOLAH -->

                    <div class="col-lg-4 bg-primary text-white">

                        <div class="p-4 text-center">

                            @if(isset($kepalaSekolah) && $kepalaSekolah && !empty($kepalaSekolah->foto_kepala_sekolah))

                                <img
                                    src="{{ asset('storage/' . $kepalaSekolah->foto_kepala_sekolah) }}"
                                    alt="{{ $kepalaSekolah->kepala_sekolah }}"
                                    class="img-fluid rounded-circle border border-4 border-white mb-4"
                                    width="180"
                                    height="180"
                                    style="width:180px;height:180px;object-fit:cover;"
                                >

                            @else

                                <i class="bi bi-person-circle display-1 d-block my-5"></i>

                            @endif


                            @if(isset($kepalaSekolah) && $kepalaSekolah)

                                <h4 class="fw-bold">
                                    {{ $kepalaSekolah->kepala_sekolah }}
                                </h4>

                                <span class="badge bg-light text-primary">
                                    Kepala Sekolah
                                </span>

                            @else

                                <h4 class="fw-bold">
                                    Kepala Sekolah
                                </h4>

                                <p class="mb-0">
                                    Data kepala sekolah belum tersedia.
                                </p>

                            @endif

                        </div>

                    </div>


                    <!-- SAMBUTAN -->

                    <div class="col-lg-8">

                        <div class="card-body p-4 p-lg-5">

                            <i class="bi bi-quote display-6 text-primary"></i>

                            <p class="fs-5 text-secondary">
                                Assalamualaikum Warahmatullahi Wabarakatuh.
                            </p>

                            <p class="text-secondary">

                                Selamat datang di website resmi

                                <strong>
                                    {{ $profil->nama_sekolah ?? 'sekolah kami' }}
                                </strong>.

                            </p>

                            <p class="text-secondary">

                                Website ini menjadi sarana informasi dan
                                komunikasi bagi seluruh warga sekolah,
                                peserta didik, orang tua, guru, dan masyarakat.

                            </p>

                            <p class="text-secondary">

                                Semoga website ini dapat memberikan informasi
                                yang bermanfaat mengenai kegiatan akademik,
                                program keahlian, prestasi, berita, dan berbagai
                                kegiatan sekolah.

                            </p>

                            <p class="text-secondary">

                                Mari bersama-sama membangun pendidikan yang
                                berkualitas, berkarakter, dan mampu menghasilkan
                                lulusan yang kompeten serta siap menghadapi
                                perkembangan teknologi.

                            </p>

                            <p class="text-secondary mb-0">
                                Wassalamualaikum Warahmatullahi Wabarakatuh.
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

                    @if(!empty($profil->foto))

                        <div class="overflow-hidden rounded-4 shadow-sm">

                            <img
                                src="{{ asset('storage/' . $profil->foto) }}"
                                alt="{{ $profil->nama_sekolah ?? 'Foto Sekolah' }}"
                                class="img-fluid w-100"
                                style="height:380px;object-fit:cover;"
                            >

                        </div>

                    @else

                        <div
                            class="rounded-4 bg-primary-subtle d-flex align-items-center justify-content-center"
                            style="height:380px;"
                        >

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


                    @if(!empty($profil->alamat))

                        <div class="d-flex mb-4">

                            <div class="me-3">

                                <div
                                    class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:45px;height:45px;"
                                >

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


                    @if(!empty($profil->kontak))

                        <div class="d-flex mb-4">

                            <div class="me-3">

                                <div
                                    class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:45px;height:45px;"
                                >

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


                    @if(!empty($profil->visi_misi))

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

                    <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll">

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

                                <img
                                    src="{{ asset('storage/' . $item->foto) }}"
                                    alt="{{ $item->nama_jurusan }}"
                                    class="w-100 h-100"
                                    style="object-fit:cover;"
                                >

                            </div>

                        @else

                            <div
                                class="bg-primary-subtle text-primary d-flex align-items-center justify-content-center"
                                style="height:240px;"
                            >

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

                                <a
                                    href="{{ route('program-keahlian') }}"
                                    class="btn btn-primary"
                                >

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

            <a
                href="{{ route('program-keahlian') }}"
                class="btn btn-primary px-4"
            >

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


            @if(isset($guru) && $guru->count() > 0)

                @php
                    $kelompokGuru = $guru->chunk(4);
                @endphp


                <div id="carouselGuru" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">

                        @foreach($kelompokGuru as $index => $kelompok)

                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                                <div class="row g-4 justify-content-center">

                                    @foreach($kelompok as $item)

                                        <div class="col-lg-3 col-md-6">

                                            <div class="card h-100 border-0 shadow-sm overflow-hidden animate-scale">

                                                @if(!empty($item->foto))

                                                    <div class="ratio ratio-4x3">

                                                        <img
                                                            src="{{ asset('gambar/guru/' . $item->foto) }}"
                                                            alt="{{ $item->nama_guru }}"
                                                            class="w-100 h-100 object-fit-cover"
                                                        >

                                                    </div>

                                                @else

                                                    <div class="ratio ratio-4x3 bg-primary-subtle d-flex align-items-center justify-content-center">

                                                        <i class="bi bi-person-fill text-primary display-2"></i>

                                                    </div>

                                                @endif


                                                <div class="card-body text-center p-4">

                                                    <h5 class="fw-bold mb-2">
                                                        {{ $item->nama_guru }}
                                                    </h5>

                                                    @if(!empty($item->jabatan))

                                                        <span class="badge bg-primary-subtle text-primary mb-2">
                                                            {{ $item->jabatan }}
                                                        </span>

                                                    @endif

                                                    @if(!empty($item->mapel))

                                                        <p class="text-muted mb-0">
                                                            {{ $item->mapel }}
                                                        </p>

                                                    @endif

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endforeach

                    </div>


                    @if($kelompokGuru->count() > 1)

                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carouselGuru"
                            data-bs-slide="prev"
                        >

                            <span
                                class="carousel-control-prev-icon bg-primary rounded-circle p-3"
                                aria-hidden="true"
                            ></span>

                            <span class="visually-hidden">
                                Sebelumnya
                            </span>

                        </button>


                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#carouselGuru"
                            data-bs-slide="next"
                        >

                            <span
                                class="carousel-control-next-icon bg-primary rounded-circle p-3"
                                aria-hidden="true"
                            ></span>

                            <span class="visually-hidden">
                                Berikutnya
                            </span>

                        </button>

                    @endif


                    @if($kelompokGuru->count() > 1)

                        <div class="carousel-indicators position-static mt-4 mb-0">

                            @foreach($kelompokGuru as $index => $kelompok)

                                <button
                                    type="button"
                                    data-bs-target="#carouselGuru"
                                    data-bs-slide-to="{{ $index }}"
                                    class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}"
                                ></button>

                            @endforeach

                        </div>

                    @endif

                </div>

            @else

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-people display-3 text-primary"></i>

                        <h4 class="fw-bold mt-3">
                            Data Guru Belum Tersedia
                        </h4>

                        <p class="text-muted mb-0">
                            Informasi tenaga pendidik akan ditampilkan
                            setelah data guru ditambahkan.
                        </p>

                    </div>

                </div>

            @endif


            <div class="text-center mt-4">

                <a
                    href="{{ route('guru.public') }}"
                    class="btn btn-primary"
                >
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

                    <i class="bi bi-stars me-1"></i>

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


            @if(isset($ekstrakulikuler) && $ekstrakulikuler->count())

                <!-- ROW HARUS DI LUAR FOREACH -->
                <div class="row g-4">

                    @foreach($ekstrakulikuler as $item)

                        <div class="col-lg-4 col-md-6">

                            <div class="card h-100 border-0 shadow-sm overflow-hidden animate-scale">

                                <!-- FOTO -->

                                <div
                                    class="bg-light d-flex align-items-center justify-content-center"
                                    style="height:230px;"
                                >

                                    @if($item->gambar)

                                        <img
                                            src="{{ asset('gambar/ekstrakulikuler/' . $item->gambar) }}"
                                            alt="{{ $item->nama_ekskul }}"
                                            class="w-100 h-100"
                                            style="object-fit:cover;"
                                        >

                                    @else

                                        <i
                                            class="bi bi-trophy text-secondary"
                                            style="font-size:75px;"
                                        ></i>

                                    @endif

                                </div>


                                <!-- ISI CARD -->

                                <div class="card-body p-4 d-flex flex-column">

                                    <h5 class="fw-bold mb-3">
                                        {{ $item->nama_ekskul }}
                                    </h5>


                                    @if($item->pembina)

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


                                    @if($item->jadwal_latihan)

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

                                        <a
                                            href="{{ route('ekstrakulikuler.detail', ['id' => $item->getKey()]) }}"
                                            class="btn btn-primary w-100"
                                        >
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

                    <a
                        href="{{ route('ekstrakulikuler.public') }}"
                        class="btn btn-primary px-4 py-2"
                    >
                        Lihat Semua Ekstrakurikuler
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>

            @else

                <div class="text-center py-5">

                    <i
                        class="bi bi-trophy text-muted"
                        style="font-size:70px;"
                    ></i>

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


            @if(isset($prestasi) && $prestasi->count())

                <!-- CARD PRESTASI -->

                <div class="row g-4">

                    @foreach($prestasi as $item)

                        <div class="col-lg-4 col-md-6">

                            <div class="card h-100 border-0 shadow-sm overflow-hidden animate-scale">

                                <!-- FOTO -->

                                <div
                                    class="bg-light d-flex align-items-center justify-content-center"
                                    style="height:230px;"
                                >

                                    @if($item->foto)

                                        <img
                                            src="{{ asset('gambar/prestasi/' . $item->foto) }}"
                                            alt="{{ $item->nama_prestasi }}"
                                            class="w-100 h-100"
                                            style="object-fit:cover;"
                                        >

                                    @else

                                        <i
                                            class="bi bi-award text-primary"
                                            style="font-size:75px;"
                                        ></i>

                                    @endif

                                </div>


                                <!-- ISI CARD -->

                                <div class="card-body p-4">

                                    <!-- BADGE -->

                                    <div class="mb-3">

                                        @if($item->tingkat)

                                            <span class="badge bg-primary me-1">
                                                {{ $item->tingkat }}
                                            </span>

                                        @endif


                                        @if($item->peringkat)

                                            <span class="badge bg-warning text-dark">
                                                {{ $item->peringkat }}
                                            </span>

                                        @endif

                                    </div>


                                    <!-- NAMA PRESTASI -->

                                    <h5 class="fw-bold mb-3">
                                        {{ $item->nama_prestasi }}
                                    </h5>


                                    <!-- SISWA -->

                                    <div class="d-flex align-items-start mb-2">

                                        <i class="bi bi-person-fill text-primary me-2 mt-1"></i>

                                        <div>

                                            <small class="text-muted d-block">
                                                Siswa
                                            </small>

                                            <span class="fw-semibold">
                                                {{ $item->nama_siswa }}
                                            </span>

                                        </div>

                                    </div>


                                    <!-- TAHUN -->

                                    <div class="d-flex align-items-start mb-3">

                                        <i class="bi bi-calendar-event text-primary me-2 mt-1"></i>

                                        <div>

                                            <small class="text-muted d-block">
                                                Tahun Ajaran
                                            </small>

                                            <span>
                                                {{ $item->tahun_ajaran }}
                                            </span>

                                        </div>

                                    </div>


                                    <!-- KETERANGAN -->

                                    @if($item->keterangan)

                                        <p class="text-muted small mb-0">

                                            {{ Str::limit($item->keterangan, 120) }}

                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                <!-- TOMBOL SEMUA PRESTASI -->

                <div class="text-center mt-5">

                    <a
                        href="{{ route('prestasi.public') }}"
                        class="btn btn-primary px-4 py-2"
                    >
                        Lihat Semua Prestasi
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>

            @else

                <div class="text-center py-5">

                    <i
                        class="bi bi-award text-muted"
                        style="font-size:70px;"
                    ></i>

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
        @if(isset($galeri) && $galeri->count())

            <div class="row g-4">

                @foreach($galeri as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="card h-100 border-0 shadow-sm overflow-hidden animate-scale">

                            {{-- Media --}}
                            <div class="position-relative bg-light"
                                 style="height: 240px;">

                                {{-- FOTO --}}
                                @if($item->kategori === 'Foto')

                                    @if(!empty($item->file))

                                        <img
                                            src="{{ asset('gambar/galeri/' . $item->file) }}"
                                            alt="{{ $item->judul }}"
                                            class="w-100 h-100"
                                            style="object-fit: cover;"
                                        >

                                    @else

                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image text-muted"
                                               style="font-size: 70px;"></i>
                                        </div>

                                    @endif


                                {{-- VIDEO --}}
                                @elseif($item->kategori === 'Video')

                                    @if(!empty($item->file))

                                        <video
                                            class="w-100 h-100"
                                            controls
                                            style="object-fit: cover;"
                                        >
                                            <source
                                                src="{{ asset('gambar/galeri/' . $item->file) }}"
                                            >

                                            Browser kamu tidak mendukung video.
                                        </video>

                                    @else

                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-play-circle text-primary"
                                               style="font-size: 70px;"></i>
                                        </div>

                                    @endif

                                @endif


                                {{-- Badge Kategori --}}
                                <div class="position-absolute top-0 start-0 m-3">

                                    @if($item->kategori === 'Foto')

                                        <span class="badge bg-primary">
                                            <i class="bi bi-image me-1"></i>
                                            Foto
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            <i class="bi bi-play-circle me-1"></i>
                                            Video
                                        </span>

                                    @endif

                                </div>

                            </div>


                            {{-- Isi Card --}}
                            <div class="card-body p-4">

                                {{-- Judul --}}
                                <h5 class="fw-bold mb-2">
                                    {{ $item->judul }}
                                </h5>


                                {{-- Keterangan --}}
                                @if(!empty($item->keterangan))

                                    <p class="text-muted mb-3">
                                        {{ Str::limit(strip_tags($item->keterangan), 100, '...') }}
                                    </p>

                                @endif


                                {{-- Tanggal --}}
                                @if(!empty($item->tanggal))

                                    <small class="text-muted">

                                        <i class="bi bi-calendar-event text-primary me-1"></i>

                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                                    </small>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


        {{-- Jika Belum Ada Data --}}
        @else

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center py-5">

                    <i class="bi bi-images text-muted"
                       style="font-size: 70px;"></i>

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

                            @if(!empty($berita->gambar))

                                <img
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                    alt="{{ $berita->judul }}"
                                    class="w-100"
                                    style="height:300px;object-fit:cover;"
                                >

                            @else

                                <div
                                    class="bg-primary-subtle text-primary d-flex align-items-center justify-content-center"
                                    style="height:300px;"
                                >

                                    <i
                                        class="bi bi-newspaper"
                                        style="font-size:70px;"
                                    ></i>

                                </div>

                            @endif


                            <!-- OVERLAY -->

                            <div
                                class="card-img-overlay d-flex flex-column justify-content-end p-4"
                                style="background:linear-gradient(transparent 20%, rgba(0,60,150,0.9));"
                            >

                                <h4 class="card-title fw-bold mb-2">
                                    {{ $berita->judul }}
                                </h4>

                                <p class="card-text small mb-3">

                                    {{ Str::limit(strip_tags($berita->isi), 100) }}

                                </p>

                                <div>

                                    <a
                                        href="{{ route('berita.detail', $berita->id_berita) }}"
                                        class="btn btn-primary"
                                    >
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

                <a
                    href="{{ route('berita.public') }}"
                    class="btn btn-primary"
                >
                    Lihat Semua Berita
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>

    </section>


@endsection
