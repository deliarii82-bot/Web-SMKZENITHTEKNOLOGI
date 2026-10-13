@extends('template')

@section('content')
    <div class="container-fluid">

        {{-- HEADER & TOMBOL KEMBALI --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Edit Galeri</h4>
                <p class="text-muted mb-0">Perbarui data galeri atau dokumentasi sekolah</p>
            </div>
            <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        {{-- FORM EDIT GALERI --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <form action="{{ route('galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        {{-- JUDUL GALERI --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">Judul Galeri <span class="text-danger">*</span></label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $galeri->judul) }}" placeholder="Masukkan judul galeri/kegiatan" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- KATEGORI --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Foto" {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>Foto</option>
                                <option value="Video" {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>Video</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- TANGGAL --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', $galeri->tanggal) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- KETERANGAN / DESKRIPSI --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">Keterangan / Deskripsi</label>
                            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="4"
                                placeholder="Masukkan keterangan singkat mengenai galeri ini">{{ old('keterangan', $galeri->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- FOTO / FILE DOKUMENTASI --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">Foto / Gambar Dokumentasi</label>

                            {{-- PREVIEW FOTO LAMA JIKA ADA --}}
                            @if ($galeri->foto && file_exists(public_path('gambar/galeri/' . $galeri->foto)))
                                <div class="mb-3">
                                    <p class="text-muted small mb-1">Foto Saat Ini:</p>
                                    <img src="{{ asset('gambar/galeri/' . $galeri->foto) }}" alt="{{ $galeri->judul }}"
                                        class="img-thumbnail rounded" style="max-height: 180px; object-fit: cover;">
                                </div>
                            @endif

                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto saat ini.</small>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <hr class="my-4">

                    {{-- TOMBOL SIMPAN --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
