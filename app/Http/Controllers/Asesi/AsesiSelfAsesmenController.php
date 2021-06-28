<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\PendaftarInstrumen;
use App\Models\InstrumenAsesmenKompetensi;
use App\Models\PenawaranSertifikasi;
use App\Models\Pendaftar;
use App\Models\PendaftarSyarat;
use App\Models\UnitKompetensiSertifikasi;
use App\Models\RefJenisSertifikasi;
use App\Models\RefUnitKompetensi;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AsesiSelfAsesmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pendaftar::where([
            'id_asesi' => Auth::user()->asesi->id,
            'status_akhir_sertifikasi' => 'siap asesmen'
        ])->get();

        return view('asesi.selfAsesmen.index', ['data' => $data]);
    }

    public function showView($id_sertifikasi)
    {
        $data = PenawaranSertifikasi::find($id_sertifikasi);
        $data_kompetensi = UnitKompetensiSertifikasi::where([
            'id_ref_jenis_sertifikasi' => $data->id_ref_jenis_sertifikasi,
            'is_aktif' => 1
        ])->get();
        $data_pendaftarinstrumen = PendaftarInstrumen::where('id_pendaftar', $this->getPendaftar($id_sertifikasi)->id)->get();

        return view('asesi.selfAsesmen.showView', ['data' => $data, 'data_kompetensi' => $data_kompetensi, 'data_pendaftarinstrumen' => $data_pendaftarinstrumen]);
    }

    public function showUnitKompetensi($id_sertifikasi, $id_ref_unit_kompetensi)
    {
        $pendaftar = $this->getPendaftar($id_sertifikasi);
        $data_refunitkompetensi = RefUnitKompetensi::find($id_ref_unit_kompetensi);
        $data = PendaftarInstrumen::where('id_pendaftar', $pendaftar->id)->get();

        return view('asesi.selfAsesmen.show_unit_kompetensi', ['data' => $data, 'id_sertifikasi' => $id_sertifikasi, 'data_refunitkompetensi' => $data_refunitkompetensi]);
    }

    public function storeAsesmen(Request $request, $id_sertifikasi, $id_ref_unit_kompetensi) {
        $pendaftar = $this->getPendaftar($id_sertifikasi);
        $instrumen_asesmen = InstrumenAsesmenKompetensi::where('id_ref_unit_kompetensi', $id_ref_unit_kompetensi)->get();

        foreach($instrumen_asesmen as $instrumen) {
            $jawaban = $instrumen->id."_jawaban";
            $upload = $instrumen->id."_upload";
            $uploadkomentar = $instrumen->id."_uploadkomentar";

            $file = $request->file($upload);
            $path = null;

            if($file != null) {
                $nama_file = $file->getClientOriginalName();
                $tujuan_upload = 'data_asesi'.Auth::user()->username.'/'.$id_sertifikasi.'/'.$pendaftar->id.'/asesmen/'.$instrumen->id;
                $path = $tujuan_upload.'/'.$nama_file;

                $file->move($tujuan_upload, $nama_file);
            }

            PendaftarInstrumen::where([
                'id_pendaftar' => $pendaftar->id,
                'id_instrumen_asesmen' => $instrumen->id
            ])->update([
                'jawaban_self_asesmen' => $request->$jawaban,
                'path_bukti' => $path,
                'komentar_bukti' => $request->$uploadkomentar,
                'edited_by' => Auth::user()->username
            ]);
        }

        return redirect()->route('asesi.self-asesmen.show-view', ['id_sertifikasi' => $id_sertifikasi]);
    }

    public function akhiriAsesmen($id_sertifikasi) {
        $pendaftar = $this->getPendaftar($id_sertifikasi);

        Pendaftar::where('id', $pendaftar->id)->update([
            'status_akhir_sertifikasi' => 'selesai asesmen'
        ]);

        return redirect()->route('asesi.self-asesmen.index');
    }

    public function getPendaftar($id_sertifikasi) {
        $pendaftar = Pendaftar::where([
            'id_asesi' => Auth::user()->asesi->id,
            'id_penawaran_sertifikasi' => $id_sertifikasi
        ])->first();

        return $pendaftar;
    }
}
