<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(Request $request){

        $response = [];
        if(session('type_user') === 'siswa'){
            $siswa = Siswa::where('id', session('id'))->first();
            $response['nama'] = $siswa->nama_siswa;
        }else if(session('type_user') === 'guru'){
            $guru = Guru::where('id', session('id'))->first();
            $response['nama'] = $guru->nama_guru;
        }else if(session('type_user') === 'admin'){
            $admin = Administrator::where('id', session('id'))->first();
            $response['nama'] = $admin->kode_admin;
        }

        return view('home', $response);
    }
}
