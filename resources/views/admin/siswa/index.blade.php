@extends('template')

@section('title', 'Data Siswa')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">Data Siswa</h2>

            <p class="text-muted mb-0">
                Daftar siswa SMK Cendikia Teknologi
            </p>
        </div>

        <div class="d-flex gap-2">

            {{-- KEMBALI --}}
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali
            </a>

            {{-- TAMBAH SISWA --}}
            @if (auth()->user()->role == 'Admin')
                <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>
                    Tambah Siswa
                </a>
            @endif

        </div>

    </div>


    {{-- SEARCH DAN FILTER --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <form action="{{ route('siswa.index') }}" method="GET">

                <div class="row g-3 align-items-center">

                    {{-- SEARCH --}}
                    <div class="col-md-6">

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari nama siswa atau NISN..."
                                value="{{ request('search') }}">

                        </div>

                    </div>


                    {{-- FILTER JENIS KELAMIN --}}
                    <div class="col-md-4">

                        <select name="jenis_kelamin" class="form-select">

                            <option value="">
                                Semua Jenis Kelamin
                            </option>

                            @foreach ($jenisKelamin as $data)

                                <option
                                    value="{{ $data }}"
                                    {{ request('jenis_kelamin') == $data ? 'selected' : '' }}>

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


    {{-- TABEL SISWA --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                            <th>Jurusan</th>

                            @if (auth()->user()->role == 'Admin')
                                <th class="text-center">Aksi</th>
                            @endif

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($siswa as $data)

                            <tr>

                                <td class="px-4">
                                    {{ $loop->iteration }}
                                </td>


                                <td>
                                    {{ $data->nisn }}
                                </td>


                                <td class="fw-semibold">
                                    {{ $data->nama_siswa }}
                                </td>


                                <td>
                                    {{ $data->jenis_kelamin }}
                                </td>


                                <td>
                                    {{ $data->tahun_masuk }}
                                </td>


                                {{-- JURUSAN --}}
                                <td>
                                    {{ $data->jurusan->nama_jurusan ?? '-' }}
                                </td>


                                {{-- AKSI --}}
                                @if (auth()->user()->role == 'Admin')

                                    <td class="text-center">

                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('siswa.edit', $data->id_siswa) }}"
                                                class="btn btn-outline-primary btn-sm">

                                                <i class="bi bi-pencil"></i>
                                                Edit

                                            </a>


                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('siswa.destroy', $data->id_siswa) }}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-outline-danger btn-sm">

                                                    <i class="bi bi-trash"></i>
                                                    Hapus

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                @endif

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-5">

                                    <i class="bi bi-people fs-1 text-muted"></i>

                                    <h5 class="mt-3">
                                        Belum ada data siswa
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Data siswa belum ditambahkan.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
