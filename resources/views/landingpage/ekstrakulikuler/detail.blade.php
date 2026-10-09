@extends('template-landing')

@section('title', $ekstrakulikuler->nama_ekskul)

@section('content')

<section class="py-5 bg-light">

    <div class="container py-4">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card border-0 shadow-sm overflow-hidden">

                    <!-- GAMBAR -->
                    @if(!empty($ekstrakulikuler->gambar))

                        <div style="height:450px; background:#f1f3f5;">

                            <img
                                src="{{ asset('gambar/ekstrakulikuler/' . $ekstrakulikuler->gambar) }}"
                                alt="{{ $ekstrakulikuler->nama_ekskul }}"
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
                                class="bi bi-trophy text-secondary"
                                style="font-size:90px;"
                            ></i>

                        </div>

                    @endif


                    <!-- CONTENT -->
                    <div class="card-body p-4 p-lg-5">

                        <h1 class="fw-bold mb-4">
                            {{ $ekstrakulikuler->nama_ekskul }}
                        </h1>


                        <!-- PEMBINA -->
                        @if(!empty($ekstrakulikuler->pembina))

                            <div class="d-flex align-items-start mb-4">

                                <i
                                    class="bi bi-person-badge text-primary fs-4 me-3"
                                ></i>

                                <div>

                                    <small class="text-muted d-block">
                                        Pembina
                                    </small>

                                    <strong>
                                        {{ $ekstrakulikuler->pembina }}
                                    </strong>

                                </div>

                            </div>

                        @endif


                        <!-- JADWAL -->
                        @if(!empty($ekstrakulikuler->jadwal_latihan))

                            <div class="d-flex align-items-start mb-4">

                                <i
                                    class="bi bi-calendar-event text-primary fs-4 me-3"
                                ></i>

                                <div>

                                    <small class="text-muted d-block">
                                        Jadwal Latihan
                                    </small>

                                    <strong>
                                        {{ $ekstrakulikuler->jadwal_latihan }}
                                    </strong>

                                </div>

                            </div>

                        @endif


                        <!-- DESKRIPSI -->
                        <div class="mt-4">

                            <h4 class="fw-bold mb-3">
                                Tentang Ekstrakurikuler
                            </h4>

                            @if(!empty($ekstrakulikuler->deskripsi))

                                <div
                                    class="text-secondary"
                                    style="line-height:1.9; font-size:16px;"
                                >

                                    {!! nl2br(e($ekstrakulikuler->deskripsi)) !!}

                                </div>

                            @else

                                <p class="text-muted mb-0">
                                    Deskripsi ekstrakurikuler belum tersedia.
                                </p>

                            @endif

                        </div>


                        <!-- KEMBALI -->
                        <div class="mt-5 pt-4 border-top">

                            <a
                                href="{{ route('ekstrakulikuler.public') }}"
                                class="btn btn-outline-primary"
                            >

                                <i class="bi bi-arrow-left me-2"></i>

                                Kembali ke Ekstrakurikuler

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
