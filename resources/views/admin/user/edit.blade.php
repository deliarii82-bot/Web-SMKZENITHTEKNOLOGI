@extends('template')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Edit User</h2>
        <p class="text-muted mb-0">
            Ubah data pengguna
        </p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="max-width: 700px;">

        <div class="card-body p-4">

            <form action="{{ route('user.update', $user->id_user) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- USERNAME --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           value="{{ old('username', $user->username) }}"
                           required>

                </div>


                {{-- PASSWORD --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengubah password.
                    </small>

                </div>


                {{-- ROLE --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Role
                    </label>

                    <select name="role" class="form-select" required>

                        <option value="Admin"
                            {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="Operator"
                            {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>
                            Operator
                        </option>

                    </select>

                </div>


                {{-- STATUS --}}
<div class="mb-4">

    <label class="form-label fw-semibold">
        Status
    </label>

    <select name="status" class="form-select" required>

        <option value="Aktif"
            {{ old('status', $user->status) == 'Aktif' ? 'selected' : '' }}>
            Aktif
        </option>

        <option value="Tidak Aktif"
            {{ old('status', $user->status) == 'Tidak Aktif' ? 'selected' : '' }}>
            Tidak Aktif
        </option>

    </select>

</div>


                {{-- TOMBOL --}}
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('user.index') }}"
                       class="btn btn-light border">

                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-check-lg me-2"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
