@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">
            Edit Prestasi
        </h4>

        <p class="text-muted mb-0">
            Perbarui data prestasi siswa
        </p>
    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('prestasi.update', $prestasi->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <!-- NAMA PRESTASI -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Prestasi
                    </label>

                    <input
                        type="text"
                        name="nama_prestasi"
                        class="form-control @error('nama_prestasi') is-invalid @enderror"
                        value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}"
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
                        value="{{ old('nama_siswa', $prestasi->nama_siswa) }}"
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

                        @foreach([
                            'Sekolah',
                            'Kecamatan',
                            'Kabupaten/Kota',
                            'Provinsi',
                            'Nasional',
                            'Internasional'
                        ] as $tingkat)

                            <option
                                value="{{ $tingkat }}"
                                {{ old('tingkat', $prestasi->tingkat) == $tingkat ? 'selected' : '' }}
                            >
                                {{ $tingkat }}
                            </option>

                        @endforeach

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
                        value="{{ old('peringkat', $prestasi->peringkat) }}"
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
                    >{{ old('keterangan', $prestasi->keterangan) }}</textarea>

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

                    @if($prestasi->foto)

                        <div class="mb-3">

                            <img
                                src="{{ asset('gambar/prestasi/' . $prestasi->foto) }}"
                                alt="{{ $prestasi->nama_prestasi }}"
                                style="width:180px;height:120px;object-fit:cover;"
                                class="rounded shadow-sm"
                            >

                        </div>

                    @endif


                    <input
                        type="file"
                        name="foto"
                        class="form-control @error('foto') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png"
                    >

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
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
                        value="{{ old('tahun_ajaran', $prestasi->tahun_ajaran) }}"
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
                        Simpan Perubahan
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
