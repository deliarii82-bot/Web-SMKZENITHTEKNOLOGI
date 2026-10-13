@extends('template-landing')

@section('title', 'Data Guru')

@section('content')

    {{-- HEADER --}}
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center">
                <span class="badge bg-primary rounded-pill px-3 py-2">
                    <i class="bi bi-people me-1"></i>
                    Data Guru
                </span>

                <h1 class="fw-bold mt-3 mb-2">Data Guru</h1>

                <p class="text-muted mb-0">
                    Tenaga pendidik
                    {{ $profil->nama_sekolah ?? 'sekolah kami' }}
                </p>
            </div>
        </div>
    </section>

    {{-- SEMUA GURU --}}
    <section class="py-5">
        <div class="container">

            @if ($guru->count())

                @php
                    $guruChunks = $guru->chunk(6);
                @endphp

                <div class="position-relative">
                    <div id="guruCarousel" class="carousel slide" data-bs-ride="false">

                        <div class="carousel-inner">
                            @foreach ($guruChunks as $chunkIndex => $guruChunk)
                                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                                    <div class="row g-4 justify-content-center">
                                        @foreach ($guruChunk as $item)
                                            {{-- KOLOM KARTU --}}
                                            <div class="col-12 col-sm-6 col-lg-4 col-xl-2">
                                                <div class="card h-100 border shadow-sm">

                                                    {{-- FOTO --}}
                                                    <div class="bg-light" style="height:225px; overflow:hidden;">
                                                        @if ($item->foto)
                                                            <img src="{{ asset('gambar/guru/' . $item->foto) }}"
                                                                alt="{{ $item->nama_guru }}" class="w-100 h-100"
                                                                style="object-fit:cover;" loading="lazy">
                                                        @else
                                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                                <i class="bi bi-person-circle text-secondary"
                                                                    style="font-size:80px;"></i>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    {{-- DATA KARTU --}}
                                                    <div class="card-body p-3 d-flex flex-column">

                                                        {{-- NAMA GURU --}}
                                                        <div class="mb-2" style="min-height: 32px;">
                                                            <h6 class="fw-bold mb-0">
                                                                {{ $item->nama_guru }}
                                                            </h6>
                                                        </div>

                                                        {{-- NIP --}}
                                                        <p class="text-muted small mb-1">
                                                            <i class="bi bi-person-vcard me-1"></i>
                                                            NIP: {{ $item->nip ?: '-' }}
                                                        </p>

                                                        {{-- JABATAN --}}
                                                        <div class="mb-3">
                                                            <span class="badge bg-primary-subtle text-primary">
                                                                {{ $item->jabatan ?: 'Tenaga Pendidik' }}
                                                            </span>
                                                        </div>

                                                        {{-- TOMBOL DETAIL (Diberi z-index 10 agar bisa diklik) --}}
                                                        <button type="button" class="btn btn-primary btn-sm w-100 mt-auto position-relative"
                                                            style="z-index: 10;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#detailGuru{{ $item->id_guru }}">
                                                            <i class="bi bi-person-lines-fill me-1"></i>
                                                            Lihat Detail
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- NAVIGASI CAROUSEL --}}
                        @if ($guruChunks->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#guruCarousel"
                                data-bs-slide="prev" style="width: 45px; left: -25px;">
                                <span class="carousel-control-prev-icon bg-primary rounded-circle p-3"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Sebelumnya</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#guruCarousel"
                                data-bs-slide="next" style="width: 45px; right: -25px;">
                                <span class="carousel-control-next-icon bg-primary rounded-circle p-3"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Berikutnya</span>
                            </button>
                        @endif

                    </div>
                </div>

                {{-- JUMLAH GURU --}}
                <div class="text-center mt-4">
                    <p class="text-muted mb-0">
                        Menampilkan <strong>{{ $guru->count() }}</strong> guru
                    </p>
                </div>

                {{-- MODAL POP UP DETAIL GURU --}}
                @foreach ($guru as $item)
                    <div class="modal fade" id="detailGuru{{ $item->id_guru }}" tabindex="-1"
                        aria-labelledby="judulGuru{{ $item->id_guru }}" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                {{-- Header modal --}}
                                <div class="modal-header">
                                    <h5 class="modal-title" id="namaGuru{{ $item->id_guru }}">
                                        Detail Guru
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>

                                {{-- Isi modal --}}
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        @if ($item->foto)
                                            <img src="{{ asset('gambar/guru/' . $item->foto) }}"
                                                alt="{{ $item->nama_guru }}" class="rounded mb-3"
                                                style="width:130px;height:150px;object-fit:cover;">
                                        @else
                                            <div class="mb-3">
                                                <i class="bi bi-person-circle text-secondary" style="font-size:100px;"></i>
                                            </div>
                                        @endif

                                        <h5 class="fw-bold mb-2">
                                            {{ $item->nama_guru }}
                                        </h5>

                                        <span class="badge bg-primary-subtle text-primary">
                                            {{ $item->jabatan ?: 'Tenaga Pendidik' }}
                                        </span>
                                    </div>

                                    <hr>

                                    <div class="mb-3">
                                        <div class="fw-semibold mb-1">
                                            <i class="bi bi-person-vcard me-2 text-primary"></i>
                                            Nomor Induk Pegawai (NIP)
                                        </div>
                                        <p class="text-muted mb-0">
                                            {{ $item->nip ?: '-' }}
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <div class="fw-semibold mb-1">
                                            <i class="bi bi-book me-2 text-primary"></i>
                                            Mata Pelajaran
                                        </div>
                                        <p class="text-muted mb-0">
                                            {{ $item->mapel ?: '-' }}
                                        </p>
                                    </div>
                                </div>

                                {{-- Footer modal --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Tutup
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            @else
                {{-- JIKA BELUM ADA GURU --}}
                <div class="text-center py-5">
                    <i class="bi bi-people text-muted" style="font-size:70px;"></i>
                    <h4 class="fw-bold mt-3">Belum Ada Data Guru</h4>
                    <p class="text-muted mb-0">
                        Data guru belum tersedia.
                    </p>
                </div>
            @endif

        </div>
    </section>

@endsection
