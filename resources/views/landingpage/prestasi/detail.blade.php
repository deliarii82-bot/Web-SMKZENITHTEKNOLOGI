@extends('template-landing')

@section('title', $prestasi->judul ?? 'Detail Prestasi')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <!-- Tombol Kembali -->
            <a href="{{ route('prestasi.public') }}" class="btn btn-outline-secondary btn-sm mb-4 rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Prestasi
            </a>

            <!-- Judul Utama -->
            <h2 class="fw-bold mb-3">{{ $prestasi->judul }}</h2>

            <!-- Badges & Informasi Singkat -->
            <div class="d-flex flex-wrap gap-2 mb-4">
                @if(!empty($prestasi->tingkat))
                    <span class="badge bg-primary rounded-pill px-3 py-2">
                        <i class="bi bi-geo-alt me-1"></i> Tingkat {{ $prestasi->tingkat }}
                    </span>
                @endif

                @if(!empty($prestasi->kategori))
                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                        <i class="bi bi-award me-1"></i> {{ $prestasi->kategori }}
                    </span>
                @endif
            </div>

            <!-- Foto Utama -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-light">
                @if(!empty($prestasi->foto))
                    <img src="{{ asset('gambar/prestasi/' . $prestasi->foto) }}"
                         alt="{{ $prestasi->nama_prestasi }}"
                         class="w-100 img-fluid"
                         style="max-height: 480px; object-fit: cover;">
                @else
                    <div class="p-5 text-center text-muted">
                        <i class="bi bi-trophy display-1 d-block mb-2"></i>
                        Foto tidak tersedia
                    </div>
                @endif
            </div>

            <!-- Detail Pemenang & Tanggal -->
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 text-primary me-3"></i>
                        <div>
                            <small class="text-muted d-block">Pemenang / Siswa</small>
                            <span class="fw-bold text-dark">{{ $prestasi->nama_siswa ?? $prestasi->siswa ?? 'Siswa SMK' }}</span>
                        </div>
                    </div>
                </div>
               <div class="col-md-6">
    <div class="p-3 bg-light rounded-3 d-flex align-items-center">
        <i class="bi bi-calendar3 fs-3 text-primary me-3"></i>
        <div>
            <small class="text-muted d-block">Tahun Ajaran</small>
            <span class="fw-bold text-dark">
                {{ $prestasi->tahun_ajaran ?? '-' }}
            </span>
        </div>
    </div>
</div>
            </div>

            <!-- Deskripsi Lengkap -->
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 class="fw-bold mb-3">Deskripsi Prestasi</h5>
                <p class="text-secondary lh-lg mb-0">
                    {!! nl2br(e($prestasi->deskripsi ?? $prestasi->keterangan ?? 'Tidak ada deskripsi rinci.')) !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
