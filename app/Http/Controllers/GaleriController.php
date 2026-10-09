<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        // Pencarian
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('keterangan', 'like', '%' . $request->search . '%');
            });
        }

        // Filter kategori
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $galeri = $query->get();

        // Pilihan kategori sesuai ENUM database
        $kategori = [
            'Foto',
            'Video'
        ];

        return view('admin.galeri.index', compact('galeri', 'kategori'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'required',
            'file' => 'required|file|max:10240',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $namaFile = time() . '.' . $request->file->extension();

        $request->file->move(
            public_path('gambar/galeri'),
            $namaFile
        );

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $namaFile,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('galeri.index');
    }

    public function show(string $id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit(string $id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, string $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'required',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'file|max:10240'
            ]);

            $namaFile = time() . '.' . $request->file->extension();

            $request->file->move(
                public_path('gambar/galeri'),
                $namaFile
            );

            $data['file'] = $namaFile;
        }

        $galeri->update($data);

        return redirect()->route('galeri.index');
    }

    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->delete();

        return redirect()->route('galeri.index');
    }
}
