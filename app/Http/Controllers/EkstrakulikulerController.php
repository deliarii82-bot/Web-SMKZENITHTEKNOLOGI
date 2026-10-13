<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EkstrakulikulerController extends Controller
{
public function index(Request $request)
{

    $ekstrakulikuler = Ekstrakulikuler::latest()->get();

    return view('Admin.ekstrakulikuler.index', compact('ekstrakulikuler'));
}
    public function create()
    {
        return view('Admin.ekstrakulikuler.create');
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
        $file = $request->file('gambar');
        $namaGambar = time() . '.' . $file->extension();

        $file->move(
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
        'id_user' => Auth::id(), // Menggunakan auth()->id() agar lebih konsisten
    ]);

    return redirect()->route('ekstrakulikuler.index')
        ->with('success', 'Data ekstrakulikuler berhasil ditambahkan.');
}
    public function show(Ekstrakulikuler $ekstrakulikuler)
    {
        $user = Auth::user();

        if ($user->role !== 'Admin' && $ekstrakulikuler->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        return view('Admin.ekstrakulikuler.show', compact('ekstrakulikuler'));
    }

    public function edit(Ekstrakulikuler $ekstrakulikuler)
    {
        $user = Auth::user();

        // Pengamanan akses edit
        if ($user->role !== 'Admin' && $ekstrakulikuler->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        return view('Admin.ekstrakulikuler.edit', compact('ekstrakulikuler'));
    }

    public function update(Request $request, Ekstrakulikuler $ekstrakulikuler)
    {
        $user = Auth::user();

        // Pengamanan akses update
        if ($user->role !== 'Admin' && $ekstrakulikuler->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

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
            // Hapus gambar lama jika ada
            if (
                $ekstrakulikuler->gambar &&
                file_exists(public_path('gambar/ekstrakulikuler/' . $ekstrakulikuler->gambar))
            ) {
                unlink(public_path('gambar/ekstrakulikuler/' . $ekstrakulikuler->gambar));
            }

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
        $user = Auth::user();

        // Pengamanan akses destroy
        if ($user->role !== 'Admin' && $ekstrakulikuler->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus file gambar fisik jika ada
        if (
            $ekstrakulikuler->gambar &&
            file_exists(public_path('gambar/ekstrakulikuler/' . $ekstrakulikuler->gambar))
        ) {
            unlink(public_path('gambar/ekstrakulikuler/' . $ekstrakulikuler->gambar));
        }

        $ekstrakulikuler->delete();

        return redirect()->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil dihapus.');
    }
}
