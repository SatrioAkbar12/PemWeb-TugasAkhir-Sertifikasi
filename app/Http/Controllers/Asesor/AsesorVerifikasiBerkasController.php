<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Asesor;
use App\models\AsesorPendaftar;
use App\models\AsesorJenisSertifikasi;
use Illuminate\Support\Facades\Auth;

class AsesorVerifikasiBerkasController extends Controller
{
    public function index() {
        $data_user = Auth::user()-> id;
        $data_asesor = Asesor::where('id_user', $data_user)->first();
        $data_asesor_jenis_sertifikasi = AsesorJenisSertifikasi::where('id_asesor', $data_asesor->id)->first();
        $data_pendaftar = AsesorPendaftar::where('id_asesor_jenis_sertifikasi', $data_asesor_jenis_sertifikasi->id)->get();
        
        return view('asesor.asesor.verifikasi_berkas.show_data', ['data_pendaftar' => $data_pendaftar]);
    }
}
