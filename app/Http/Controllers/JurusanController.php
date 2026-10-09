<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();

        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|max:100',
            'singkatan' => 'required|max:20',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('jurusan', 'public');
        }

        Jurusan::create($data);

        return redirect()->route('jurusan.index');

    }

    public function show(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        return view('admin.jurusan.show', compact('jurusan'));
    }

    public function edit(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, string $id)
    {
         $jurusan = Jurusan::findOrFail($id);

    $request->validate([
        'nama_jurusan' => 'required|string|max:100',
        'singkatan' => 'required|string|max:20',
        'deskripsi' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $jurusan->nama_jurusan = $request->nama_jurusan;
    $jurusan->singkatan = $request->singkatan;
    $jurusan->deskripsi = $request->deskripsi;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto')->store('jurusan', 'public');
        $jurusan->foto = $foto;
    }

    $jurusan->save();

    return redirect()
        ->route('jurusan.index')
        ->with('success', 'Program keahlian berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $jurusan->delete();

        return redirect()->route('jurusan.index');
    }
}
