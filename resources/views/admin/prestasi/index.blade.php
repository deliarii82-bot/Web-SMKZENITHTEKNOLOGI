@extends('template')

@section('content')
    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Data Prestasi</h4>
                <p class="text-muted mb-0">Kelola data prestasi siswa</p>
            </div>
            {{-- TOMBOL TAMBAH DIPINDAH KESINI AGAR SELALU MUNCUL --}}
            <a href="{{ route('prestasi.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Prestasi
            </a>
        </div>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        {{-- FILTER PENCARIAN --}}
        <form action="{{ route('prestasi.index') }}" method="GET" class="row g-2 mb-4">

            <div class="col-md-5">
                <input type="text" name="search" class="form-control"
                    placeholder="Cari nama prestasi atau nama siswa..." value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <select name="tingkat" class="form-select">
                    <option value="">Semua Tingkat</option>

                    @foreach ($daftarTingkat as $itemTingkat)
                        <option value="{{ $itemTingkat }}" {{ request('tingkat') == $itemTingkat ? 'selected' : '' }}>
                            {{ $itemTingkat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search me-1"></i> Cari
                </button>

                <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">
                    Reset
                </a>
            </div>

        </form>

        {{-- CARD PRESTASI --}}
        <div class="row g-4">

            @forelse($prestasi as $item)
                <div class="col-xl-4 col-md-6">

                    <div class="card border-0 shadow-sm h-100 overflow-hidden">

                        {{-- FOTO --}}
                        @if ($item->foto && file_exists(public_path('gambar/prestasi/' . $item->foto)))
                            <img src="{{ asset('gambar/prestasi/' . $item->foto) }}" alt="{{ $item->nama_prestasi }}"
                                class="card-img-top" style="height: 220px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                                <i class="bi bi-trophy text-muted" style="font-size: 70px;">
                                </i>
                            </div>
                        @endif

                        {{-- ISI CARD --}}
                        <div class="card-body">

                            <div class="mb-2">
                                <span class="badge bg-primary">
                                    {{ $item->tingkat }}
                                </span>

                                <span class="badge bg-warning text-dark">
                                    {{ $item->peringkat }}
                                </span>
                            </div>

                            <h5 class="fw-bold mb-2">
                                {{ $item->nama_prestasi }}
                            </h5>

                            <p class="mb-2">
                                <i class="bi bi-person-fill text-primary me-1"></i>
                                <strong>{{ $item->nama_siswa }}</strong>
                            </p>

                            <p class="text-muted mb-2">
                                <i class="bi bi-calendar3 me-1"></i>
                                Tahun Ajaran:
                                <strong>{{ $item->tahun_ajaran }}</strong>
                            </p>

                            @if ($item->keterangan)
                                <p class="text-muted small mb-0">
                                    {{ $item->keterangan }}
                                </p>
                            @endif

                        </div>

                        {{-- TOMBOL EDIT DAN HAPUS --}}
                        @if (auth()->user()->role === 'Admin' || $item->id_user === auth()->id())
                            <div class="card-footer bg-white border-0 pt-0 pb-3 px-3">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('prestasi.edit', $item) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil me-1"></i> Edit
                                    </a>

                                    <form action="{{ route('prestasi.destroy', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-footer bg-white border-0 pt-0 pb-3 px-3">
                                <span class="text-muted small">-</span>
                            </div>
                        @endif

                    </div>

                </div> {{-- <-- Penutup div kolom (col-xl-4 col-md-6) yang tadinya kurang --}}

            @empty

                {{-- DATA KOSONG --}}
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-5">

                            <i class="bi bi-trophy text-muted" style="font-size: 70px;">
                            </i>

                            <h5 class="mt-3 mb-1">Data Prestasi Tidak Ditemukan</h5>

                            <p class="text-muted mb-3">
                                Tidak ada data yang sesuai dengan pencarian atau filter.
                            </p>

                            {{-- Tombol cadangan jika pencarian kosong --}}
                            <a href="{{ route('prestasi.create') }}" class="btn btn-primary">
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
