@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">
            Tambah Prestasi
        </h4>

        <p class="text-muted mb-0">
            Tambahkan data prestasi siswa
        </p>
    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('prestasi.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <!-- NAMA PRESTASI -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Prestasi
                    </label>

                    <input
                        type="text"
                        name="nama_prestasi"
                        class="form-control @error('nama_prestasi') is-invalid @enderror"
                        value="{{ old('nama_prestasi') }}"
                        placeholder="Contoh: Lomba Kompetensi Siswa"
                        required
                    >

                    @error('nama_prestasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- NAMA SISWA -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Siswa
                    </label>

                    <input
                        type="text"
                        name="nama_siswa"
                        class="form-control @error('nama_siswa') is-invalid @enderror"
                        value="{{ old('nama_siswa') }}"
                        placeholder="Nama siswa"
                        required
                    >

                    @error('nama_siswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- TINGKAT -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Tingkat
                    </label>

                    <select
                        name="tingkat"
                        class="form-select @error('tingkat') is-invalid @enderror"
                        required
                    >

                        <option value="">
                            -- Pilih Tingkat --
                        </option>

                        <option value="Sekolah" {{ old('tingkat') == 'Sekolah' ? 'selected' : '' }}>
                            Sekolah
                        </option>

                        <option value="Kecamatan" {{ old('tingkat') == 'Kecamatan' ? 'selected' : '' }}>
                            Kecamatan
                        </option>

                        <option value="Kabupaten/Kota" {{ old('tingkat') == 'Kabupaten/Kota' ? 'selected' : '' }}>
                            Kabupaten/Kota
                        </option>

                        <option value="Provinsi" {{ old('tingkat') == 'Provinsi' ? 'selected' : '' }}>
                            Provinsi
                        </option>

                        <option value="Nasional" {{ old('tingkat') == 'Nasional' ? 'selected' : '' }}>
                            Nasional
                        </option>

                        <option value="Internasional" {{ old('tingkat') == 'Internasional' ? 'selected' : '' }}>
                            Internasional
                        </option>

                    </select>

                    @error('tingkat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- PERINGKAT -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Peringkat
                    </label>

                    <input
                        type="text"
                        name="peringkat"
                        class="form-control @error('peringkat') is-invalid @enderror"
                        value="{{ old('peringkat') }}"
                        placeholder="Contoh: Juara 1"
                        required
                    >

                    @error('peringkat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- KETERANGAN -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="5"
                        class="form-control @error('keterangan') is-invalid @enderror"
                        placeholder="Keterangan prestasi"
                    >{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- FOTO -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Foto
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control @error('foto') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png"
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, PNG. Maksimal 2 MB.
                    </small>

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- TAHUN AJARAN -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Tahun Ajaran
                    </label>

                    <input
                        type="text"
                        name="tahun_ajaran"
                        class="form-control @error('tahun_ajaran') is-invalid @enderror"
                        value="{{ old('tahun_ajaran') }}"
                        placeholder="Contoh: 2025/2026"
                        required
                    >

                    @error('tahun_ajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- BUTTON -->
                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan
                    </button>

                    <a
                        href="{{ route('prestasi.index') }}"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
