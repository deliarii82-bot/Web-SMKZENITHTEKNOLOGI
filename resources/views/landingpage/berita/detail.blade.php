@extends('template-landing')

@section('title', $berita->judul)

@section('content')

<section class="py-5 bg-light">

    <div class="container py-4">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card border-0 shadow-sm overflow-hidden">

                    {{-- FOTO BERITA --}}
                    @if($berita->gambar)

                        <div
                            style="
                                height:450px;
                                background:#f1f3f5;
                            "
                        >

                            <img
                                src="{{ asset('storage/' . $berita->gambar) }}"
                                alt="{{ $berita->judul }}"
                                class="w-100 h-100"
                                style="object-fit:cover;"
                            >

                        </div>

                    @else

                        <div
                            class="d-flex align-items-center justify-content-center bg-light"
                            style="height:300px;"
                        >

                            <i
                                class="bi bi-newspaper text-secondary"
                                style="font-size:90px;"
                            ></i>

                        </div>

                    @endif


                    {{-- ISI DETAIL --}}
                    <div class="card-body p-4 p-lg-5">

                        {{-- TANGGAL --}}
                        <div class="mb-3">

                            <span class="text-muted">

                                <i class="bi bi-calendar3 me-1"></i>

                                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}

                            </span>

                        </div>


                        {{-- JUDUL --}}
                        <h1 class="fw-bold mb-4">

                            {{ $berita->judul }}

                        </h1>


                        {{-- ISI BERITA --}}
                        <div
                            class="text-secondary"
                            style="
                                line-height:1.9;
                                font-size:16px;
                            "
                        >

                            {!! nl2br(e($berita->isi)) !!}

                        </div>


                        {{-- TOMBOL KEMBALI --}}
                        <div class="mt-5 pt-4 border-top">

                            <a
                                href="{{ route('berita.public') }}"
                                class="btn btn-outline-primary"
                            >

                                <i class="bi bi-arrow-left me-2"></i>

                                Kembali ke Berita

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
