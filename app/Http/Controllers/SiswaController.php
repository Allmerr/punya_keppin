<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.index', [
            'siswas' => Siswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create', [
            'kelass' => Kelas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama_siswa' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
            'password' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Berhasil Menambah Siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', [
            'siswa' => $siswa,
            'kelass' => Kelas::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        if($request->nis == $siswa->nis && $request->nama_siswa == $siswa->nama_siswa && $request->jk == $siswa->jk && $request->alamat == $siswa->alamat && $request->kelas_id == $siswa->kelas_id && $request->password == $siswa->password ){
            return redirect()->back()->with('failed', 'Data Siswa tidak ada yang berubah');
        }

        $rules = [
            'nama_siswa' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
            'password' => 'required',
        ];

        if($request->nis !== $siswa->nis){
            $rules['nis'] = 'required|unique:siswas,nis';
        }

        $request->validate($rules);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Berhasil Mengubah Siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Berhasil Menghapus Siswa');
    }
}
