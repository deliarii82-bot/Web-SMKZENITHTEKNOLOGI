@extends('template')

@section('title', 'Data Guru')

@section('content')

    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">


            <div>
                <h2 class="fw-bold mb-1">Data Guru</h2>

                <p class="text-muted mb-0">
                    {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
                </p>
            </div>


            <div class="d-flex gap-2">

                {{-- KEMBALI --}}
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali
                </a>

                {{-- TAMBAH GURU --}}
                <a href="{{ route('guru.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>
                    Tambah Guru
                </a>

            </div>

        </div>


        {{-- PESAN BERHASIL --}}
        @if (session('success'))
            <div class="alert alert-success" id="successAlert">
                {{ session('success') }}
            </div>
        @endif


        {{-- SEARCH DAN FILTER --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body p-4">

                <form action="{{ route('guru.index') }}" method="GET">

                    <div class="row g-3 align-items-center">

                        {{-- SEARCH --}}
                        <div class="col-md-6">

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search"></i>
                                </span>

                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari nama, NIP, atau mata pelajaran..." value="{{ request('search') }}">

                            </div>

                        </div>


                        {{-- FILTER JABATAN --}}
                        <div class="col-md-4">

                            <select name="jabatan" class="form-select">

                                <option value="">
                                    Semua Jabatan
                                </option>

                                @foreach ($jabatan as $data)
                                    <option value="{{ $data }}" {{ request('jabatan') == $data ? 'selected' : '' }}>

                                        {{ $data }}

                                    </option>
                                @endforeach

                            </select>

                        </div>


                        {{-- TOMBOL CARI --}}
                        <div class="col-md-2">

                            <button type="submit" class="btn btn-primary w-100">

                                <i class="bi bi-search me-1"></i>
                                Cari

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>


        {{-- CARD GURU --}}
        <div class="row g-4">

            @forelse ($gurus as $guru)
                <div class="col-md-6 col-xl-4">

                    <div class="card border-0 shadow-sm h-100">

                        {{-- FOTO --}}

                        {{-- FOTO --}}
                        <div class="text-center pt-4">

                            @if ($guru->foto)
                                <img src="{{ asset('gambar/guru/' . $guru->foto) }}" alt="Foto {{ $guru->nama_guru }}"
                                    width="150" height="170" class="object-fit-cover rounded-3">
                            @else
                                <div class="d-inline-flex align-items-center justify-content-center bg-light text-secondary rounded-3"
                                    style="width: 150px; height: 170px;">

                                    <i class="bi bi-person fs-1"></i>

                                </div>
                            @endif

                        </div>


                        {{-- INFORMASI --}}
                        <div class="card-body text-center px-4">

                            <h5 class="fw-bold mb-2">
                                {{ $guru->nama_guru }}
                            </h5>

                            <p class="text-muted mb-3">

                                <span class="fw-semibold">
                                    Mata Pelajaran:
                                </span>

                                {{ $guru->mapel }}

                            </p>


                            <div class="text-start small">

                                {{-- NIP --}}
                                <div class="mb-2">

                                    <span class="text-muted">
                                        NIP
                                    </span>

                                    <br>

                                    <span class="fw-semibold">
                                        {{ $guru->nip }}
                                    </span>

                                </div>


                                {{-- JABATAN --}}
                                <div>

                                    <span class="text-muted">
                                        Jabatan
                                    </span>

                                    <br>

                                    <span class="fw-semibold">
                                        {{ $guru->jabatan }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- AKSI --}}
                        <div class="card-footer bg-white border-0 px-4 pb-4">
                            <div class="d-flex gap-2">

                                {{-- EDIT: Bisa diakses oleh Admin maupun Operator --}}
                                <a href="{{ route('guru.edit', $guru->id_guru) }}"
                                    class="btn btn-outline-primary btn-sm flex-fill">
                                    <i class="bi bi-pencil me-1"></i>
                                    Edit
                                </a>

                                {{-- HAPUS: Hanya muncul khusus untuk Admin --}}
                                @if (strtolower(auth()->user()->role) == 'admin')
                                    <form action="{{ route('guru.destroy', $guru->id_guru) }}" method="POST"
                                        class="flex-fill">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash me-1"></i>
                                            Hapus
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

            @empty

                {{-- DATA KOSONG --}}
                <div class="col-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center py-5">

                            <i class="bi bi-people fs-1 text-muted"></i>

                            <h5 class="mt-3">
                                Belum ada data guru
                            </h5>

                            <p class="text-muted mb-0">
                                Data guru belum ditambahkan.
                            </p>

                        </div>

                    </div>

                </div>
            @endforelse

        </div>

    </div>


    {{-- ALERT HILANG OTOMATIS --}}
    @if (session('success'))
        <script>
            setTimeout(function() {

                const alert = document.getElementById('successAlert');

                if (alert) {
                    alert.style.display = 'none';
                }

            }, 3000);
        </script>
    @endif

@endsection
