<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestasiController extends Controller
{
   public function index(Request $request)
{
    $query = Prestasi::query();

    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('nama_prestasi', 'like', '%' . $request->search . '%')
              ->orWhere('nama_siswa', 'like', '%' . $request->search . '%');
        });
    }

    // Filter tingkat
    if ($request->tingkat) {
        $query->where('tingkat', $request->tingkat);
    }

    $prestasi = $query->orderBy('id', 'desc')->get();

    // Daftar tingkat sesuai ENUM di database
    $daftarTingkat = [
        'Sekolah',
        'Kecamatan',
        'Kabupaten/Kota',
        'Provinsi',
        'Nasional',
        'Internasional'
    ];

    return view('Admin.prestasi.index', compact(
        'prestasi',
        'daftarTingkat'
    ));
}

    public function create()
    {
        return view('Admin.prestasi.create');
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
            'id_user' => Auth::id(),
        ]);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $user = Auth::user();

        // Pengamanan akses edit
        if ($user->role !== 'Admin' && $prestasi->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

        return view('Admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $user = Auth::user();

        // Pengamanan akses update
        if ($user->role !== 'Admin' && $prestasi->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

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
        $user = Auth::user();

        // Pengamanan akses hapus
        if ($user->role !== 'Admin' && $prestasi->id_user !== $user->id_user) {
            abort(403, 'Unauthorized action.');
        }

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
