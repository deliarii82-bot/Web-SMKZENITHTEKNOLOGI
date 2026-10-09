@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Berita</h3>
        <p class="text-muted mb-0">
            Ubah informasi berita sekolah
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

            <form action="{{ route('berita.update', $berita->id_berita) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- JUDUL --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                            Judul Berita
                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               maxlength="50"
                               value="{{ old('judul', $berita->judul) }}"
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
                               value="{{ old('tanggal', $berita->tanggal) }}"
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

                            <option value="Publish"
                                {{ old('status', $berita->status) == 'Publish' ? 'selected' : '' }}>
                                Publish
                            </option>

                            <option value="Draft"
                                {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>
                    </div>


                    {{-- GAMBAR --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Gambar Berita
                        </label>

                        @if($berita->gambar)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                     alt="Gambar Berita"
                                     style="width:180px;height:110px;object-fit:cover;"
                                     class="rounded border">
                            </div>
                        @endif

                        <input type="file"
                               name="gambar"
                               class="form-control"
                               accept="image/png,image/jpeg">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti gambar.
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
                                  required>{{ old('isi', $berita->isi) }}</textarea>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('berita.index') }}"
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
