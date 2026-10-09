@extends('template')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Tambah Berita</h3>
        <p class="text-muted mb-0">
            Tambahkan berita terbaru sekolah
        </p>
    </div>


    {{-- ERROR --}}
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


    {{-- FORM --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('berita.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- JUDUL --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Judul Berita
                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul') }}"
                               placeholder="Masukkan judul berita"
                               required>

                    </div>


                    {{-- TANGGAL --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Tanggal
                        </label>

                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal', date('Y-m-d')) }}"
                               required>

                    </div>


                    {{-- STATUS --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status"
                                class="form-select"
                                required>

                            <option value="">Pilih Status</option>

                            <option value="Publish"
                                {{ old('status') == 'Publish' ? 'selected' : '' }}>
                                Publish
                            </option>

                            <option value="Draft"
                                {{ old('status') == 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>

                    </div>


                    {{-- GAMBAR --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Gambar Berita
                        </label>

                        <input type="file"
                               name="gambar"
                               class="form-control"
                               accept="image/png,image/jpeg">

                        <small class="text-muted">
                            JPG, JPEG, PNG — maksimal 2 MB
                        </small>

                    </div>


                    {{-- ISI --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Isi Berita
                        </label>

                        <textarea name="isi"
                                  class="form-control"
                                  rows="8"
                                  placeholder="Tulis isi berita..."
                                  required>{{ old('isi') }}</textarea>

                    </div>

                </div>


                <hr class="my-4">


                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('berita.index') }}"
                       class="btn btn-light border">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary px-4">

                        <i class="bi bi-check-lg me-2"></i>
                        Simpan Berita

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
