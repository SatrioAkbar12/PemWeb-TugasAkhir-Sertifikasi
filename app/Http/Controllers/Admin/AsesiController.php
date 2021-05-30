<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Asesi;
use App\Models\RefNegara;
use App\Models\Prodi;

class AsesiController extends Controller
{
    public function show() {
        $data = User::where('role', 'asesor')->get();

        return view('admin.asesi.show', ['data' => $data]);
        // return view('admin.asesi.show');
    }

    public function showCreate() {
        $data_refnegara = RefNegara::all();
        $data_prodi = Prodi::all();
        return view('admin.asesi.form_tambah_data', ['ref_negara' => $data_refnegara, 'prodi' => $data_prodi]);
    }

    public function create(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'string|min:8|confirmed'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'asesor'
        ]);

        $data_user = User::where([
            'username' => $request->username,
            'email' => $request->email
        ])->first();

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
            'id_user' => $data_user->id
        ]);

        return redirect('/admin/kelola-asesi');
    }
}
