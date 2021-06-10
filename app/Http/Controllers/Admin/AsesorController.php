<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Asesor;
use App\Models\RefNegara;
use App\Models\RefJenisSertifikasi;
use App\Models\Prodi;
use App\Models\AsesorJenisSertifikasi;

class AsesorController extends Controller
{
    public function show() {
        $data_asesor = Asesor::all();

        return view('admin.asesor.show', ['data_asesor' => $data_asesor]);
    }

    public function showCreate() {
        $data_refnegara = RefNegara::all();
        $data_prodi = Prodi::all();
        $data_jenissertifikasi = RefJenisSertifikasi::all();

        return view('admin.asesor.form_tambah_data', ['data_refnegara' => $data_refnegara, 'data_prodi' => $data_prodi, 'data_jenissertifikasi' => $data_jenissertifikasi]);
    }

    public function create(Request $request) {
        $request->validate([
            'username' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|min:8|confirmed',
            'jenisSertifikasi' => 'required',
            'noSertifikat' => 'required',
            'tanggalAwalBerlaku' => 'date|required',
            'tanggalAkhirBerlaku' => 'date|required'
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

        Asesor::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
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

        $data_asesor = Asesor::where([
            'nik' => $request->nik,
            'nip' => $request->nip
        ])->first();

        AsesorJenisSertifikasi::create([
            'id_asesor' => $data_asesor->id,
            'id_ref_jenis_sertifikasi' => $request->jenisSertifikasi,
            'tanggal_awal_berlaku' => $request->tanggalAwalBerlaku,
            'tanggal_akhir_berlaku' => $request->tanggalAkhirBerlaku,
            'no_sertifikat' => $request->noSertifikat
        ]);

        return redirect('/admin/kelola-asesor');
    }

    public function read($id) {
        // $data_asesor = Asesor::find($id);
        // $data_refnegara = RefNegara::find($data_asesor->id_ref_negara);
        // $data_prodi = Prodi::find($data_asesor->id_prodi);

        // return view('admin.asesor.show_data', ['data_asesor' => $data_asesor, 'data_refnegara' => $data_refnegara, 'data_prodi' => $data_prodi]);

        $data = AsesorJenisSertifikasi::where([
            'id_asesor' => $id
        ])->first();

        // dd($data);

        return view('admin.asesor.show_data', ['data' => $data]);
    }

    public function showEdit($id) {
        $data_asesor = Asesor::find($id);
        $data_refnegara = RefNegara::all();
        $data_prodi = Prodi::all();

        return view('admin.asesor.form_edit_data', ['data_asesor' => $data_asesor, 'data_refnegara' => $data_refnegara, 'data_prodi' => $data_prodi]);
    }

    public function edit($id, Request $request) {
        $request->validate([
            'id_user' => 'required',
            'username' => 'required',
            'email' => 'required|email'
        ]);

        Asesor::where('id', $id)->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
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

        return redirect('/admin/kelola-asesor');
    }

    public function del($id) {
        $data_user = Asesor::find($id)->user;
        $data_user->delete();

        return redirect('/admin/kelola-asesor');
    }
}
