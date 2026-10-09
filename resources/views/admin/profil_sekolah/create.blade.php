@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Tambah Profil Sekolah</h3>
        <p class="text-muted mb-0">
            Masukkan informasi lengkap sekolah
        </p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Data belum lengkap!</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('profil-sekolah.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- Nama Sekolah --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Sekolah
                        </label>

                        <input
                            type="text"
                            name="nama_sekolah"
                            class="form-control"
                            maxlength="40"
                            value="{{ old('nama_sekolah') }}"
                            placeholder="Masukkan nama sekolah"
                            required
                        >

                    </div>


                    {{-- Kepala Sekolah --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Kepala Sekolah
                        </label>

                        <input
                            type="text"
                            name="kepala_sekolah"
                            class="form-control"
                            maxlength="40"
                            value="{{ old('kepala_sekolah') }}"
                            placeholder="Nama kepala sekolah"
                            required
                        >

                    </div>


                    {{-- Foto Kepala Sekolah --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Foto Kepala Sekolah
                        </label>

                        <input
                            type="file"
                            name="foto_kepala_sekolah"
                            class="form-control"
                            accept="image/png,image/jpeg"
                            required
                        >

                        <small class="text-muted">
                            JPG, JPEG, PNG — maksimal 2 MB
                        </small>

                    </div>


                    {{-- NPSN --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            NPSN
                        </label>

                        <input
                            type="text"
                            name="npsn"
                            class="form-control"
                            maxlength="10"
                            value="{{ old('npsn') }}"
                            placeholder="Masukkan NPSN"
                            required
                        >

                    </div>


                    {{-- Kontak --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Kontak
                        </label>

                        <input
                            type="text"
                            name="kontak"
                            class="form-control"
                            maxlength="15"
                            value="{{ old('kontak') }}"
                            placeholder="Nomor kontak sekolah"
                            required
                        >

                    </div>


                    {{-- Tahun Berdiri --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Tahun Berdiri
                        </label>

                        <input
                            type="number"
                            name="tahun_berdiri"
                            class="form-control"
                            min="1900"
                            max="{{ date('Y') }}"
                            value="{{ old('tahun_berdiri') }}"
                            placeholder="Contoh: 2005"
                            required
                        >

                    </div>


                    {{-- Logo --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Logo Sekolah
                        </label>

                        <input
                            type="file"
                            name="logo"
                            class="form-control"
                            accept="image/png,image/jpeg"
                            required
                        >

                        <small class="text-muted">
                            JPG, JPEG, PNG — maksimal 2 MB
                        </small>

                    </div>


                    {{-- Foto Sekolah --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Foto Sekolah
                        </label>

                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept="image/png,image/jpeg"
                            required
                        >

                        <small class="text-muted">
                            JPG, JPEG, PNG — maksimal 2 MB
                        </small>

                    </div>


                    {{-- Alamat --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="3"
                            placeholder="Alamat lengkap sekolah"
                            required
                        >{{ old('alamat') }}</textarea>

                    </div>


                    {{-- Visi Misi --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Visi & Misi
                        </label>

                        <textarea
                            name="visi_misi"
                            class="form-control"
                            rows="5"
                            placeholder="Masukkan visi dan misi sekolah"
                            required
                        >{{ old('visi_misi') }}</textarea>

                    </div>


                    {{-- Deskripsi --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Deskripsi Sekolah
                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="5"
                            placeholder="Ceritakan tentang sekolah"
                            required
                        >{{ old('deskripsi') }}</textarea>

                    </div>

                </div>


                <hr class="my-4">


                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="{{ route('profil-sekolah.index') }}"
                        class="btn btn-light border"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary px-4"
                    >
                        <i class="bi bi-check-lg me-2"></i>
                        Simpan Profil
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
