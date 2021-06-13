<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AsesiDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Asesi;
use App\Models\Asesor;
use App\Models\RefNegara;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;

class AsesiController extends Controller
{
    // public function index()
    // {
    //     // $data = Asesor::all();
    //     $data = Asesor::where('id_user',Auth::id())->get()->first();
    //     return view('asesor.asesor.lihat_data.show_data', ['data' => $data]);
    // }

    public function show() {
        $data = DB::table('asesi')->where('id_user',Auth::id())->get()->first();
        //$data = User::where('role', 'asesi')->get();
        $data_prodi = Prodi::find($data->id_prodi);
        $data_negara = RefNegara::find($data->id_ref_negara);
        return view('asesi.asesi.lihat_data.show_data', ['data' => $data , 'data_prodi' =>$data_prodi, 'data_negara' => $data_negara]);
        // return view('admin.asesi.show');
    }

    public function showEdit() {
        $data = DB::table('asesi')->where('id_user',Auth::id())->get()->first();
        $data_prodi = Prodi::all();
        $data_negara = RefNegara::all();
        return view('asesi.asesi.edit_data.form_edit_data', ['data' => $data , 'data_prodi' =>$data_prodi, 'data_negara' => $data_negara]);

    }

    // public function showEdit() {

    //     $data = Auth::user();

    //     return view('asesor.asesor.edit_data.form_edit_data', ['data' => $data ]);
    // }

    public function edit(Request $request) {
        // $request->validate([
        //     'username' => 'required',
        //     'email' => 'required',
        // ]);

        // $data_user = DB::table('User')->where([
        //     'username' => $request->username,
        //     'email' => $request->email
        // ])->first();


        DB::table('asesi')->where('id_user',Auth::id())->update([
            'nama' => $request->nama,
            // 'nip' => $request->nip,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tpl,
            'tanggal_lahir' => $request->tgl,
            'jenis_kelamin' => $request->jk,
            'id_ref_negara' => $request->negara,
            'alamat' => $request->alamat,
            'no_telepon' => $request->tlp,
            'kualifikasi_pendidikan' => $request->pend,
            'id_prodi' => $request->prodi,
            'edited_by' => Auth::user()->username,

        ]);

        return redirect('/asesi/edit-data');
    }

    // //sertifikasi
    // public function show_nilai() {
    //     $data_asesi = Asesi::all();

    //     return view('asesi.asesi.nilai_asesi.show_nilai', ['data_asesi' => $data_asesi]);
    // }

    // public function showEdit_nilai() {
    //     $data_asesi = Asesi::all();

    //     return view('asesi.asesi.nilai_asesi.form_nilai_asesi', ['data_asesi' => $data_asesi]);
    // }


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
