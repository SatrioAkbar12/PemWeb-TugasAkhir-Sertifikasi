<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Asesor;
use App\models\AsesorPendaftar;
use App\models\AsesorJenisSertifikasi;
use App\Models\Pendaftar;
use App\Models\PendaftarInstrumen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AsesorVerifikasiInstrumenController extends Controller
{
    public function index() {
        $data_user = Auth::user()-> id;
        $data_asesor = Asesor::where('id_user', $data_user)->first();
        $data_asesor_jenis_sertifikasi = AsesorJenisSertifikasi::where('id_asesor', $data_asesor->id)->first();
        $data_pendaftar = AsesorPendaftar::where('id_asesor_jenis_sertifikasi', $data_asesor_jenis_sertifikasi->id)->get();

        return view('asesor.asesor.verifikasi_instrumen.show', ['data_pendaftar' => $data_pendaftar]);
    }

    public function readPendaftar($id_asesorpendaftar) {
        $data_pendaftar = AsesorPendaftar::where(['id' => $id_asesorpendaftar])->first();
        $data_pendaftarinstrumen = PendaftarInstrumen::where('id_pendaftar', $data_pendaftar->id_pendaftar)->get();

        return view('asesor.asesor.verifikasi_instrumen.show_data', ['data' => $data_pendaftar, 'data_pendaftarinstrumen' => $data_pendaftarinstrumen, 'id_asesorpendaftar' => $id_asesorpendaftar]);
    }

    public function readInstrumen($id_asesorpendaftar, $id_instrumen) {
        $data_asesorpendaftar = AsesorPendaftar::find($id_asesorpendaftar);
        $data = PendaftarInstrumen::where([
            'id_pendaftar' => $data_asesorpendaftar->id_pendaftar,
            'id_instrumen_asesmen'=> $id_instrumen
        ])->first();

        return view('asesor.asesor.verifikasi_instrumen.show_instrumen', ['data' => $data, 'id_asesorpendaftar' => $id_asesorpendaftar]);
    }

    public function showVerifikasi($id_asesorpendaftar, $id_instrumen) {
        $data_asesorpendaftar = AsesorPendaftar::find($id_asesorpendaftar);
        $data = PendaftarInstrumen::where([
            'id_pendaftar' => $data_asesorpendaftar->id_pendaftar,
            'id_instrumen_asesmen'=> $id_instrumen
        ])->first();

        return view('asesor.asesor.verifikasi_instrumen.form_jawaban', ['data' => $data, 'id_asesorpendaftar' => $id_asesorpendaftar, 'id_Instrumen' => $id_instrumen]);
    }

    public function verifikasi($id_asesorpendaftar, $id_instrumen, Request $request) {
 

        $data_asesorpendaftar = AsesorPendaftar::find($id_asesorpendaftar);

    
            PendaftarInstrumen::where([
                'id_pendaftar' => $data_asesorpendaftar->id_pendaftar,
                'id_instrumen_asesmen'=> $id_instrumen
            ])->update([
                'jawaban_asesor_verifikasi' => $request->jawaban,
                'verified_by' => $data_asesorpendaftar->asesorJenisSertifikasi->asesor->nama,
                'verified_at' => now(),
                'edited_by' => Auth::user()->username
            ]);
    

        // $this->cekAllVerified($id_asesorpendaftar);

        return redirect()->route('asesor.verifikasi-instrumen.read-instrumen', ['id_asesorpendaftar' => $id_asesorpendaftar, 'id_instrumen' => $id_instrumen]);
    }

    // public function cekAllVerified($id_asesorpendaftar) {
    //     $data_asesorpendaftar = AsesorPendaftar::find($id_asesorpendaftar);

    //     $data_pendaftarInstrumen = PendaftarSyarat::where([
    //         'id_pendaftar' => $data_asesorpendaftar->id_pendaftar
    //     ])->get();

    //     $cek = 1;

    //     foreach($data_pendaftarsyarat as $d) {
    //         if($d->status_verifikasi_syarat != 'lolos verifikasi'){
    //             $cek = 0;
    //         }
    //     }

    //     if($cek == 1) {
    //         Pendaftar::where('id', $data_asesorpendaftar->id_pendaftar)->update([
    //             'status_akhir_sertifikasi' => 'siap asesmen'
    //         ]);
    //     }
    // }
}
