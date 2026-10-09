<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::orderBy('id', 'desc')->get();

        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|max:100',
            'nama_siswa' => 'required|max:100',
            'tingkat' => 'required|max:50',
            'peringkat' => 'required|max:50',
            'keterangan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tahun_ajaran' => 'required|max:20',
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $namaFoto = time() . '.' . $request->foto->extension();

            $request->foto->move(
                public_path('gambar/prestasi'),
                $namaFoto
            );
        }

        Prestasi::create([
            'nama_prestasi' => $request->nama_prestasi,
            'nama_siswa' => $request->nama_siswa,
            'tingkat' => $request->tingkat,
            'peringkat' => $request->peringkat,
            'keterangan' => $request->keterangan,
            'foto' => $namaFoto,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_prestasi' => 'required|max:100',
            'nama_siswa' => 'required|max:100',
            'tingkat' => 'required|max:50',
            'peringkat' => 'required|max:50',
            'keterangan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tahun_ajaran' => 'required|max:20',
        ]);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'nama_siswa' => $request->nama_siswa,
            'tingkat' => $request->tingkat,
            'peringkat' => $request->peringkat,
            'keterangan' => $request->keterangan,
            'tahun_ajaran' => $request->tahun_ajaran,
        ];

        if ($request->hasFile('foto')) {

            if (
                $prestasi->foto &&
                file_exists(public_path('gambar/prestasi/' . $prestasi->foto))
            ) {
                unlink(public_path('gambar/prestasi/' . $prestasi->foto));
            }

            $namaFoto = time() . '.' . $request->foto->extension();

            $request->foto->move(
                public_path('gambar/prestasi'),
                $namaFoto
            );

            $data['foto'] = $namaFoto;
        }

        $prestasi->update($data);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        if (
            $prestasi->foto &&
            file_exists(public_path('gambar/prestasi/' . $prestasi->foto))
        ) {
            unlink(public_path('gambar/prestasi/' . $prestasi->foto));
        }

        $prestasi->delete();

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }
}
