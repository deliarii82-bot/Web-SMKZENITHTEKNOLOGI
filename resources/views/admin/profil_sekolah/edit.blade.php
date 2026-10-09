@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Profil Sekolah</h3>
        <p class="text-muted mb-0">
            Ubah informasi profil sekolah
        </p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Data belum benar!</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('profil-sekolah.update', $profil->id_profil) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- NAMA SEKOLAH --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Sekolah
                        </label>

                        <input
                            type="text"
                            name="nama_sekolah"
                            class="form-control"
                            maxlength="40"
                            value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                            required
                        >

                    </div>


                    {{-- KEPALA SEKOLAH --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Kepala Sekolah
                        </label>

                        <input
                            type="text"
                            name="kepala_sekolah"
                            class="form-control"
                            maxlength="40"
                            value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}"
                            required
                        >

                    </div>


                    {{-- FOTO KEPALA SEKOLAH --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Foto Kepala Sekolah
                        </label>

                        @if($profil->foto_kepala_sekolah)

                            <div class="mb-2">

                                <img
                                    src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                                    alt="Foto Kepala Sekolah"
                                    style="width:120px;height:140px;object-fit:cover;"
                                    class="border rounded"
                                >

                            </div>

                        @endif

                        <input
                            type="file"
                            name="foto_kepala_sekolah"
                            class="form-control"
                            accept="image/png,image/jpeg"
                        >

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto kepala sekolah.
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
                            value="{{ old('npsn', $profil->npsn) }}"
                            required
                        >

                    </div>


                    {{-- KONTAK --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Kontak
                        </label>

                        <input
                            type="text"
                            name="kontak"
                            class="form-control"
                            maxlength="15"
                            value="{{ old('kontak', $profil->kontak) }}"
                            required
                        >

                    </div>


                    {{-- TAHUN BERDIRI --}}
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
                            value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}"
                            required
                        >

                    </div>


                    {{-- LOGO --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Logo Sekolah
                        </label>

                        @if($profil->logo)

                            <div class="mb-2">

                                <img
                                    src="{{ asset('storage/' . $profil->logo) }}"
                                    alt="Logo Sekolah"
                                    style="width:100px;height:100px;object-fit:contain;"
                                    class="border rounded p-1"
                                >

                            </div>

                        @endif

                        <input
                            type="file"
                            name="logo"
                            class="form-control"
                            accept="image/png,image/jpeg"
                        >

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti logo.
                        </small>

                    </div>


                    {{-- FOTO SEKOLAH --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Foto Sekolah
                        </label>

                        @if($profil->foto)

                            <div class="mb-2">

                                <img
                                    src="{{ asset('storage/' . $profil->foto) }}"
                                    alt="Foto Sekolah"
                                    style="width:160px;height:100px;object-fit:cover;"
                                    class="border rounded"
                                >

                            </div>

                        @endif

                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept="image/png,image/jpeg"
                        >

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                        </small>

                    </div>


                    {{-- ALAMAT --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="3"
                            required
                        >{{ old('alamat', $profil->alamat) }}</textarea>

                    </div>


                    {{-- VISI MISI --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Visi & Misi
                        </label>

                        <textarea
                            name="visi_misi"
                            class="form-control"
                            rows="5"
                            required
                        >{{ old('visi_misi', $profil->visi_misi) }}</textarea>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Deskripsi Sekolah
                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="5"
                            required
                        >{{ old('deskripsi', $profil->deskripsi) }}</textarea>

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
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
