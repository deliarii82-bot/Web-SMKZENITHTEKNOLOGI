@extends('template')

@section('title', 'Profil Akun')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Profil Akun</h2>
        <p class="text-muted mb-0">
            Informasi akun yang sedang Login
        </p>
    </div>

    <div class="card border-0 shadow-sm" style="max-width: 650px;">

        <div class="card-body p-4">

            <div class="d-flex align-items-center mb-4">

                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                     style="width:80px;height:80px;font-size:32px;">

                    {{ strtoupper(substr(auth()->user()->username, 0, 1)) }}

                </div>

                <div>
                    <h4 class="fw-bold mb-1">
                        {{ auth()->user()->username }}
                    </h4>

                    <p class="text-muted mb-0">
                        {{ auth()->user()->role == 'Admin'
                            ? 'Administrator'
                            : 'Operator Admin Sekolah' }}
                    </p>
                </div>

            </div>

            <hr>

            <div class="mb-3">
                <label class="text-muted small">
                    Username
                </label>

                <div class="fw-semibold">
                    {{ auth()->user()->username }}
                </div>
            </div>

            <div>
                <label class="text-muted small">
                    Role
                </label>

                <div class="fw-semibold">
                    {{ auth()->user()->role }}
                </div>
            </div>

        </div>

    </div>

    {{-- TOMBOL KEMBALI --}}
    <div class="mt-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light border">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali
        </a>
    </div>

</div>

@endsection
