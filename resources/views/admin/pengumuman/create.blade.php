@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Tambah Pengumuman</h3>
        <p class="text-muted mb-0">Buat pengumuman baru</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('pengumuman.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Pengumuman</label>
                    <input type="text"
                           name="judul"
                           class="form-control"
                           maxlength="50"
                           value="{{ old('judul') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Pengumuman</label>
                    <textarea name="isi"
                              class="form-control"
                              rows="5"
                              required>{{ old('isi') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Publish">Publish</option>
                        <option value="Draft">Draft</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('pengumuman.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
