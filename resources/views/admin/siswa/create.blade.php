@extends('template')

@section('title', 'Tambah Siswa')

@section('content')

    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-1">Tambah Siswa</h2>

                <p class="text-muted mb-0">
                    Tambahkan data siswa SMK Cendikia Teknologi
                </p>
            </div>

            <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-2"></i>
                Kembali

            </a>

        </div>


        {{-- FORM --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <form action="{{ route('siswa.store') }}" method="POST">

                    @csrf


                    {{-- NISN --}}
                    <div class="mb-3">

                        <label class="form-label">
                            NISN
                        </label>

                        <input type="text" name="nisn" class="form-control" value="{{ old('nisn') }}"
                            placeholder="Masukkan NISN" required>

                    </div>


                    {{-- NAMA SISWA --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Nama Siswa
                        </label>

                        <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa') }}"
                            placeholder="Masukkan nama siswa" required>

                    </div>


                    {{-- JENIS KELAMIN --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Jenis Kelamin
                        </label>

                        <select name="jenis_kelamin" class="form-select" required>

                            <option value="">
                                Pilih Jenis Kelamin
                            </option>

                            <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>

                        </select>

                    </div>


                    {{-- TAHUN MASUK --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Tahun Masuk
                        </label>

                        <input type="text" name="tahun_masuk" class="form-control" value="{{ old('tahun_masuk') }}"
                            placeholder="Contoh: 2026" required>

                    </div>


                    {{-- JURUSAN --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Jurusan
                        </label>

                        <select name="id_jurusan" class="form-select" required>

                            <option value="">
                                Pilih Jurusan
                            </option>

                            @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->id_jurusan }}"
                                    {{ old('id_jurusan') == $jurusan->id_jurusan ? 'selected' : '' }}>

                                    {{ $jurusan->nama_jurusan }}

                                </option>
                            @endforeach

                        </select>

                    </div>


                    {{-- TOMBOL --}}
                    <div class="mt-4">



                        <button type="reset" class="btn btn-outline-secondary">

                            Batal

                        </button>

                        <button type="submit" class="btn btn-primary">

                            <i class="bi bi-save me-1"></i>
                            Simpan

                        </button>

                    </div>



            </div>

            </form>

        </div>

    </div>

    </div>

@endsection
