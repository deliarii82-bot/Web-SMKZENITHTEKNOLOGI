@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Pengumuman</h3>
        <p class="text-muted mb-0">Ubah data pengumuman sekolah</p>
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

            <form action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Judul
                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               maxlength="50"
                               value="{{ old('judul', $pengumuman->judul) }}"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Tanggal
                        </label>

                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal', $pengumuman->tanggal) }}"
                               required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">
                            Isi Pengumuman
                        </label>

                        <textarea name="isi"
                                  class="form-control"
                                  rows="6"
                                  required>{{ old('isi', $pengumuman->isi) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status" class="form-select" required>

                            <option value="">Pilih Status</option>

                            <option value="Publish"
                                {{ old('status', $pengumuman->status) == 'Publish' ? 'selected' : '' }}>
                                Publish
                            </option>

                            <option value="Draft"
                                {{ old('status', $pengumuman->status) == 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>
                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('pengumuman.index') }}"
                       class="btn btn-light border">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-2"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
