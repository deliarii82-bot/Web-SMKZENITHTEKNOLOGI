@extends('template-landing')

@section('title', 'Program Keahlian')

@section('content')

<!-- ===================================================== -->
<!-- HEADER -->
<!-- ===================================================== -->

<section class="py-5 bg-light">

    <div class="container py-4">

        <div class="text-center">

            <span class="badge bg-primary rounded-pill px-3 py-2">

                <i class="bi bi-mortarboard me-1"></i>

                Program Keahlian

            </span>

            <h1 class="fw-bold mt-3 mb-2">

                Program Keahlian

            </h1>

            <p class="text-muted mb-0">

                Pilihan program keahlian yang tersedia
                di {{ $profil->nama_sekolah ?? 'sekolah kami' }}

            </p>

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- SEMUA PROGRAM KEAHLIAN -->
<!-- ===================================================== -->

<section class="py-5">

    <div class="container">

        @if($jurusans->count())

            <div class="row g-4">

                @foreach($jurusans as $jurusan)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 border shadow-sm overflow-hidden">

                            {{-- FOTO JURUSAN --}}
                            <div
                                style="
                                    height:220px;
                                    background:#f1f3f5;
                                "
                            >

                                @if($jurusan->foto)

                                    <img
                                        src="{{ asset('storage/' . $jurusan->foto) }}"
                                        alt="{{ $jurusan->nama_jurusan }}"
                                        class="w-100 h-100"
                                        style="object-fit:cover;"
                                    >

                                @else

                                    <div
                                        class="h-100 d-flex align-items-center justify-content-center"
                                    >

                                        <i
                                            class="bi bi-mortarboard text-secondary"
                                            style="font-size:70px;"
                                        ></i>

                                    </div>

                                @endif

                            </div>


                            {{-- ISI CARD --}}
                            <div class="card-body p-4">

                                <span class="badge bg-primary-subtle text-primary mb-3">

                                    {{ $jurusan->singkatan }}

                                </span>

                                <h4 class="fw-bold mb-3">

                                    {{ $jurusan->nama_jurusan }}

                                </h4>

                                @if($jurusan->deskripsi)

                                    <p class="text-muted mb-0">

                                        {{ $jurusan->deskripsi }}

                                    </p>

                                @else

                                    <p class="text-muted mb-0">

                                        Informasi program keahlian
                                        belum tersedia.

                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-5">

                <i
                    class="bi bi-mortarboard text-muted"
                    style="font-size:70px;"
                ></i>

                <h4 class="fw-bold mt-3">

                    Belum Ada Program Keahlian

                </h4>

                <p class="text-muted mb-0">

                    Data program keahlian belum tersedia.

                </p>

            </div>

        @endif

    </div>

</section>

@endsection
