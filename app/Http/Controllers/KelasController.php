<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelas.index', [
            'kelass' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
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
            'kelas' => 'required',
            'jurusan' => 'required',
            'rombel' => 'required',
        ]);

        // check if kelas or jurusan or rombel is used

        $isJurusanUsed = Kelas::where('kelas', $request->kelas)->where('jurusan', $request->jurusan)->where('rombel', $request->rombel)->exists();

        if($isJurusanUsed){
            return redirect()->back()->with('failed', 'Kelas atau Jurusan atau Rombel sudah Digunakan');
        }

        kelas::create(
            $request->all(),
        );

        return redirect()->route('kelas.index')->with('success', 'Kelas Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_kelas)
    {
        $kelas = Kelas::where('id', $id_kelas)->first();

        return view('kelas.edit', [
            'kelas' => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kelas)
    {
        $kelas = Kelas::where('id', $id_kelas)->first();

        $request->validate([
            'kelas' => 'required',
            'jurusan' => 'required',
            'rombel' => 'required',
        ]);

        // check if nothing change

        if($request->kelas == $kelas->kelas && $request->jurusan == $kelas->jurusan && $request->rombel == $kelas->rombel ){
            return redirect()->back()->with('failed', 'Kelas atau Jurusan atau Rombel tidak berubah');
        }

        // check if kelas or jurusan or rombel is used

        $isJurusanUsed = Kelas::where('kelas', $request->kelas)->where('jurusan', $request->jurusan)->where('rombel', $request->rombel)->exists();

        if($isJurusanUsed){
            return redirect()->back()->with('failed', 'Kelas atau Jurusan atau Rombel sudah Digunakan');
        }

        $kelas->update(
            $request->all(),
        );

        return redirect()->route('kelas.index')->with('success', 'Kelas Berhasil Dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_kelas)
    {
        $kelas = Kelas::where('id', $id_kelas)->first();
        $kelas->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus kelas');
    }
}
