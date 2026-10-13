@extends('template')

@section('title', 'Data Berita')

@section('content')

    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            @php
                $profil = DB::table('profil_sekolahs')->first();
            @endphp

            <div>
                <h2 class="fw-bold mb-1">
                    Data Berita
                </h2>

                <p class="text-muted mb-0">
                    Daftar berita {{ $profil->nama_sekolah ?? 'SMK Zenith Teknologi' }}
                </p>
            </div>

            <div class="d-flex gap-2">

                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">

                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali

                </a>


                @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Operator')
                    <a href="{{ route('berita.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>
                        Tambah Berita
                    </a>
                @endif

            </div>

        </div>



        {{-- SEARCH FILTER --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body p-4">

                <form action="{{ route('berita.index') }}" method="GET">

                    <div class="row g-3 align-items-center">


                        {{-- SEARCH --}}
                        <div class="col-md-6">

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search"></i>
                                </span>


                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari judul atau isi berita..." value="{{ request('search') }}">

                            </div>

                        </div>



                        {{-- FILTER STATUS --}}
                        <div class="col-md-4">

                            <select name="status" class="form-select">


                                <option value="">
                                    Semua Status
                                </option>


                                @foreach ($status as $data)
                                    <option value="{{ $data }}" {{ request('status') == $data ? 'selected' : '' }}>

                                        {{ $data }}

                                    </option>
                                @endforeach


                            </select>

                        </div>



                        {{-- BUTTON --}}
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



        {{-- CARD BERITA --}}
        <div class="row g-4">


            @forelse($berita as $data)
                <div class="col-md-6 col-xl-4">


                    <div class="card border-0 shadow-sm h-100">


                        {{-- GAMBAR --}}
                        @if ($data->gambar)
                            <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->judul }}"
                                class="card-img-top" style="height:200px; object-fit:cover;">
                        @endif



                        <div class="card-body p-4">


                            <h5 class="fw-bold mb-2">

                                {{ $data->judul }}

                            </h5>



                            <small class="text-muted">

                                {{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}

                            </small>



                            <p class="text-muted mt-3">

                                {{ Str::limit($data->isi, 120) }}

                            </p>



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
                        @if (auth()->user()->role == 'Admin' || $data->id_user === auth()->id())
                            <div class="card-footer bg-white border-0 px-4 pb-4">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('berita.edit', $data->id_berita) }}"
                                        class="btn btn-outline-primary btn-sm flex-fill">
                                        <i class="bi bi-pencil me-1"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('berita.destroy', $data->id_berita) }}" method="POST"
                                        class="flex-fill" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                            <i class="bi bi-trash me-1"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-footer bg-white border-0 px-4 pb-4 text-center">
                                <span class="text-muted small">-</span>
                            </div>
                        @endif



                    </div>


                </div>


            @empty


                <div class="col-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center py-5">


                            <i class="bi bi-newspaper fs-1 text-muted"></i>


                            <h5 class="mt-3">
                                Belum ada berita
                            </h5>


                            <p class="text-muted mb-0">
                                Data berita belum ditambahkan.
                            </p>


                        </div>

                    </div>

                </div>
            @endforelse


        </div>


    </div>


@endsection
