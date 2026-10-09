@extends('template')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Tambah Program Keahlian</h3>
        <p class="text-muted">
            Tambahkan data program keahlian sekolah.
        </p>
    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Jurusan</label>

                    <input
                        type="text"
                        name="nama_jurusan"
                        class="form-control"
                        value="{{ old('nama_jurusan') }}"
                        required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Singkatan</label>

                    <input
                        type="text"
                        name="singkatan"
                        class="form-control"
                        value="{{ old('singkatan') }}"
                        required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>

                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="4">{{ old('deskripsi') }}</textarea>
                </div>


                <div class="mb-3">
                    <label class="form-label">Foto</label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control"
                        accept=".jpg,.jpeg,.png">
                </div>


                <a
                    href="{{ route('jurusan.index') }}"
                    class="btn btn-secondary">

                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-primary">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
