@extends('template')

@section('title', 'Data Pengumuman')

@section('content')

    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            @php
                $profil = DB::table('profil_sekolahs')->first();
            @endphp

            <div>
                <h2 class="fw-bold mb-1">Data Pengumuman</h2>

                <p class="text-muted mb-0">
                    Daftar pengumuman {{ $profil->nama_sekolah ?? 'SMK Zenith Teknologi' }}
                </p>
            </div>
            <div class="d-flex gap-2">

                {{-- KEMBALI --}}
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali
                </a>

                @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Operator')
                    <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>
                        Tambah Pengumuman
                    </a>
                @endif

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

                <form action="{{ route('pengumuman.index') }}" method="GET">

                    <div class="row g-3 align-items-center">

                        {{-- SEARCH --}}
                        <div class="col-md-6">

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search"></i>
                                </span>

                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari judul atau isi pengumuman..." value="{{ request('search') }}">

                            </div>

                        </div>


                        {{-- FILTER STATUS --}}
                        <div class="col-md-4">

                            <select name="status" class="form-select">

                                <option value="">
                                    Semua Status
                                </option>

                                @foreach ($status as $st)
                                    <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>
                                        {{ $st }}
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


        {{-- CARD PENGUMUMAN --}}
        <div class="row g-4">

            @forelse ($pengumuman as $data)
                <div class="col-md-6 col-xl-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            {{-- JUDUL --}}
                            <div class="d-flex align-items-start mb-3">

                                <div class="bg-primary-subtle text-primary rounded-3 p-3 me-3">

                                    <i class="bi bi-megaphone-fill fs-4"></i>

                                </div>

                                <div class="flex-grow-1">

                                    <h5 class="fw-bold mb-1">
                                        {{ $data->judul }}
                                    </h5>

                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}
                                    </small>

                                </div>

                            </div>


                            {{-- ISI --}}
                            <p class="text-muted mb-3">

                                {{ Str::limit($data->isi, 150) }}

                            </p>


                            {{-- STATUS --}}
                            @if ($data->status == 'Publish')
                                <span class="badge bg-success">
                                    Publish
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    Draft
                                </span>
                            @endif

                        </div>


                        {{-- AKSI --}}
                        <div class="card-footer bg-white border-0 px-4 pb-4">
                            <div class="d-flex gap-2 flex-wrap">

                                {{-- DETAIL (Selalu muncul) --}}
                                <a href="{{ route('pengumuman.show', $data->id_pengumuman ?? $data->id) }}"
                                    class="btn btn-outline-info btn-sm flex-fill">
                                    <i class="bi bi-eye me-1"></i> Detail
                                </a>

                                {{-- EDIT & HAPUS (Hanya Admin atau Pemilik Data) --}}
                                @if (auth()->user()->role === 'Admin' || $data->id_user === auth()->id())
                                    <a href="{{ route('pengumuman.edit', $data->id_pengumuman) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil me-1"></i> Edit
                                    </a>

                                    <form action="{{ route('pengumuman.destroy', $data->id_pengumuman) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash me-1"></i> Hapus
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

                            <i class="bi bi-megaphone fs-1 text-muted"></i>

                            <h5 class="mt-3">
                                Belum ada pengumuman
                            </h5>

                            <p class="text-muted mb-0">
                                Data pengumuman belum ditambahkan.
                            </p>

                        </div>

                    </div>

                </div>
            @endforelse

        </div>

    </div>

@endsection
