<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - {{ $profil->nama_sekolah ?? 'SMK Zenith' }}</title>

    <link rel="stylesheet"
        href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <style>
        body {
            min-height: 100vh;
            background: #f4f7fb;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: 0;
            border-radius: 18px;
        }

        .login-logo {
            width: 85px;
            height: 85px;
            object-fit: contain;
        }

        .form-label {
            background: #f1f3f5;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .form-control {
            border-radius: 10px;
            padding: 11px 14px;
        }

        .btn-login {
            border-radius: 10px;
            padding: 11px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="min-vh-100 d-flex align-items-center justify-content-center px-3">

        <div class="card login-card shadow-sm">

            <div class="card-body p-4 p-md-5">

                {{-- LOGO SEKOLAH --}}
                <div class="text-center mb-4">

                    @if ($profil && $profil->logo)
                        <img src="{{ asset('storage/' . $profil->logo) }}"
                            alt="Logo {{ $profil->nama_sekolah }}"
                            class="login-logo mb-3">
                    @else
                        <img src="{{ asset('assets/images/logo.png') }}"
                            alt="Logo Sekolah"
                            class="login-logo mb-3">
                    @endif

                    <h4 class="fw-bold mb-1">
                        {{ $profil->nama_sekolah ?? 'SMK Zenith' }}
                    </h4>

                    <p class="text-muted mb-0">
                        Login Admin
                    </p>

                </div>


                {{-- PESAN ERROR --}}
                @if (session('error'))
                    <div class="alert alert-danger py-2">
                        <i class="bi bi-exclamation-circle me-1"></i>
                        {{ session('error') }}
                    </div>
                @endif


                {{-- VALIDATION ERROR --}}
                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                {{-- FORM LOGIN --}}
                <form action="{{ route('login.proses') }}" method="POST">

                    @csrf

                    {{-- USERNAME --}}
                    <div class="mb-4">

                        <label for="username" class="form-label">
                            Username
                        </label>

                        <input type="text"
                            name="username"
                            id="username"
                            class="form-control mt-2 @error('username') is-invalid @enderror"
                            value="{{ old('username') }}"
                            placeholder="Masukkan username"
                            autocomplete="username"
                            autofocus>

                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- PASSWORD --}}
                    <div class="mb-4">

                        <label for="password" class="form-label">
                            Password
                        </label>

                        <input type="password"
                            name="password"
                            id="password"
                            class="form-control mt-2 @error('password') is-invalid @enderror"
                            placeholder="Masukkan password"
                            autocomplete="current-password">

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- BUTTON LOGIN --}}
                    <button type="submit"
                        class="btn btn-primary w-100 btn-login">

                        Login
                    </button>

                </form>


                {{-- KEMBALI --}}
                <div class="text-center mt-4">

                    <a href="{{ route('home') }}"
                        class="text-decoration-none text-muted">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali ke Beranda

                    </a>

                </div>

            </div>

        </div>

    </div>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
