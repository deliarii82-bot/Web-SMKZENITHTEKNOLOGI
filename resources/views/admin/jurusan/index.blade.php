@extends('template')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Program Keahlian</h3>
            <p class="text-muted mb-0">
                Data program keahlian sekolah
            </p>
        </div>

        @if(auth()->user()->role == 'Admin')
            <a href="{{ route('jurusan.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Program Keahlian
            </a>
        @endif
    </div>


    <div class="row g-4">

        @forelse($jurusans as $jurusan)

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    @if($jurusan->foto)

                        <img
                            src="{{ asset('storage/' . $jurusan->foto) }}"
                            class="card-img-top"
                            style="height: 200px; object-fit: cover;"
                            alt="{{ $jurusan->nama_jurusan }}">

                    @else

                        <div
                            class="bg-light d-flex align-items-center justify-content-center"
                            style="height: 200px;">

                            <i class="bi bi-book fs-1 text-secondary"></i>

                        </div>

                    @endif


                    <div class="card-body">

                        <h5 class="fw-bold mb-1">
                            {{ $jurusan->nama_jurusan }}
                        </h5>

                        <p class="text-primary fw-semibold mb-2">
                            {{ $jurusan->singkatan }}
                        </p>

                        <p class="text-muted mb-3">
                            {{ $jurusan->deskripsi }}
                        </p>


                        @if(auth()->user()->role == 'Admin')

                            <a
                                href="{{ route('jurusan.edit', $jurusan->id_jurusan) }}"
                                class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil"></i>
                                Edit

                            </a>


                            <form
                                action="{{ route('jurusan.destroy', $jurusan->id_jurusan) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm">

                                    <i class="bi bi-trash"></i>
                                    Hapus

                                </button>

                            </form>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-book fs-1 text-secondary"></i>

                        <h5 class="mt-3">
                            Belum ada program keahlian
                        </h5>

                        <p class="text-muted">
                            Silakan tambahkan program keahlian terlebih dahulu.
                        </p>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection
