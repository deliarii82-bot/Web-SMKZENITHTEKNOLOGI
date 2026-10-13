@extends('template-landing')

@section('title', 'Prestasi Sekolah')

@section('content')
<div class="container py-5">
    <!-- Header Halaman -->
    <div class="text-center mb-5">
        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-2 fw-semibold">
            <i class="bi bi-trophy-fill me-1 text-warning"></i> Kebanggaan Sekolah
        </span>
        <h2 class="fw-bold display-6">Daftar Prestasi & Penghargaan</h2>
        <p class="text-muted col-lg-6 mx-auto">
            Dokumentasi pencapaian dan kebanggaan siswa-siswi serta {{ $profil->nama_sekolah ?? 'Sekolah' }} dalam berbagai ajang kompetisi.
        </p>
    </div>

    @if($prestasi->count() > 0)
        <!-- Grid Prestasi Dinamis -->
        <div class="row g-4">
            @foreach($prestasi as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="position-relative">
                            @if(!empty($item->foto))
                                <img src="{{ asset('gambar/prestasi/' . $item->foto) }}"
                                     class="card-img-top"
                                     alt="{{ $item->judul }}"
                                     style="height: 220px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                                    <i class="bi bi-trophy text-muted fs-1"></i>
                                </div>
                            @endif

                            @if(!empty($item->tingkat))
                                <span class="position-absolute top-0 end-0 m-3 badge bg-primary rounded-pill px-3 py-2 shadow-sm">
                                    {{ $item->tingkat }}
                                </span>
                            @endif
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="text-muted small mb-2">
                                <i class="bi bi-award-fill text-warning me-1"></i> {{ $item->kategori ?? 'Prestasi' }}
                            </div>
                            <h5 class="card-title fw-bold mb-2 text-dark">{{ $item->nama_prestasi }}</h5>
                            <p class="card-text text-muted small flex-grow-1">
                                {{ Str::limit(strip_tags($item->deskripsi ?? $item->keterangan ?? ''), 100) }}
                            </p>
                            <div class="d-flex align-items-center pt-3 mt-2 border-top">
                                <div class="bg-light rounded-circle p-2 me-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                    <i class="bi bi-person-fill text-primary"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="fw-bold d-block text-dark">{{ $item->nama_siswa  }}</small>
                                    @if(!empty($item->tanggal))
                                        <small class="text-muted" style="font-size: 0.75rem;">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                                        </small>
                                    @endif
                                </div>
                                <a href="{{ route('prestasi.detail', $item->id ?? $item->getKey()) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Tampilan Jika Belum Ada Data -->
        <div class="card border-0 shadow-sm rounded-4 text-center py-5">
            <div class="card-body">
                <i class="bi bi-trophy text-muted" style="font-size: 60px;"></i>
                <h5 class="fw-bold mt-3">Belum Ada Data Prestasi</h5>
                <p class="text-muted small">Data prestasi sekolah akan ditampilkan di halaman ini.</p>
            </div>
        </div>
    @endif
</div>
@endsection
