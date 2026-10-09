@extends('template')

@section('title', 'Tambah User')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">
            Tambah User
        </h2>

        <p class="text-muted mb-0">
            Tambahkan data user baru
        </p>

          <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-2"></i>
                Kembali

            </a>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('user.store') }}" method="POST">

                @csrf

                {{-- USERNAME --}}
                <div class="mb-3">
                    <label class="form-label">
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           value="{{ old('username') }}"
                           required>
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label class="form-label">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                {{-- ROLE --}}
                <div class="mb-3">
                    <label class="form-label">
                        Role
                    </label>

                    <select name="role" class="form-select" required>
                        <option value="Operator">Operator</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                {{-- STATUS --}}
                <div class="mb-3">
                    <label class="form-label">
                        Status
                    </label>

                    <select name="status" class="form-select" required>
                        <option value="Aktif" selected>
                            Aktif
                        </option>

                        <option value="Tidak Aktif">
                            Tidak Aktif
                        </option>
                    </select>
                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-save me-2"></i>
                        Simpan
                    </button>

                     <button type="reset" class="btn btn-outline-secondary">

                            Batal

                        </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
