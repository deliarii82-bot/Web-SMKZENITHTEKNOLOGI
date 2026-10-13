@extends('template-landing')

@section('title', 'Berita')

@section('content')

    <section class="py-5 bg-light">

        <div class="container py-4">

            {{-- HEADER --}}
            <div class="text-center">

                <span class="badge bg-primary rounded-pill px-3 py-2">
                    <i class="bi bi-newspaper me-1"></i>
                    Informasi Sekolah
                </span>

                <h1 class="fw-bold mt-3 mb-2">
                    Berita Terbaru
                </h1>

                <p class="text-muted mb-0">
                    Ikuti perkembangan dan kegiatan terbaru di
                    {{ $profil->nama_sekolah ?? 'sekolah kami' }}
                </p>

            </div>

        </div>

    </section>


    <section class="py-5">

        <div class="container">

            @if ($berita->count())

                <div class="row g-4">

                    @foreach ($berita as $item)
                        <div class="col-md-6 col-lg-4">

                            <div class="card h-100 border-0 shadow-sm overflow-hidden">

                                {{-- FOTO BERITA --}}
                                <div
                                    style="
                                    height:230px;
                                    background:#f1f3f5;
                                ">

                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                            class="w-100 h-100" style="object-fit:cover;">
                                    @else
                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center">

                                            <i class="bi bi-newspaper text-secondary" style="font-size:70px;"></i>

                                        </div>
                                    @endif

                                </div>


                                {{-- ISI CARD --}}
                                <div class="card-body p-4 d-flex flex-column">

                                    {{-- TANGGAL --}}
                                    <small class="text-muted mb-2">

                                        <i class="bi bi-calendar3 me-1"></i>

                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                                    </small>


                                    {{-- JUDUL --}}
                                    <h5 class="fw-bold mb-3">

                                        {{ $item->judul }}

                                    </h5>


                                    {{-- RINGKASAN --}}
                                    <p class="text-muted mb-4">

                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 150) }}

                                    </p>


                                    {{-- TOMBOL --}}
                                    <div class="mt-auto">


                                        <a href="{{ route('berita.detail', $item->id ?? $item->getKey()) }}"
                                            class="btn btn-primary">
                                            Baca Selengkapnya
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            @else
                {{-- JIKA BELUM ADA BERITA --}}
                <div class="text-center py-5">

                    <i class="bi bi-newspaper text-muted" style="font-size:70px;"></i>

                    <h4 class="fw-bold mt-3">
                        Belum Ada Berita
                    </h4>

                    <p class="text-muted mb-0">
                        Berita dan kegiatan sekolah belum tersedia.
                    </p>

                </div>

            @endif

        </div>

    </section>

@endsection
