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
use App\Models\RefUnitKompetensi;
use App\Models\UnitKompetensiSertifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AsesorVerifikasiInstrumenController extends Controller
{
    public function index() {
        $asesor_jenissertifikasi = AsesorJenisSertifikasi::where('id_asesor', Auth::user()->asesor->id)->first();
        $data_pendaftar = AsesorPendaftar::where('id_asesor_jenis_sertifikasi', $asesor_jenissertifikasi->id)->get();

        return view('asesor.asesor.verifikasi_instrumen.show', ['data_pendaftar' => $data_pendaftar]);
    }

    public function readPendaftar($id_pendaftar) {
        $data_pendaftar = Pendaftar::find($id_pendaftar);
        $data_pendaftarinstrumen = PendaftarInstrumen::where('id_pendaftar', $id_pendaftar)->get();
        $data_unitkompetensisertifikasi = UnitKompetensiSertifikasi::where('id_ref_jenis_sertifikasi', $data_pendaftar->penawaranSertifikasi->id_ref_jenis_sertifikasi)->get();

        return view('asesor.asesor.verifikasi_instrumen.show_data', ['data' => $data_pendaftar, 'data_unitkompetensisertifikasi' => $data_unitkompetensisertifikasi,'data_pendaftarinstrumen' => $data_pendaftarinstrumen]);
    }

    public function readInstrumen($id_pendaftar, $id_ref_unit_kompetensi) {
        $data = PendaftarInstrumen::where('id_pendaftar', $id_pendaftar)->get();
        $data_refunitkompetensi = RefUnitKompetensi::find($id_ref_unit_kompetensi);

        return view('asesor.asesor.verifikasi_instrumen.show_instrumen', ['data' => $data, 'data_refunitkompetensi' => $data_refunitkompetensi, 'id_pendaftar' => $id_pendaftar]);
    }

    public function verifikasi(Request $request, $id_pendaftar, $id_ref_unit_kompetensi) {
        $data_pendaftarinstrumen = PendaftarInstrumen::where('id_pendaftar', $id_pendaftar)->get();
        $data_instrumen = InstrumenAsesmenKompetensi::where('id_ref_unit_kompetensi', $id_ref_unit_kompetensi)->get();

        foreach ($data_instrumen as $instrumen) {
            $jawaban_asesor = $instrumen->id."_jawaban_asesor";

            foreach ($data_pendaftarinstrumen as $d_pendaftarinstrumen){
                if ($d_pendaftarinstrumen->id_instrumen_asesmen == $instrumen->id){
                    PendaftarInstrumen::where([
                        'id_pendaftar' => $id_pendaftar,
                        'id_instrumen_asesmen' => $instrumen->id
                    ])->update([
                        'jawaban_asesor_verifikasi' => $request->$jawaban_asesor,
                        'verified_by' => Auth::user()->username,
                        'verified_at' => now()
                    ]);
                    break;
                }
            }
        }

        return redirect()->route('asesor.verifikasi-instrumen.read-pendaftar', ['id_pendaftar' => $id_pendaftar]);
    }

    public function akhiriVerifikasi($id_pendaftar) {
        Pendaftar::where('id', $id_pendaftar)->update([
            'status_akhir_sertifikasi' => 'selesai penilaian'
        ]);

        return redirect()->route('asesor.verifikasi-instrumen.index');
    }
}
