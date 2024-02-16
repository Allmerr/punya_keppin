<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [];
        if(session('type_user') == 'siswa'){

        }else if(session('type_user') == 'guru'){
            $guru = Guru::where('id', session('id'))->first();
            $response['mengajars'] = Mengajar::where('guru_id', $guru->id)->get();
        }

        return view('nilai.index', $response);
    }

    public function nilai_kelas_index(Request $request, $mengajar_id){
        $nilais = Nilai::where('mengajar_id', $mengajar_id)->get();
        $mengajar = Mengajar::where('id', $mengajar_id)->first();
        return view('nilai.kelas.index', [
            'nilais' => $nilais,
            'mengajar' => $mengajar,
        ]);
    }

    public function nilai_kelas_create(Request $request, $mengajar_id){
        $mengajar = Mengajar::where('id', $mengajar_id)->first();
        $siswas = Siswa::where('kelas_id', $mengajar->kelas_id)->get();

        $responses = [
            'siswas' => $siswas,
            'mengajar' => $mengajar,
        ];

        return view('nilai.kelas.create', $responses);
    }


    public function nilai_kelas_edit(Request $request, $mengajar_id, $siswa_id){
        $mengajar = Mengajar::where('id', $mengajar_id)->first();
        $siswas = Siswa::where('kelas_id', $mengajar->kelas_id)->get();
        $nilai =  Nilai::where('mengajar_id', $mengajar_id)->where('siswa_id', $siswa_id)->first();

        return view('nilai.kelas.edit', [
            'mengajar' => $mengajar,
            'nilai' => $nilai,
            'siswas' => $siswas,
        ]);
    }

    public function nilai_kelas_store(Request $request, $mengajar_id){
        $mengajar = Mengajar::where('id', $mengajar_id)->first();

        // check if double

        $isNilaiUsed = Nilai::where('mengajar_id', $mengajar->id)->where('siswa_id', $request->siswa_id)->exists();

        if($isNilaiUsed){
            return redirect()->back()->with('failed', 'Sudah Memberikan Nilai');
        }

        Nilai::create([
            'mengajar_id' => $mengajar_id,
            'na' => ($request->uh + $request->uts + $request->uas) / 3 ,
            ...$request->all(),
        ]);

        return redirect()->route('nilai.kelas.index', $mengajar_id)->with('success', 'berhsail menambah niali');
    }

    public function nilai_kelas_update(Request $request, $mengajar_id){
        $mengajar = Mengajar::where('id', $mengajar_id)->first();

        // check if nilai did not change

        if($request->siswa_id == $mengajar->siswa_id && $request->mengajar_id == $mengajar_id){
            return redirect()->back()->with('failed', 'Data Nilai tidak ada yang berubah');
        }

        // check if double

        $isNilaiUsed = Nilai::where('mengajar_id', $mengajar->id)->where('siswa_id', $request->siswa_id)->exists();

        if($isNilaiUsed){
            return redirect()->back()->with('failed', 'Sudah Memberikan Nilai');
        }

        $nilai->update([
            'mengajar_id' => $mengajar_id,
            'na' => ($request->uh + $request->uts + $request->uas) / 3 ,
            ...$request->all(),
        ]);

        return redirect()->route('nilai.kelas.index', $mengajar_id)->with('success', 'berhsail menambah niali');
    }

    public function nilai_kelas_destroy(Request $request, $mengajar_id, $siswa_id){
        $mengajar = Mengajar::where('id', $mengajar_id)->first();

        $nilai =  Nilai::where('mengajar_id', $mengajar_id)->where('siswa_id', $siswa_id)->first();
        $nilai->delete();

        return redirect()->route('nilai.kelas.index', $mengajar_id)->with('success', 'berhsail menambah niali');
    }


}
