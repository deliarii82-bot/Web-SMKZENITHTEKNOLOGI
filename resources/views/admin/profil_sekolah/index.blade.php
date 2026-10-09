@extends('template')

@section('title', 'Profil Sekolah')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Profil Sekolah
            </h2>

            <p class="text-muted mb-0">
                Informasi dan identitas {{ $profil->nama_sekolah ?? 'sekolah' }}
            </p>
        </div>

    </div>


    {{-- PESAN BERHASIL --}}
    @if(session('success'))

        <div class="alert alert-success" id="alert">

            {{ session('success') }}

        </div>

        <script>
            setTimeout(() => {
                document.getElementById('alert')?.remove();
            }, 3000);
        </script>

    @endif


    @if($profil)

        {{-- FOTO SEKOLAH --}}
        <div class="card border-0 shadow-sm overflow-hidden mb-4">

            <div style="
                height: 330px;
                position: relative;
                background: #e9ecef;
            ">

                @if($profil->foto)

                    <img
                        src="{{ asset('storage/' . $profil->foto) }}"
                        alt="Foto {{ $profil->nama_sekolah }}"
                        style="
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                        "
                    >

                @else

                    <div class="d-flex align-items-center justify-content-center h-100">

                        <i class="bi bi-building text-secondary"
                           style="font-size:70px;"></i>

                    </div>

                @endif


                {{-- OVERLAY --}}
                <div style="
                    position:absolute;
                    left:0;
                    right:0;
                    bottom:0;
                    height:110px;
                    background:linear-gradient(
                        transparent,
                        rgba(0,0,0,.65)
                    );
                "></div>

            </div>


            {{-- IDENTITAS SEKOLAH --}}
            <div class="card-body px-4 pb-4">

                <div class="row align-items-center">


                    {{-- LOGO --}}
                    <div class="col-md-2 text-center">

                        <div
                            class="bg-white rounded-4 shadow-sm p-2 mx-auto"
                            style="
                                width:120px;
                                height:120px;
                                margin-top:-55px;
                                position:relative;
                                z-index:2;
                            "
                        >

                            @if($profil->logo)

                                <img
                                    src="{{ asset('storage/' . $profil->logo) }}"
                                    alt="Logo {{ $profil->nama_sekolah }}"
                                    style="
                                        width:100%;
                                        height:100%;
                                        object-fit:contain;
                                    "
                                >

                            @else

                                <div
                                    class="d-flex align-items-center justify-content-center bg-light rounded-3"
                                    style="
                                        width:100%;
                                        height:100%;
                                    "
                                >

                                    <i class="bi bi-building text-secondary fs-1"></i>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- NAMA SEKOLAH --}}
                    <div class="col-md-10">

                        <span class="badge bg-primary-subtle text-primary mb-2">
                            PROFIL SEKOLAH
                        </span>

                        <h2 class="fw-bold mb-2">
                            {{ $profil->nama_sekolah }}
                        </h2>

                        <p class="text-muted mb-0">

                            <i class="bi bi-geo-alt me-1"></i>

                            {{ $profil->alamat }}

                        </p>

                    </div>

                </div>


                {{-- INFORMASI SEKOLAH --}}
                <div class="row g-4 mt-4">


                    {{-- KEPALA SEKOLAH --}}
                    <div class="col-md-4">

                        <div class="border rounded-3 p-3 h-100">

                            <div class="d-flex align-items-center gap-3">

                                @if($profil->foto_kepala_sekolah)

                                    <img
                                        src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                                        alt="Foto {{ $profil->kepala_sekolah }}"
                                        class="rounded-circle border"
                                        style="
                                            width:65px;
                                            height:65px;
                                            object-fit:cover;
                                        "
                                    >

                                @else

                                    <div
                                        class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                        style="
                                            width:65px;
                                            height:65px;
                                        "
                                    >
                                        <i class="bi bi-person text-secondary fs-3"></i>
                                    </div>

                                @endif

                                <div>

                                    <small class="text-muted d-block mb-1">
                                        Kepala Sekolah
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profil->kepala_sekolah }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- NPSN --}}
                    <div class="col-md-4">

                        <div class="border rounded-3 p-3 h-100">

                            <small class="text-muted d-block mb-1">
                                NPSN
                            </small>

                            <span class="fw-semibold">
                                {{ $profil->npsn }}
                            </span>

                        </div>

                    </div>


                    {{-- TAHUN BERDIRI --}}
                    <div class="col-md-4">

                        <div class="border rounded-3 p-3 h-100">

                            <small class="text-muted d-block mb-1">
                                Tahun Berdiri
                            </small>

                            <span class="fw-semibold">
                                {{ $profil->tahun_berdiri }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- TENTANG SEKOLAH + VISI MISI --}}
        <div class="row g-4 mb-4">


            {{-- TENTANG SEKOLAH --}}
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-3">
                            Tentang Sekolah
                        </h4>

                        <p class="text-muted mb-0"
                           style="line-height:1.8;">

                            {{ $profil->deskripsi }}

                        </p>

                    </div>

                </div>

            </div>


            {{-- VISI & MISI --}}
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-3">
                            Visi & Misi
                        </h4>

                        <p class="text-muted mb-0"
                           style="line-height:1.8;">

                            {{ $profil->visi_misi }}

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- KONTAK --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body p-4">

                <h5 class="fw-bold mb-3">
                    Informasi Kontak
                </h5>

                <div class="text-muted">

                    <i class="bi bi-telephone me-2"></i>

                    {{ $profil->kontak }}

                </div>

            </div>

        </div>


        {{-- CRUD --}}
        @if(auth()->user()->role == 'Admin')

            <div class="d-flex gap-2 mb-4">


                {{-- EDIT --}}
                <a
                    href="{{ route('profil-sekolah.edit', $profil->id_profil) }}"
                    class="btn btn-primary"
                >

                    <i class="bi bi-pencil me-2"></i>

                    Edit Profil

                </a>


                {{-- HAPUS --}}
                <form
                    action="{{ route('profil-sekolah.destroy', $profil->id_profil) }}"
                    method="POST"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-outline-danger"
                        onclick="return confirm('Yakin ingin menghapus profil sekolah ini?')"
                    >

                        <i class="bi bi-trash me-2"></i>

                        Hapus

                    </button>

                </form>

            </div>

        @endif


    @else


        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <i
                    class="bi bi-building text-muted"
                    style="font-size:60px;"
                ></i>

                <h5 class="fw-bold mt-3">
                    Belum Ada Profil Sekolah
                </h5>

                <p class="text-muted">
                    Silakan tambahkan data profil sekolah.
                </p>

                @if(auth()->user()->role == 'Admin')

                    <a
                        href="{{ route('profil-sekolah.create') }}"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-plus-lg me-2"></i>

                        Tambah Profil

                    </a>

                @endif

            </div>

        </div>

    @endif

</div>

@endsection
