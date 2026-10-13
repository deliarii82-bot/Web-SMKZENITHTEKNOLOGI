<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
 public function index(Request $request)
{
    $user = Auth::user();
    $query = Pengumuman::query();

    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('judul', 'like', '%' . $request->search . '%')
              ->orWhere('isi', 'like', '%' . $request->search . '%');
        });
    }


    if ($request->status) {
        $query->where('status', $request->status);
    }

    $pengumuman = $query->latest()->get();


    $status = [
        'Publish',
        'Draft'
    ];

    return view('Admin.pengumuman.index', compact('pengumuman', 'status'));
}

    public function create()
    {
        return view('Admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('Admin.pengumuman.show', compact('pengumuman'));
    }

   public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $user = Auth::user();

        // Sisipkan pengecekan ini di tengah
        if ($user->role !== 'Admin' && $pengumuman->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        return view('Admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ]);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
