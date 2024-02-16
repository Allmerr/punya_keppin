<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mengajar.index', [
            'mengajars' => Mengajar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mengajar.create', [
            'gurus' => Guru::all(),
            'mapels' => Mapel::all(),
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
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        // check if mengajar is used

        $isMengajarUsed = Mengajar::where('guru_id', $request->guru_id)->where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->exists();

        if($isMengajarUsed){
            return redirect()->back()->with('failed', 'Guru dan Mapel atau Kelas sudah Digunakan');
        }

        Mengajar::create($request->all());

        return redirect()->route('mengajar.index')->with('success', 'Berhasil Menambah Mengajar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function show(Mengajar $mengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function edit(Mengajar $mengajar)
    {
        return view('mengajar.edit', [
            'mengajar' => $mengajar,
            'kelass' => Kelas::all(),
            'mapels' => Mapel::all(),
            'gurus' => Guru::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mengajar $mengajar)
    {

        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        // check if mengajar didnot change
        if($request->guru_id == $mengajar->guru_id && $request->mapel_id == $mengajar->mapel_id && $request->kelas_id == $mengajar->kelas_id ){
            return redirect()->back()->with('failed', 'Guru dan Mapel dan Kelas tidak berubah');
        }

        // check if mengajar is used

        $isMengajarUsed = Mengajar::where('guru_id', $request->guru_id)->where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->exists();

        if($isMengajarUsed){
            return redirect()->back()->with('failed', 'Guru dan Mapel atau Kelas sudah Digunakan');
        }

        $mengajar->update($request->all());

        return redirect()->route('mengajar.index')->with('success', 'Berhasil Mengubah Mengajar');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mengajar $mengajar)
    {
        $mengajar->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Mengajar');
    }
}
