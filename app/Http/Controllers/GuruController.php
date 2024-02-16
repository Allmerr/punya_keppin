<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru.index', [
            'gurus' => Guru::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
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
            'nip' => 'required|unique:gurus,nip',
            'nama_guru' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Berhasil Menambah Guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit', [
            'guru' => $guru,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {

        // check if nothing change
        if($request->nip == $guru->nip && $request->nama_guru == $guru->nama_guru && $request->jk == $guru->jk && $request->alamat == $guru->alamat && $request->password == $guru->password ){
            return redirect()->back()->with('failed', 'Data Guru tidak ada yang berubah');
        }

        $rules = [
            'nama_guru' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ];

        if($request->nip !== $guru->nip){
            $rules['nip'] > 'required|unique:gurus,nip';
        }

        $request->validate($rules);

        $guru->update(
            $request->all(),
        );

        return redirect()->route('guru.index')->with('success', 'Guru Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Guru');
    }
}
