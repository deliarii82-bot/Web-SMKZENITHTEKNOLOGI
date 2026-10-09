@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Edit Program Keahlian</h3>
        <p class="text-muted">
            Ubah data program keahlian sekolah.
        </p>
    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form
                action="{{ route('jurusan.update', $jurusan->id_jurusan) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')


                {{-- Nama Jurusan --}}
                <div class="mb-3">
                    <label class="form-label">Nama Jurusan</label>

                    <input
                        type="text"
                        name="nama_jurusan"
                        class="form-control"
                        value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                        required>
                </div>


                {{-- Singkatan --}}
                <div class="mb-3">
                    <label class="form-label">Singkatan</label>

                    <input
                        type="text"
                        name="singkatan"
                        class="form-control"
                        value="{{ old('singkatan', $jurusan->singkatan) }}"
                        required>
                </div>


                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>

                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="4">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
                </div>


                {{-- Foto Lama --}}
                <div class="mb-3">

                    <label class="form-label">
                        Foto Saat Ini
                    </label>

                    @if(!empty($jurusan->foto))

                        <div class="mb-2">
                            <img
                                src="{{ asset('storage/' . $jurusan->foto) }}"
                                alt="{{ $jurusan->nama_jurusan }}"
                                class="img-thumbnail"
                                width="200">
                        </div>

                    @else

                        <p class="text-muted">
                            Belum ada foto.
                        </p>

                    @endif

                </div>


                {{-- Foto Baru --}}
                <div class="mb-3">

                    <label class="form-label">
                        Ganti Foto
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>

                </div>


                {{-- Tombol --}}
                <a
                    href="{{ route('jurusan.index') }}"
                    class="btn btn-secondary">

                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>
                    Simpan Perubahan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
