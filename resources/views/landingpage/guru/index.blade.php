@extends('template-landing')

@section('title', 'Data Guru')

@section('content')

<!-- ===================================================== -->
<!-- HEADER -->
<!-- ===================================================== -->

<section class="py-5 bg-light">

    <div class="container py-4">

        <div class="text-center">

            <span class="badge bg-primary rounded-pill px-3 py-2">

                <i class="bi bi-people me-1"></i>

                Data Guru

            </span>

            <h1 class="fw-bold mt-3 mb-2">

                Data Guru

            </h1>

            <p class="text-muted mb-0">

                Tenaga pendidik
                {{ $profil->nama_sekolah ?? 'sekolah kami' }}

            </p>

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- SEMUA GURU -->
<!-- ===================================================== -->

<section class="py-5">

    <div class="container">

        @if($guru->count())

            @php
                $guruChunks = $guru->chunk(10);
            @endphp


            <!-- ================================================= -->
            <!-- CAROUSEL -->
            <!-- ================================================= -->

            <div
                id="guruCarousel"
                class="carousel slide"
                data-bs-ride="false"
            >

                <div class="carousel-inner">

                    @foreach($guruChunks as $chunkIndex => $guruChunk)

                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">

                            <div class="row g-4">

                                @foreach($guruChunk as $item)

                                    <div class="col-12 col-sm-6 col-lg-4 col-xl-2">

                                        <div class="card h-100 border shadow-sm">

                                            {{-- FOTO --}}
                                            <div
                                                class="bg-light"
                                                style="
                                                    height:260px;
                                                    overflow:hidden;
                                                "
                                            >

                                                @if($item->foto)

                                                    <img
                                                        src="{{ asset('gambar/guru/' . $item->foto) }}"
                                                        alt="{{ $item->nama_guru }}"
                                                        class="w-100 h-100"
                                                        style="object-fit:cover;"
                                                    >

                                                @else

                                                    <div
                                                        class="w-100 h-100 d-flex align-items-center justify-content-center"
                                                    >

                                                        <i
                                                            class="bi bi-person-circle text-secondary"
                                                            style="font-size:80px;"
                                                        ></i>

                                                    </div>

                                                @endif

                                            </div>


                                            {{-- DATA GURU --}}
                                            <div class="card-body p-3">

                                                <h6 class="fw-bold mb-2">

                                                    {{ $item->nama_guru }}

                                                </h6>


                                                @if($item->nip)

                                                    <p class="text-muted small mb-2">

                                                        <i class="bi bi-person-vcard me-1"></i>

                                                        NIP: {{ $item->nip }}

                                                    </p>

                                                @endif


                                                @if($item->mapel)

                                                    <p class="text-muted small mb-2">

                                                        <i class="bi bi-book me-1"></i>

                                                        {{ $item->mapel }}

                                                    </p>

                                                @endif


                                                @if($item->jabatan)

                                                    <span class="badge bg-primary-subtle text-primary">

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


                {{-- TOMBOL SEBELUMNYA --}}
                @if($guruChunks->count() > 1)

                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#guruCarousel"
                        data-bs-slide="prev"
                        style="width:50px;"
                    >

                        <span
                            class="carousel-control-prev-icon bg-primary rounded-circle p-3"
                            aria-hidden="true"
                        ></span>

                        <span class="visually-hidden">
                            Sebelumnya
                        </span>

                    </button>


                    {{-- TOMBOL BERIKUTNYA --}}
                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#guruCarousel"
                        data-bs-slide="next"
                        style="width:50px;"
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

            </div>


            {{-- JUMLAH DATA --}}
            <div class="text-center mt-4">

                <p class="text-muted mb-0">

                    Menampilkan
                    <strong>{{ $guru->count() }}</strong>
                    guru

                </p>

            </div>


        @else

            <!-- ================================================= -->
            <!-- JIKA BELUM ADA GURU -->
            <!-- ================================================= -->

            <div class="text-center py-5">

                <i
                    class="bi bi-people text-muted"
                    style="font-size:70px;"
                ></i>

                <h4 class="fw-bold mt-3">

                    Belum Ada Data Guru

                </h4>

                <p class="text-muted mb-0">

                    Data guru belum tersedia.

                </p>

            </div>

        @endif

    </div>

</section>

@endsection
