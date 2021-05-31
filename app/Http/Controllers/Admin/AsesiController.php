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
        $data_user = User::where('role', 'asesor')->get();
        $data_asesi = Asesi::all();

        return view('admin.asesi.show', ['data_user' => $data_user, 'data_asesi' => $data_asesi]);
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

    public function read($id) {
        $data_asesi = Asesi::find($id);
        $data_user = User::find($data_asesi->id_user);
        $data_refnegara = RefNegara::find($data_asesi->id_ref_negara);
        $data_prodi = Prodi::find($data_asesi->id_prodi);

        return view('admin.asesi.show_data', ['data_asesi' => $data_asesi, 'data_user' => $data_user, 'data_refnegara' => $data_refnegara, 'data_prodi' => $data_prodi]);
    }

    public function showEdit($id) {
        $data_asesi = Asesi::find($id);
        $data_user = User::find($data_asesi->id_user);
        $data_refnegara = RefNegara::all();
        $data_prodi = Prodi::all();

        return view('admin.asesi.form_edit_data', ['data_asesi' => $data_asesi, 'data_user' => $data_user, 'data_refnegara' => $data_refnegara, 'data_prodi' => $data_prodi]);
    }

    public function edit($id, Request $request) {
        $request->validate([
            'id_user' => 'required',
            'username' => 'required',
            'email' => 'required|email'
        ]);

        Asesi::where('id', $id)->update([
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
            'edited_by' => Auth::user()->username
        ]);

        User::where('id', $request->id_user)->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect('/admin/kelola-asesi');
    }

    public function del($id) {
        $data = Asesi::find($id);
        $data_user = User::find($data->id_user);
        $data->delete();
        $data_user->delete();

        return redirect('/admin/kelola-asesi');
    }
}
