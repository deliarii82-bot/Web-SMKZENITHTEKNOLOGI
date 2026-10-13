@extends('template')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Data Ekstrakulikuler</h3>
                <p class="text-muted mb-0">Kelola kegiatan ekstrakulikuler sekolah</p>
            </div>

            @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Operator')
                <a href="{{ route('ekstrakulikuler.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>
                    Tambah Ekstrakulikuler
                </a>
            @endif
        </div>

        {{-- Form Pencarian --}}
        <form action="{{ route('ekstrakulikuler.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari kegiatan ekstrakulikuler..." value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">

            @forelse($ekstrakulikuler as $data)
                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        {{-- GAMBAR --}}
                        @if ($data->gambar)
                            <img src="{{ url('gambar/ekstrakulikuler/' . $data->gambar) }}" class="card-img-top"
                                style="height:200px; object-fit:cover;" alt="{{ $data->nama_ekskul }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light" style="height:200px;">
                                <i class="bi bi-trophy text-secondary" style="font-size:60px;"></i>
                            </div>
                        @endif

                        {{-- ISI --}}
                        <div class="card-body">

                            <h5 class="fw-bold mb-3">
                                {{ $data->nama_ekskul }}
                            </h5>

                            <p class="mb-2">
                                <i class="bi bi-person me-2"></i>
                                <strong>Pembina:</strong>
                                {{ $data->pembina }}
                            </p>

                            <p class="mb-3">
                                <i class="bi bi-calendar-event me-2"></i>
                                <strong>Jadwal:</strong>
                                {{ $data->jadwal_latihan }}
                            </p>

                            <p class="text-muted mb-0">
                                {{ $data->deskripsi }}
                            </p>

                        </div>


                        @if (auth()->user()->role == 'Admin' || $data->id_user === auth()->id())
                            <div class="card-footer bg-white border-0 pt-0 pb-3 px-3">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('ekstrakulikuler.edit', $data->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil me-1"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('ekstrakulikuler.destroy', $data->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash me-1"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-footer bg-white border-0 pt-0 pb-3 px-3">
                                <span class="text-muted small">-</span>
                            </div>
                        @endif

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center py-5">

                            <i class="bi bi-trophy text-muted" style="font-size:50px;"></i>

                            <h5 class="mt-3">
                                Belum ada data ekstrakulikuler
                            </h5>

                            <p class="text-muted mb-0">
                                Data ekstrakulikuler belum ditambahkan.
                            </p>

                        </div>

                    </div>

                </div>
            @endforelse

        </div>

    </div>
@endsection
