@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Data Guru</h3>
        <p class="text-muted mb-0">
            Ubah data guru
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

            <form action="{{ route('guru.update', $guru->id_guru) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="row g-4">

                    {{-- NAMA GURU --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Guru
                        </label>

                        <input type="text"
                               name="nama_guru"
                               class="form-control"
                               maxlength="40"
                               value="{{ old('nama_guru', $guru->nama_guru) }}"
                               required>

                    </div>


                    {{-- NIP --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            NIP
                        </label>

                        <input type="text"
                               name="nip"
                               class="form-control"
                               maxlength="15"
                               value="{{ old('nip', $guru->nip) }}"
                               required>

                    </div>


                    {{-- MAPEL --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Mata Pelajaran
                        </label>

                        <input type="text"
                               name="mapel"
                               class="form-control"
                               maxlength="40"
                               value="{{ old('mapel', $guru->mapel) }}"
                               required>

                    </div>


                    {{-- JABATAN --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Jabatan
                        </label>

                        <select name="jabatan"
                                class="form-select"
                                required>

                            <option value="Guru Mapel"
                                {{ old('jabatan', $guru->jabatan) == 'Guru Mapel' ? 'selected' : '' }}>
                                Guru Mapel
                            </option>

                            <option value="Guru Produktif"
                                {{ old('jabatan', $guru->jabatan) == 'Guru Produktif' ? 'selected' : '' }}>
                                Guru Produktif
                            </option>

                            <option value="Tenaga Kependidikan"
                                {{ old('jabatan', $guru->jabatan) == 'Tenaga Kependidikan' ? 'selected' : '' }}>
                                Tenaga Kependidikan
                            </option>

                        </select>

                    </div>


                    {{-- FOTO --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Foto Guru
                        </label>


                        @if($guru->foto)

                            <div class="mb-3">

                                <img src="{{ asset('gambar/guru/' . $guru->foto) }}"
                                     alt="Foto {{ $guru->nama_guru }}"
                                     style="width:120px;height:140px;object-fit:cover;"
                                     class="rounded border">

                            </div>

                        @endif


                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept="image/png,image/jpeg">


                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                            JPG, JPEG, PNG maksimal 2 MB.
                        </small>

                    </div>

                </div>


                <hr class="my-4">


                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('guru.index') }}"
                       class="btn btn-light border">
                        Kembali
                    </a>


                    <button type="submit"
                            class="btn btn-primary px-4">

                        <i class="bi bi-check-lg me-2"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
