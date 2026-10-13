<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index(Request $request)
{
    $query = Guru::query();

    // Pencarian
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('nama_guru', 'like', '%' . $request->search . '%')
              ->orWhere('nip', 'like', '%' . $request->search . '%')
              ->orWhere('mapel', 'like', '%' . $request->search . '%');
        });
    }

    // Filter jabatan
    if ($request->jabatan) {
        $query->where('jabatan', $request->jabatan);
    }

    // Urutkan dari A sampai Z
    $query->orderBy('nama_guru', 'asc');

    // Menggunakan paginate() agar pagination dan pencarian tetap sinkron
    $gurus = $query->paginate(10)->withQueryString();

    // Pilihan jabatan sesuai ENUM database
    $jabatan = [
        'Guru Mapel',
        'Guru Produktif',
        'Tenaga Kependidikan'
    ];

    return view('admin.guru.index', compact('gurus', 'jabatan'));
}

    public function create()
    {
        return view('admin.guru.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip' => 'required|numeric|unique:gurus,nip',
            'nip.unique' => 'NIP sudah terdaftar untuk guru lain!',
            'nip.numeric' => 'NIP harus berupa angka!',
            'mapel' => 'required|max:40',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $namaFoto = time() . '.' . $request->foto->extension();

        $request->foto->move(
            public_path('gambar/guru'),
            $namaFoto
        );

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'jabatan' => $request->jabatan,
            'foto' => $namaFoto
        ]);

        return redirect()->route('guru.index')
            ->with('success', 'Guru created successfully');
    }


    public function edit($id)
    {
        $data['guru'] = Guru::findOrFail($id);

        return view('admin.guru.edit', $data);
    }


   public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip' => 'required|numeric|unique:gurus,nip,' . $id . ',id_guru', // Tambahkan ,id_guru di sini
            'nama' => 'required|string|max:255',
            'mapel' => 'required|max:40'
        ]);

        $guru = Guru::findOrFail($id);

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'jabatan' => $request->jabatan
        ]);

        return redirect()->route('guru.index')
            ->with('success', 'Guru updated successfully');
    }


  public function destroy($id)
{
    if (strtolower(Auth::user()->role) !== 'admin') {
        abort(403, 'Maaf, operator tidak diizinkan menghapus data.');
    }

    $guru = Guru::findOrFail($id);
    $guru->delete();

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
}

    public function show($id)
{
    return redirect()->route('guru.index');
}
}
