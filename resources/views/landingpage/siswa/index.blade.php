@extends('template-landing')

@section('title', 'Daftar Siswa')

@section('content')
    <div class="container my-5">
        <!-- Header Halaman -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="fw-bold">Daftar Siswa</h2>
                <p class="text-muted">Berikut adalah daftar seluruh siswa aktif SMK Cendikia Teknologi.</p>
            </div>
        </div>

        <!-- Tabel Data Siswa -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th class="px-3">No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Tahun Masuk</th>
                                <th>Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as $data)
                                <tr>
                                    <td class="px-3">{{ $loop->iteration }}</td>
                                    <td>{{ $data->nisn }}</td>
                                    <td class="fw-semibold">{{ $data->nama_siswa }}</td>
                                    <td>
    <span class="badge bg-secondary">{{ $data->kelasRelasi->nama_kelas ?? 'Belum Ada Kelas' }}</span>
</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>{{ $data->tahun_masuk }}</td>
                                    <td>{{ $data->jurusan->nama_jurusan ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada data siswa yang
                                        tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
