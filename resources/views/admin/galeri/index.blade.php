@extends('template')

@section('title', 'Galeri')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            @php
                $profil = DB::table('profil_sekolahs')->first();
            @endphp
            <div>
                <h2 class="fw-bold mb-1">Galeri</h2>
                <p class="text-muted mb-0">
                    Dokumentasi kegiatan {{ $profil->nama_sekolah ?? 'SMK Zenith Teknologi' }}
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali
                </a>
                @if (auth()->user()->role == 'Admin')
                    <a href="{{ route('galeri.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>
                        Tambah Galeri
                    </a>
                @endif
            </div>
        </div>

        {{-- SEARCH & FILTER --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">
                <form action="{{ route('galeri.index') }}" method="GET">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari judul atau keterangan..." value="{{ request('search') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <select name="kategori" class="form-select">
                                <option value="">
                                    Semua Kategori
                                </option>
                                @foreach ($kategori as $data)
                                    <option value="{{ $data }}"
                                        {{ request('kategori') == $data ? 'selected' : '' }}>
                                        {{ $data }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

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

        {{-- DATA GALERI --}}
        <div class="row g-4">
            @forelse ($galeri as $data)
                <div class="col-md-6 col-xl-4">
                    <div class="card border-0 shadow-sm h-100">

                        {{-- MEDIA (FOTO / VIDEO) --}}
                        @if ($data->kategori == 'Foto')
                            <img src="{{ asset('gambar/galeri/' . $data->file) }}" alt="{{ $data->judul }}"
                                class="card-img-top" style="height: 220px; object-fit: cover;">
                        @else
                            {{-- Tampilkan Video Player Lokal di Admin --}}
                            <div class="bg-dark position-relative" style="height: 220px;">
                                <video controls class="w-100 h-100" style="object-fit: cover;">
                                    <source src="{{ asset('gambar/galeri/' . $data->file) }}" type="video/mp4">
                                    Browser Anda tidak mendukung pemutar video.
                                </video>
                            </div>
                        @endif

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0">
                                    {{ $data->judul }}
                                </h5>

                                @if ($data->kategori == 'Foto')
                                    <span class="badge bg-primary">
                                        Foto
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Video
                                    </span>
                                @endif
                            </div>

                            <p class="text-muted small mb-2">
                                {{ Str::limit($data->keterangan, 120) }}
                            </p>

                            <small class="text-secondary">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}
                            </small>
                        </div>

                        {{-- TOMBOL ADMIN --}}
                        @if (auth()->user()->role == 'Admin')
                            <div class="card-footer bg-white border-0 px-4 pb-4">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('galeri.edit', $data->id_galeri) }}"
                                        class="btn btn-outline-primary btn-sm flex-fill">
                                        <i class="bi bi-pencil me-1"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('galeri.destroy', $data->id_galeri) }}" method="POST"
                                        class="flex-fill" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                            <i class="bi bi-trash me-1"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-images fs-1 text-muted"></i>
                            <h5 class="mt-3">
                                Belum ada galeri
                            </h5>
                            <p class="text-muted mb-0">
                                Dokumentasi galeri belum ditambahkan.
                            </p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
