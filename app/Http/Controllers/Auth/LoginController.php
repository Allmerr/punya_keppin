<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){

        $rules = ['password' => 'required'];
        if($request->type_user === 'siswa'){
            $rules['nis'] = 'required';
        }else if($request->type_user === 'guru'){
            $rules['nip'] = 'required';
        }else if($request->type_user === 'admin'){
            $rules['kode_admin'] = 'required';
        }

        $request->validate($rules);

        if($request->type_user === 'siswa'){
            $siswa = Siswa::where('nis', $request->nis)->where('password', $request->password)->first();

            if($siswa == null){
                return redirect()->back()->with('failed', 'NIS atau Password Salah');
            }else{
                session([
                    'type_user' => $request->type_user,
                    'id' => $siswa->id
                ]);
            }
        }else if($request->type_user === 'guru'){
            $guru = Guru::where('nip', $request->nip)->where('password', $request->password)->first();

            if($guru == null){
                return redirect()->back()->with('failed', 'NIP atau Password Salah');
            }else{
                session([
                    'type_user' => $request->type_user,
                    'id' => $guru->id
                ]);
            }
        }else if($request->type_user === 'admin'){
            $admin = Administrator::where('kode_admin', $request->kode_admin)->where('password', $request->password)->first();

            if($admin == null){
                return redirect()->back()->with('failed', 'Kode Admin atau Password Salah');
            }else{
                session([
                    'type_user' => $request->type_user,
                    'id' => $admin->id
                ]);
            }
        }

        return redirect()->route('home')->with('success', 'Berhasil Login');

    }
}
