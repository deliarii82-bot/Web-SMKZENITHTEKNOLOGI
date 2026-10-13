<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $query = Siswa::with(['jurusan', 'kelasRelasi']);

        // Pencarian
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_siswa', 'like', '%' . $request->search . '%')
                  ->orWhere('nisn', 'like', '%' . $request->search . '%');
            });
        }

        // Filter jenis kelamin
        if ($request->jenis_kelamin) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

       $siswa = $query->orderBy('nama_siswa', 'asc')->get();

        $jenisKelamin = [
            'laki-laki',
            'perempuan'
        ];

        return view('admin.siswa.index', compact(
            'siswa',
            'jenisKelamin'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $jurusans = Jurusan::all();
    $kelasList = Kelas::all();

    return view('admin.siswa.create', compact('jurusans', 'kelasList'));
}
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'kelas_id' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tahun_masuk' => 'required|digits:4',
            'id_jurusan' => 'required',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
            'id_jurusan' => $request->id_jurusan,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil disimpan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $jurusans = Jurusan::all();
        $kelasList = Kelas::all();

        return view('admin.siswa.edit', compact('siswa', 'jurusans', 'kelasList'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'kelas_id' => 'required', // Tangkap dari form edit
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tahun_masuk' => 'required|digits:4',
            'id_jurusan' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas_id, // Masukkan ke kolom database 'kelas'
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
            'id_jurusan' => $request->id_jurusan,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()->route('siswa.index');
    }

    public function publicIndex()
    {
        $siswa = Siswa::with('jurusan')->orderBy('nama_siswa', 'asc')->get();

        return view('landing.index', compact('siswa'));
    }


}
