@extends('template-landing')

@section('title', $galeri->judul ?? 'Detail Galeri')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <!-- Tombol Kembali -->
            <a href="{{ route('galeri.public') }}" class="btn btn-outline-secondary btn-sm mb-4 rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Galeri
            </a>

            <!-- Judul Galeri -->
            <h2 class="fw-bold mb-3">{{ $galeri->judul }}</h2>

            <!-- Tanggal -->
            @if(!empty($galeri->tanggal))
                <p class="text-muted mb-4">
                    <i class="bi bi-calendar3 me-2 text-primary"></i> {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d F Y') }}
                </p>
            @endif

            <!-- Media Gambar / Video -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-light">
                @if ($galeri->kategori === 'Foto' || empty($galeri->kategori))
                    @if(!empty($galeri->file))
                        <img src="{{ asset('gambar/galeri/' . $galeri->file) }}"
                             alt="{{ $galeri->judul }}"
                             class="w-100 img-fluid"
                             style="max-height: 500px; object-fit: cover;">
                    @else
                        <div class="p-5 text-center text-muted">
                            <i class="bi bi-image fs-1 d-block mb-2"></i>
                            Foto tidak tersedia
                        </div>
                    @endif
                @elseif ($galeri->kategori === 'Video')
                    @if(!empty($galeri->file))
                        <video class="w-100" controls style="max-height: 500px; object-fit: cover;">
                            <source src="{{ asset('gambar/galeri/' . $galeri->file) }}">
                            Browser kamu tidak mendukung pemutaran video.
                        </video>
                    @else
                        <div class="p-5 text-center text-muted">
                            <i class="bi bi-play-circle fs-1 d-block mb-2"></i>
                            Video tidak tersedia
                        </div>
                    @endif
                @endif
            </div>

            <!-- Deskripsi / Keterangan -->
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 class="fw-bold mb-3">Deskripsi Kegiatan</h5>
                <p class="text-secondary lh-lg mb-0">
                    {!! nl2br(e($galeri->keterangan ?? $galeri->deskripsi ?? 'Tidak ada deskripsi.')) !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
