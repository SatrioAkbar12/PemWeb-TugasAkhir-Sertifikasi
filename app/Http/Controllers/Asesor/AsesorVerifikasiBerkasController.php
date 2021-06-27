<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Asesor;
use App\models\AsesorPendaftar;
use App\models\AsesorJenisSertifikasi;
use App\Models\InstrumenAsesmenKompetensi;
use App\Models\Pendaftar;
use App\Models\PendaftarInstrumen;
use App\models\PendaftarSyarat;
use App\Models\UnitKompetensiSertifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        return view('asesor.asesor.verifikasi_berkas.show_data', ['data' => $data_pendaftar, 'data_pendaftarsyarat' => $data_pendaftarsyarat, 'id_asesorpendaftar' => $id_asesorpendaftar]);
    }

    public function readSyarat($id_asesorpendaftar, $id_syarat) {
        $data_asesorpendaftar = AsesorPendaftar::find($id_asesorpendaftar);
        $data = PendaftarSyarat::where([
            'id_pendaftar' => $data_asesorpendaftar->id_pendaftar,
            'id_syarat_sertifikasi'=> $id_syarat
        ])->first();

        return view('asesor.asesor.verifikasi_berkas.show_syarat', ['data' => $data, 'id_asesorpendaftar' => $id_asesorpendaftar]);
    }

    public function showVerifikasi($id_asesorpendaftar, $id_syarat) {
        $data_asesorpendaftar = AsesorPendaftar::find($id_asesorpendaftar);
        $data = PendaftarSyarat::where([
            'id_pendaftar' => $data_asesorpendaftar->id_pendaftar,
            'id_syarat_sertifikasi'=> $id_syarat
        ])->first();

        return view('asesor.asesor.verifikasi_berkas.form_verifikasi', ['data' => $data, 'id_asesorpendaftar' => $id_asesorpendaftar, 'id_syarat' => $id_syarat]);
    }

    public function verifikasi($id_asesorpendaftar, $id_syarat, Request $request) {
        $request->validate([
            'status' => 'required'
        ]);

        $data_asesorpendaftar = AsesorPendaftar::find($id_asesorpendaftar);

        if($request->status == 'lolos verifikasi') {
            PendaftarSyarat::where([
                'id_pendaftar' => $data_asesorpendaftar->id_pendaftar,
                'id_syarat_sertifikasi' => $id_syarat
            ])->update([
                'status_verifikasi_syarat' => $request->status,
                'verifikasi_asesor' => $data_asesorpendaftar->asesorJenisSertifikasi->asesor->id,
                'komentar_asesor' => $request->komentar,
                'verified_by' => $data_asesorpendaftar->asesorJenisSertifikasi->asesor->nama,
                'verified_at' => now(),
                'edited_by' => Auth::user()->username
            ]);
        }
        else {
            PendaftarSyarat::where([
                'id_pendaftar' => $data_asesorpendaftar->id_pendaftar,
                'id_syarat_sertifikasi' => $id_syarat
            ])->update([
                'status_verifikasi_syarat' => $request->status,
                'verifikasi_asesor' => $data_asesorpendaftar->asesorJenisSertifikasi->asesor->id,
                'komentar_asesor' => $request->komentar,
                'edited_by' => Auth::user()->username
            ]);
        }

        $this->cekAllVerified($id_asesorpendaftar);

        return redirect()->route('asesor.verifikasi-berkas.read-syarat', ['id_asesorpendaftar' => $id_asesorpendaftar, 'id_syarat' => $id_syarat]);
    }

    public function cekAllVerified($id_asesorpendaftar) {
        $data_asesorpendaftar = AsesorPendaftar::find($id_asesorpendaftar);

        $data_pendaftarsyarat = PendaftarSyarat::where([
            'id_pendaftar' => $data_asesorpendaftar->id_pendaftar
        ])->get();

        $cek = 1;

        foreach($data_pendaftarsyarat as $d) {
            if($d->status_verifikasi_syarat != 'lolos verifikasi'){
                $cek = 0;
            }
        }

        if($cek == 1) {
            Pendaftar::where('id', $data_asesorpendaftar->id_pendaftar)->update([
                'status_akhir_sertifikasi' => 'siap asesmen'
            ]);
        }

        $pendaftar = Pendaftar::find($data_asesorpendaftar->id_pendaftar);
        $data_kompetensi = UnitKompetensiSertifikasi::where('id_ref_jenis_sertifikasi', $pendaftar->penawaranSertifikasi->id_ref_jenis_sertifikasi)->get();

        if($pendaftar->status_akhir_sertifikasi == 'siap asesmen') {
            foreach($data_kompetensi as $d_kompetensi) {
                if($d_kompetensi->refUnitKompetensi->is_aktif == 1) {
                    foreach($d_kompetensi->refUnitKompetensi->instrumenAsesmenKompetensi as $d_instrumen) {
                        PendaftarInstrumen::create([
                            'id_pendaftar' => $pendaftar->id,
                            'id_instrumen_asesmen' => $d_instrumen->id,
                            'created_by' => $pendaftar->asesi->user->username,
                            'edited_by' => $pendaftar->asesi->user->username
                        ]);
                    }
                }
            }
        }
    }
}
