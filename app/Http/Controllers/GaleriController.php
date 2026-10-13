<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('keterangan', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }
        $galeri = $query->latest()->get();
        $kategori = [
            'Foto',
            'Video'
        ];

        return view('Admin.galeri.index', compact('galeri', 'kategori'));
    }

    public function create()
    {
        return view('Admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'required',
            // Izinkan format gambar dan video (jpg, png, mp4, mkv, avi, dll)
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi,mkv|max:51200', // Maksimal 50MB
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
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        $user = Auth::user();

        // Pengamanan akses show
        if ($user->role !== 'Admin' && $galeri->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        return view('Admin.galeri.show', compact('galeri'));
    }

    public function edit(string $id)
    {

        $galeri = Galeri::where('id_galeri', $id)->firstOrFail();
        $user = Auth::user();

        // Pengecekan role yang aman
        $role = strtolower($user->role);
        if ($role !== 'Admin' && $galeri->id_user !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Pilihan kategori jika dibutuhkan di form edit
        $kategori = [
            'Foto',
            'Video'
        ];

        return view('admin.galeri.edit', compact('galeri', 'kategori'));
    }

    public function update(Request $request, string $id)
    {
        $galeri = Galeri::findOrFail($id);
        $user = Auth::user();

        // Pengamanan akses update
        if ($user->role !== 'Admin' && $galeri->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

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
                'file' => 'file|mimes:jpg,jpeg,png,mp4,mov,avi,mkv|max:20480'
            ]);


            if (
                $galeri->file &&
                file_exists(public_path('gambar/galeri/' . $galeri->file))
            ) {
                unlink(public_path('gambar/galeri/' . $galeri->file));
            }

            $namaFile = time() . '.' . $request->file->extension();

            $request->file->move(
                public_path('gambar/galeri'),
                $namaFile
            );

            $data['file'] = $namaFile;
        }

        $galeri->update($data);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        $user = Auth::user();

        // Pengamanan akses destroy
        if ($user->role !== 'Admin' && $galeri->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus file fisik jika ada
        if (
            $galeri->file &&
            file_exists(public_path('gambar/galeri/' . $galeri->file))
        ) {
            unlink(public_path('gambar/galeri/' . $galeri->file));
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus!');
    }
}
