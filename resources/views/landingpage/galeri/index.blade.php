@extends('template-landing')

@section('title', 'Galeri Sekolah')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Galeri Sekolah</h2>
        <p class="text-muted">Dokumentasi kegiatan dan momen berharga sekolah</p>
    </div>

    @if($galeri->count() > 0)
        <div class="row g-4">
            @foreach($galeri as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-4">
                        <div style="height: 230px;" class="bg-light position-relative">

                            {{-- Cek Kategori Foto atau Video --}}
                            @if ($item->kategori === 'Foto' || empty($item->kategori))
                                @if (!empty($item->foto))
                                    <img src="{{ asset('gambar/galeri/' . $item->foto) }}"
                                         class="w-100 h-100" style="object-fit: cover;"
                                         alt="{{ $item->judul }}">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-image text-muted fs-1"></i>
                                    </div>
                                @endif
                            @elseif($item->kategori === 'Video')
                                @if (!empty($item->foto))
                                    <video class="w-100 h-100 bg-dark" style="object-fit: cover;" controls>
                                        <source src="{{ asset('gambar/galeri/' . $item->foto) }}" type="video/mp4">
                                        Browser Anda tidak mendukung pemutar video.
                                    </video>
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-camera-video text-muted fs-1"></i>
                                    </div>
                                @endif
                            @endif

                        </div>

                        <div class="card-body p-4 d-flex flex-column">
                            {{-- Badge Indikator Kategori --}}
                            <span class="badge bg-{{ ($item->kategori ?? 'Foto') === 'Video' ? 'danger' : 'primary' }} mb-2 align-self-start">
                                {{ $item->kategori ?? 'Foto' }}
                            </span>

                            <h5 class="fw-bold mb-2">{{ $item->judul }}</h5>
                            <p class="text-muted small mb-3">{{ Str::limit(strip_tags($item->keterangan ?? $item->deskripsi), 80) }}</p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </small>
                                <a href="{{ route('galeri.detail', $item->id_galeri) }}" class="btn btn-sm btn-primary rounded-pill px-3">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $galeri->links() }}
        </div>
    @else
        <div class="text-center py-5 text-muted">Belum ada galeri.</div>
    @endif
</div>
@endsection
