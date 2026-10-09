@extends('template-landing')

@section('title', 'Profil Sekolah')

@section('content')

<div class="bg-light py-5">

    <div class="container">

        @if($profil)

            {{-- ===================================================== --}}
            {{-- INFORMASI SEKOLAH --}}
            {{-- ===================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4 p-lg-5">

                    <div class="row align-items-center g-4">

                        {{-- LOGO --}}
                        <div class="col-md-3 text-center">

                            @if($profil->logo)

                                <img
                                    src="{{ asset('storage/' . $profil->logo) }}"
                                    alt="Logo {{ $profil->nama_sekolah }}"
                                    class="img-fluid"
                                    style="
                                        width:150px;
                                        height:150px;
                                        object-fit:contain;
                                    "
                                >

                            @else

                                <div
                                    class="d-flex align-items-center justify-content-center mx-auto bg-light rounded"
                                    style="
                                        width:150px;
                                        height:150px;
                                    "
                                >

                                    <i
                                        class="bi bi-building text-secondary"
                                        style="font-size:70px;"
                                    ></i>

                                </div>

                            @endif

                        </div>


                        {{-- INFORMASI --}}
                        <div class="col-md-9">

                            <h2 class="fw-bold mb-4">
                                Informasi Sekolah
                            </h2>

                            <div class="row g-4">

                                {{-- NPSN --}}
                                <div class="col-md-6">

                                    <small class="text-muted d-block">
                                        NPSN
                                    </small>

                                    <strong>
                                        {{ $profil->npsn ?? '-' }}
                                    </strong>

                                </div>


                                {{-- TAHUN BERDIRI --}}
                                <div class="col-md-6">

                                    <small class="text-muted d-block">
                                        Tahun Berdiri
                                    </small>

                                    <strong>
                                        {{ $profil->tahun_berdiri ?? '-' }}
                                    </strong>

                                </div>


                                {{-- KONTAK --}}
                                <div class="col-md-6">

                                    <small class="text-muted d-block">
                                        Kontak
                                    </small>

                                    <strong>
                                        {{ $profil->kontak ?? '-' }}
                                    </strong>

                                </div>


                                {{-- KEPALA SEKOLAH --}}
                                <div class="col-md-6">

                                    <small class="text-muted d-block">
                                        Kepala Sekolah
                                    </small>

                                    <strong>
                                        {{ $profil->kepala_sekolah ?? '-' }}
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- ALAMAT --}}
            {{-- ===================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4 p-lg-5">

                    <h4 class="fw-bold mb-4">
                        Alamat
                    </h4>

                    <p class="text-muted mb-0 lh-lg">

                        {{ $profil->alamat ?? '-' }}

                    </p>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- TENTANG / DESKRIPSI SEKOLAH --}}
            {{-- ===================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4 p-lg-5">

                    <h4 class="fw-bold mb-4">
                        Tentang Sekolah
                    </h4>

                    @if($profil->deskripsi)

                        <div class="text-muted lh-lg">

                            {!! nl2br(e($profil->deskripsi)) !!}

                        </div>

                    @else

                        <p class="text-muted mb-0">
                            Deskripsi sekolah belum tersedia.
                        </p>

                    @endif

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- VISI & MISI --}}
            {{-- ===================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4 p-lg-5">

                    <h4 class="fw-bold mb-4">
                        Visi & Misi
                    </h4>

                    @if($profil->visi_misi)

                        <div class="text-muted lh-lg">

                            {!! nl2br(e($profil->visi_misi)) !!}

                        </div>

                    @else

                        <p class="text-muted mb-0">
                            Visi dan misi sekolah belum tersedia.
                        </p>

                    @endif

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- KEPALA SEKOLAH --}}
            {{-- ===================================================== --}}

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-lg-5">

                    <h4 class="fw-bold mb-4">
                        Kepala Sekolah
                    </h4>

                    <div class="row align-items-center g-4">

                        {{-- FOTO --}}
                        <div class="col-md-3 text-center">

                            @if($profil->foto_kepala_sekolah)

                                <img
                                    src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                                    alt="{{ $profil->kepala_sekolah }}"
                                    class="rounded-circle border shadow-sm"
                                    style="
                                        width:180px;
                                        height:180px;
                                        object-fit:cover;
                                    "
                                >

                            @else

                                <div
                                    class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto"
                                    style="
                                        width:180px;
                                        height:180px;
                                    "
                                >

                                    <i
                                        class="bi bi-person text-secondary"
                                        style="font-size:75px;"
                                    ></i>

                                </div>

                            @endif

                        </div>


                        {{-- NAMA --}}
                        <div class="col-md-9">

                            <span class="badge bg-primary-subtle text-primary mb-3">
                                Kepala Sekolah
                            </span>

                            <h3 class="fw-bold mb-2">

                                {{ $profil->kepala_sekolah ?? '-' }}

                            </h3>

                            <p class="text-muted mb-0">

                                Kepala Sekolah
                                {{ $profil->nama_sekolah ?? '' }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        @else

            {{-- ===================================================== --}}
            {{-- JIKA DATA PROFIL BELUM ADA --}}
            {{-- ===================================================== --}}

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center py-5">

                    <i
                        class="bi bi-building text-muted"
                        style="font-size:70px;"
                    ></i>

                    <h4 class="fw-bold mt-3">
                        Profil Sekolah Belum Tersedia
                    </h4>

                    <p class="text-muted mb-0">
                        Informasi profil sekolah belum tersedia.
                    </p>

                </div>

            </div>

        @endif

    </div>

</div>

@endsection
