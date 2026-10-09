<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        $ekstrakulikuler = Ekstrakulikuler::all();

        return view('admin.ekstrakulikuler.index', compact('ekstrakulikuler'));
    }

    public function create()
    {
        return view('admin.ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|max:40',
            'pembina' => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaGambar = null;

        if ($request->hasFile('gambar')) {
            $namaGambar = time() . '.' . $request->gambar->extension();

            $request->gambar->move(
                public_path('gambar/ekstrakulikuler'),
                $namaGambar
            );
        }

        Ekstrakulikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namaGambar,
        ]);

        return redirect()->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil ditambahkan.');
    }

    public function show(Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    public function edit(Ekstrakulikuler $ekstrakulikuler)
    {
        return view('admin.ekstrakulikuler.edit', compact('ekstrakulikuler'));
    }

    public function update(Request $request, Ekstrakulikuler $ekstrakulikuler)
    {
        $request->validate([
            'nama_ekskul' => 'required|max:40',
            'pembina' => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $namaGambar = time() . '.' . $request->gambar->extension();

            $request->gambar->move(
                public_path('gambar/ekstrakulikuler'),
                $namaGambar
            );

            $data['gambar'] = $namaGambar;
        }

        $ekstrakulikuler->update($data);

        return redirect()->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil diubah.');
    }

    public function destroy(Ekstrakulikuler $ekstrakulikuler)
    {
        $ekstrakulikuler->delete();

        return redirect()->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil dihapus.');
    }
}
