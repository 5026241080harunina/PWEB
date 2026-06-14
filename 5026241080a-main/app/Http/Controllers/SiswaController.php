<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = DB::table('siswa')->orderBy('NRP')->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NRP' => 'required|string|max:10|unique:siswa,NRP',
            'Nama' => 'required|string|max:20',
            'Kelas' => 'required|string|max:5',
            'TanggalLahir' => 'required|date',
        ]);

        DB::table('siswa')->insert([
            'NRP' => $request->NRP,
            'Nama' => $request->Nama,
            'Kelas' => $request->Kelas,
            'TanggalLahir' => $request->TanggalLahir,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($nrp)
    {
        $siswa = DB::table('siswa')->where('NRP', $nrp)->first();

        if (!$siswa) {
            abort(404);
        }

        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $nrp)
    {
        $request->validate([
            'NRP' => [
                'required',
                'string',
                'max:10',
                Rule::unique('siswa', 'NRP')->ignore($nrp, 'NRP'),
            ],
            'Nama' => 'required|string|max:20',
            'Kelas' => 'required|string|max:5',
            'TanggalLahir' => 'required|date',
        ]);

        DB::table('siswa')
            ->where('NRP', $nrp)
            ->update([
                'NRP' => $request->NRP,
                'Nama' => $request->Nama,
                'Kelas' => $request->Kelas,
                'TanggalLahir' => $request->TanggalLahir,
            ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah.');
    }

    public function destroy($nrp)
    {
        DB::table('siswa')->where('NRP', $nrp)->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
