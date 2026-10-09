@extends('template')

@section('title', 'Tambah Galeri')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Tambah Galeri
            </h2>

            <p class="text-muted mb-0">
                Tambahkan dokumentasi kegiatan sekolah
            </p>
        </div>

        <a href="{{ route('galeri.index') }}"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-2"></i>
            Kembali

        </a>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('galeri.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf


                {{-- JUDUL --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Judul
                    </label>

                    <input type="text"
                        name="judul"
                        class="form-control"
                        placeholder="Masukkan judul galeri"
                        value="{{ old('judul') }}"
                        maxlength="50"
                        required>

                    @error('judul')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- KETERANGAN --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan keterangan galeri"
                        required>{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- FILE --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        File
                    </label>

                    <input type="file"
                        name="file"
                        class="form-control"
                        required>

                    <small class="text-muted">
                        Maksimal ukuran file 10 MB.
                    </small>

                    @error('file')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- KATEGORI --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Kategori
                    </label>

                    <select name="kategori"
                        class="form-select"
                        required>

                        <option value="">
                            Pilih kategori
                        </option>

                        <option value="Foto"
                            {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                            Foto
                        </option>

                        <option value="Video"
                            {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                            Video
                        </option>

                    </select>

                    @error('kategori')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- TANGGAL --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Tanggal
                    </label>

                    <input type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ old('tanggal') }}"
                        required>

                    @error('tanggal')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- BUTTON --}}

                <div class="d-flex gap-2">

                    <a href="{{ route('galeri.index') }}"
                        class="btn btn-outline-secondary">

                        Batal

                    </a>

                    <button type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-save me-1"></i>
                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
