@extends('template')

@section('title', 'Tambah Guru')

@section('content')

    <div class="mb-4">
        <a href="{{ route('guru.index') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Data Guru
        </a>

        <h2 class="fw-bold mt-3 mb-1">Tambah Guru</h2>
        <p class="text-muted mb-0">Tambahkan data guru baru ke dalam sistem.</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Guru</label>
                        <input type="text" name="nama_guru" class="form-control" placeholder="Masukkan nama guru"
                            value="{{ old('nama_guru') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">NIP</label>
                        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"
                            placeholder="Masukkan NIP" value="{{ old('nip') }}">

                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Mata Pelajaran</label>
                        <input type="text" name="mapel" class="form-control" placeholder="Masukkan mata pelajaran"
                            value="{{ old('mapel') }}" required>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jabatan</label>
                        <select name="jabatan" class="form-select @error('jabatan') is-invalid @enderror">
                            <option value="">Pilih Jabatan</option>
                            <option value="Guru Mapel" {{ old('jabatan') == 'Guru Mapel' ? 'selected' : '' }}>Guru Mapel
                            </option>
                            <option value="Wali Kelas" {{ old('jabatan') == 'Wali Kelas' ? 'selected' : '' }}>Wali Kelas
                            </option>
                            <option value="Kepala Program" {{ old('jabatan') == 'Kepala Program' ? 'selected' : '' }}>Kepala
                                Program</option>
                            <!-- Sesuaikan pilihan option dengan data kamu -->
                        </select>

                        @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Foto Guru</label>

                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                        <a href="{{ route('guru.index') }}" class="btn btn-light px-4">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-2"></i>
                            Simpan Guru
                        </button>

                    </div>

            </form>

        </div>
    </div>

@endsection
