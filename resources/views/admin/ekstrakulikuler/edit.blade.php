@extends('template')

@section('content')
    <div class="container-fluid">

        <div class="mb-4">
            <h3 class="fw-bold mb-1">Edit Ekstrakulikuler</h3>
            <p class="text-muted mb-0">Ubah data ekstrakulikuler sekolah</p>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="{{ route('ekstrakulikuler.update', $ekstrakulikuler->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Nama Ekstrakulikuler
                            </label>

                            <input type="text" name="nama_ekskul" class="form-control" maxlength="40"
                                value="{{ $ekstrakulikuler->nama_ekskul }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Pembina
                            </label>

                            <input type="text" name="pembina" class="form-control" maxlength="40"
                                value="{{ $ekstrakulikuler->pembina }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Jadwal Latihan
                            </label>

                            <input type="text" name="jadwal_latihan" class="form-control" maxlength="40"
                                value="{{ $ekstrakulikuler->jadwal_latihan }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Gambar
                            </label>

                            <input type="file" name="gambar" class="form-control" accept="image/*">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $ekstrakulikuler->deskripsi }}</textarea>
                        </div>

                    </div>

                    <div class="mt-3">

                        <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-secondary">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
