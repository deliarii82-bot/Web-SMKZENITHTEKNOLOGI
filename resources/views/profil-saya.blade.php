@extends('template-landing')

@section('title', 'Profil Saya')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Kartu Profil Utama -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <!-- Header Background / Banner -->
                <div class="bg-primary p-4 text-center text-white position-relative" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
                    <h4 class="fw-bold mb-0">Profil Saya</h4>
                    <p class="mb-0 text-white-50 small">SMK YPC Tasikmalaya</p>
                </div>

                <div class="card-body px-4 py-5 text-center">
                    <!-- Foto Profil Kamu -->
                    <div class="mb-4 position-relative d-inline-block">
                        <img src="{{ asset('gambar/me.jpeg') }}"
                             class="rounded-circle shadow border border-4 border-white"
                             alt="Foto Profil Saya"
                             style="width: 140px; height: 140px; object-fit: cover;">
                        <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-light rounded-circle" title="Aktif">
                            <span class="visually-hidden">Status Aktif</span>
                        </span>
                    </div>

                    <!-- Nama Lengkap Kamu -->
                    <h3 class="fw-bold text-dark mb-1">Adelia Bahri</h3>
                    <p class="text-muted mb-4">SMK YPC Tasikmalaya</p>

                    <div class="row text-start justify-content-center">
                        <div class="col-md-9">
                            <hr class="mb-4">
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle">
                                    <tr>
                                        <td class="fw-semibold text-muted" style="width: 35%;">NISN</td>
                                        <td>: 0085484637</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold text-muted">Kelas</td>
                                        <td>: XII RPL</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold text-muted">Jurusan</td>
                                        <td>: Rekayasa Perangkat Lunak</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold text-muted">Jenis Kelamin</td>
                                        <td>: Perempuan</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold text-muted">Sekolah</td>
                                        <td>: SMK YPC Tasikmalaya</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="mt-4">
                        <a href="{{ url('/') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
