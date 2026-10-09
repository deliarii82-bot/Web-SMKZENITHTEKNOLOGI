@extends('template')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                Data Prestasi
            </h4>

            <p class="text-muted mb-0">
                Kelola data prestasi siswa
            </p>
        </div>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif


    {{-- CARD PRESTASI --}}
    <div class="row g-4">

        @forelse($prestasi as $item)

            <div class="col-xl-4 col-md-6">

                <div class="card border-0 shadow-sm h-100 overflow-hidden">

                    {{-- FOTO --}}
                    @if($item->foto)

                        <img
                            src="{{ asset('gambar/prestasi/' . $item->foto) }}"
                            alt="{{ $item->nama_prestasi }}"
                            class="card-img-top"
                            style="
                                height: 220px;
                                object-fit: cover;
                            "
                        >

                    @else

                        <div
                            class="bg-light d-flex align-items-center justify-content-center"
                            style="height:220px;"
                        >
                            <i
                                class="bi bi-trophy text-muted"
                                style="font-size:70px;"
                            ></i>
                        </div>

                    @endif


                    {{-- ISI CARD --}}
                    <div class="card-body">

                        {{-- TINGKAT --}}
                        <div class="mb-2">

                            <span class="badge bg-primary">
                                {{ $item->tingkat }}
                            </span>

                            <span class="badge bg-warning text-dark">
                                {{ $item->peringkat }}
                            </span>

                        </div>


                        {{-- NAMA PRESTASI --}}
                        <h5 class="fw-bold mb-2">
                            {{ $item->nama_prestasi }}
                        </h5>


                        {{-- NAMA SISWA --}}
                        <p class="mb-2">

                            <i class="bi bi-person-fill text-primary me-1"></i>

                            <strong>
                                {{ $item->nama_siswa }}
                            </strong>

                        </p>


                        {{-- TAHUN AJARAN --}}
                        <p class="text-muted mb-2">

                            <i class="bi bi-calendar3 me-1"></i>

                            Tahun Ajaran:
                            <strong>
                                {{ $item->tahun_ajaran }}
                            </strong>

                        </p>


                        {{-- KETERANGAN --}}
                        @if($item->keterangan)

                            <p class="text-muted small mb-0">
                                {{ $item->keterangan }}
                            </p>

                        @endif

                    </div>


                    {{-- FOOTER CARD --}}
                    <div class="card-footer bg-white border-0 pt-0 pb-3 px-3">

                        <div class="d-flex gap-2">

                            {{-- EDIT --}}
                            <a
                                href="{{ route('prestasi.edit', $item->id) }}"
                                class="btn btn-warning btn-sm flex-fill"
                            >
                                <i class="bi bi-pencil me-1"></i>
                                Edit
                            </a>


                            {{-- HAPUS --}}
                            <form
                                action="{{ route('prestasi.destroy', $item->id) }}"
                                method="POST"
                                class="flex-fill"
                                onsubmit="return confirm('Yakin ingin menghapus data prestasi ini?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm w-100"
                                >
                                    <i class="bi bi-trash me-1"></i>
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            {{-- DATA KOSONG --}}
            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i
                            class="bi bi-trophy text-muted"
                            style="font-size:70px;"
                        ></i>

                        <h5 class="mt-3 mb-1">
                            Belum Ada Data Prestasi
                        </h5>

                        <p class="text-muted mb-3">
                            Silakan tambahkan data prestasi siswa.
                        </p>

                        <a
                            href="{{ route('prestasi.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-plus-lg me-1"></i>
                            Tambah Prestasi
                        </a>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection
