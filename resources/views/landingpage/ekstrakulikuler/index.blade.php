@extends('template-landing')

@section('title', 'Ekstrakurikuler')

@section('content')

<!-- HEADER -->
<section class="py-5 bg-light">
    <div class="container py-4">

        <div class="text-center">

            <span class="badge bg-primary rounded-pill px-3 py-2">
                <i class="bi bi-trophy me-1"></i>
                Kegiatan Sekolah
            </span>

            <h1 class="fw-bold mt-3 mb-2">
                Ekstrakurikuler
            </h1>

            <p class="text-muted mb-0">
                Berbagai kegiatan ekstrakurikuler di
                {{ $profil->nama_sekolah ?? 'sekolah kami' }}
            </p>

        </div>

    </div>
</section>


<!-- DAFTAR EKSTRAKURIKULER -->
<section class="py-5">

    <div class="container">

        @if($ekstrakulikuler->count() > 0)

            <div class="row g-4">

                @foreach($ekstrakulikuler as $item)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 border-0 shadow-sm overflow-hidden">

                            <!-- GAMBAR -->
                            <div
                                class="bg-light d-flex align-items-center justify-content-center"
                                style="height:230px;"
                            >

                                @if(!empty($item->gambar))

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


                                <!-- PEMBINA -->
                                @if(!empty($item->pembina))

                                    <div class="d-flex align-items-start mb-2">

                                        <i
                                            class="bi bi-person-badge text-primary me-2 mt-1"
                                        ></i>

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


                                <!-- JADWAL -->
                                @if(!empty($item->jadwal_latihan))

                                    <div class="d-flex align-items-start mb-3">

                                        <i
                                            class="bi bi-calendar-event text-primary me-2 mt-1"
                                        ></i>

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


                                <!-- DESKRIPSI -->
                                @if(!empty($item->deskripsi))

                                    <p class="text-muted mb-4">

                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($item->deskripsi),
                                            120
                                        ) }}

                                    </p>

                                @endif


                                <!-- BUTTON -->
                                <div class="mt-auto">

                                    <a
                                        href="{{ route('ekstrakulikuler.detail', ['id' => $item->id]) }}"
                                        class="btn btn-primary"
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

        @else

            <!-- DATA KOSONG -->
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

@endsection
