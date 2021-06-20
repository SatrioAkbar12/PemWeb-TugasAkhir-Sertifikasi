<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Asesor;
use App\models\AsesorPendaftar;
use App\models\AsesorJenisSertifikasi;
use App\models\PendaftarSyarat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class AsesorVerifikasiBerkasController extends Controller
{
    public function index() {
        $data_user = Auth::user()-> id;
        $data_asesor = Asesor::where('id_user', $data_user)->first();
        $data_asesor_jenis_sertifikasi = AsesorJenisSertifikasi::where('id_asesor', $data_asesor->id)->first();
        $data_pendaftar = AsesorPendaftar::where('id_asesor_jenis_sertifikasi', $data_asesor_jenis_sertifikasi->id)->get();

        return view('asesor.asesor.verifikasi_berkas.show', ['data_pendaftar' => $data_pendaftar]);
    }

    public function readPendaftar($id_asesorpendaftar) {
        $data_pendaftar = AsesorPendaftar::where(['id' => $id_asesorpendaftar])->first();
        $data_pendaftarsyarat = PendaftarSyarat::where('id_pendaftar', $data_pendaftar->id_pendaftar)->get();

        return view('asesor.asesor.verifikasi_berkas.show_data', ['data' => $data_pendaftar, 'data_pendaftarsyarat' => $data_pendaftarsyarat]);
    }

    public function readSyarat($id_asesorpendaftar, $id_syarat) {


        return view('asesor.asesor.verifikasi_berkas.show_syarat');
    }

    public function showVerifikasi($id_asesorpendaftar, $id_syarat) {

    }

    public function verifikasi($id_asesorpendaftar, $id_syarat, Request $request) {
        // $request->validate([
        //     'id_user' => 'required',
        //     'username' => 'required',
        //     'email' => 'required|email'
        // ]);

        PendaftarSyarat::where('id', $id_syarat)->update([
            'verifikasi_asesor' => $request->verifikasi_asesor,
            'komentar_asesor' => $request->komentar_asesor,
            'edited_by' => Auth::user()->username
        ]);

        User::where('id', $request->id_user)->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect('/asesor/verifikasi-berkas/form_edit_data');
    }
}
