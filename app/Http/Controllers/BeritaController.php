<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
{
    $user = Auth::user();
    $query = Berita::query();


    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('isi', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->status) {
        $query->where('status', $request->status);
    }

    $berita = $query->orderBy('tanggal', 'desc')->get();


    $status = [
        'Publish',
        'Draft'
    ];

    return view('Admin.berita.index', compact('berita', 'status'));
}

    public function create()
    {
        return view('Admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:Publish,Draft',
        ]);

        $data = $request->except('gambar');


        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        $data['id_user'] = Auth::id();

        Berita::create($data);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }


    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        $user = Auth::user();

        // Pengamanan akses edit
        if ($user->role !== 'Admin' && $berita->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        return view('Admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);
        $user = Auth::user();

        // Pengamanan akses update
        if ($user->role !== 'Admin' && $berita->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:Publish,Draft',
        ]);

        $data = $request->except('gambar');
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);
        $user = Auth::user();

        // Pengamanan akses destroy
        if ($user->role !== 'Admin' && $berita->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
