<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asesi;
use App\Models\RefNegara;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;

class RegisteredAsesiController extends Controller
{
    //
    public function create(){
        $refNegara=RefNegara::all();
        $refProdi=Prodi::all();
        return view('asesi.isiData.form_isiData',['ref_negara'=>$refNegara,'ref_prodi'=>$refProdi]);
    }


    public function store(Request $request){
        Asesi::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempatlahir,
            'tanggal_lahir' => $request->tanggallahir,
            'jenis_kelamin' => $request->jeniskelamin,
            'id_ref_negara' => $request->ref_negara,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'kualifikasi_pendidikan' => $request->kualifikasi_pendidikan,
            'id_prodi' => $request->prodi,
            'created_by' => Auth::user()->username,
            'edited_by' => Auth::user()->username,
            'id_user' => Auth::user()->id
        ]);
        return redirect('/dashboard');
    }
}
