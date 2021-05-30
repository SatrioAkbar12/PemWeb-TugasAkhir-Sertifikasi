<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AsesorDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Asesi;
use App\Models\Asesor;
use App\Models\RefNegara;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;

class AsesorController extends Controller
{
    // public function index()
    // {
    //     // $data = Asesor::all();
    //     $data = Asesor::where('id_user',Auth::id())->get()->first();
    //     return view('asesor.asesor.lihat_data.show_data', ['data' => $data]);
    // }

    public function show() {
        $data = DB::table('asesor')->where('id_user',Auth::id())->get()->first();
        //$data = User::where('role', 'asesor')->get();

        return view('asesor.asesor.lihat_data.show_data', ['data' => $data]);
        // return view('admin.asesi.show');
    }

    public function showEdit() {
        $data = DB::table('asesor')->where('id_user',Auth::id())->get()->first();

        return view('asesor.asesor.edit_data.form_edit_data', ['data' => $data]);
    }

    // public function showEdit() {

    //     $data = Auth::user();

    //     return view('asesor.asesor.edit_data.form_edit_data', ['data' => $data ]);
    // }

    public function edit(Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
        ]);

        $data_user = User::where([
            'username' => $request->username,
            'email' => $request->email
        ])->first();


        DB::table('asesor')->where('id_user',Auth::id())->get()->first()->update([
            'nama' => $request->nama,
            'nip' => $request->nim,
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

        return redirect('/asesor/edit-data');
    }



    // public function showCreate() {
    //     $data_refnegara = RefNegara::all();
    //     $data_prodi = Prodi::all();
    //     return view('admin.asesi.form_tambah_data', ['ref_negara' => $data_refnegara, 'prodi' => $data_prodi]);
    // }

    // public function create(Request $request) {
    //     $request->validate([
    //         'email' => 'email|required',
    //         'password' => 'string|min:8|confirmed'
    //     ]);

    //     User::create([
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => 'asesor'
    //     ]);

        // $data_user = User::where([
        //     'username' => $request->username,
        //     'email' => $request->email
        // ])->first();

    //     Asesor::create([
            // 'nama' => $request->nama,
            // 'nip' => $request->nim,
            // 'nik' => $request->nik,
            // 'tempat_lahir' => $request->tempatlahir,
            // 'tanggal_lahir' => $request->tanggallahir,
            // 'jenis_kelamin' => $request->jeniskelamin,
            // 'id_ref_negara' => $request->ref_negara,
            // 'alamat' => $request->alamat,
            // 'no_telepon' => $request->no_telepon,
            // 'kualifikasi_pendidikan' => $request->kualifikasi_pendidikan,
            // 'id_prodi' => $request->prodi,
            // 'created_by' => Auth::user()->username,
            // 'edited_by' => Auth::user()->username,
            // 'id_user' => $data_user->id
    //     ]);



}
