<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        return view('admin.profil_sekolah.index', compact('profil'));
    }

    public function create()
    {
        return view('admin.profil_sekolah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|max:40',
            'kepala_sekolah' => 'required|max:40',

            'foto_kepala_sekolah' => 'required|image|mimes:jpg,jpeg,png|max:2048',

            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',

            'npsn' => 'required|max:10',
            'alamat' => 'required',
            'kontak' => 'required|max:15',
            'visi_misi' => 'required',
            'tahun_berdiri' => 'required',
            'deskripsi' => 'required',
        ]);

        $data = $request->except([
            'foto_kepala_sekolah',
            'foto',
            'logo'
        ]);

        // Foto kepala sekolah
        if ($request->hasFile('foto_kepala_sekolah')) {
            $data['foto_kepala_sekolah'] = $request
                ->file('foto_kepala_sekolah')
                ->store('profil_sekolah', 'public');
        }

        // Foto sekolah
        if ($request->hasFile('foto')) {
            $data['foto'] = $request
                ->file('foto')
                ->store('profil_sekolah', 'public');
        }

        // Logo sekolah
        if ($request->hasFile('logo')) {
            $data['logo'] = $request
                ->file('logo')
                ->store('profil_sekolah', 'public');
        }

        ProfilSekolah::create($data);

        return redirect()
            ->route('profil-sekolah.index')
            ->with('success', 'Profil sekolah berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        return view('admin.profil_sekolah.show', compact('profil'));
    }

    public function edit(string $id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        return view('admin.profil_sekolah.edit', compact('profil'));
    }

    public function update(Request $request, string $id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        $request->validate([
            'nama_sekolah' => 'required|max:40',
            'kepala_sekolah' => 'required|max:40',

            'foto_kepala_sekolah' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'npsn' => 'required|max:10',
            'alamat' => 'required',
            'kontak' => 'required|max:15',
            'visi_misi' => 'required',
            'tahun_berdiri' => 'required',
            'deskripsi' => 'required',
        ]);

        $data = $request->except([
            'foto_kepala_sekolah',
            'foto',
            'logo'
        ]);

        // Foto kepala sekolah
        if ($request->hasFile('foto_kepala_sekolah')) {
            $data['foto_kepala_sekolah'] = $request
                ->file('foto_kepala_sekolah')
                ->store('profil_sekolah', 'public');
        }

        // Foto sekolah
        if ($request->hasFile('foto')) {
            $data['foto'] = $request
                ->file('foto')
                ->store('profil_sekolah', 'public');
        }

        // Logo sekolah
        if ($request->hasFile('logo')) {
            $data['logo'] = $request
                ->file('logo')
                ->store('profil_sekolah', 'public');
        }

        $profil->update($data);

        return redirect()
            ->route('profil-sekolah.index')
            ->with('success', 'Profil sekolah berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        $profil->delete();

        return redirect()
            ->route('profil-sekolah.index')
            ->with('success', 'Profil sekolah berhasil dihapus.');
    }
}
