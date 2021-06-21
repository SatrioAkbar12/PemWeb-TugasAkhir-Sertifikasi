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
        $data_kompetensi = UnitKompetensiSertifikasi::where('id_ref_jenis_sertifikasi', $data->id_ref_jenis_sertifikasi)->get();

        return view('asesi.selfAsesmen.showView', ['data' => $data, 'data_kompetensi' => $data_kompetensi]);
    }

    public function showUnitKompetensi($id_sertifikasi, $id_ref_unit_kompetensi)
    {
        $data = RefUnitKompetensi::find($id_ref_unit_kompetensi);

        return view('asesi.selfAsesmen.show_unit_kompetensi', ['data' => $data, 'id_sertifikasi' => $id_sertifikasi]);
    }

    public function lockUnitKompetensi($id_sertifikasi, $id_ref_unit_kompetensi) {
        //Lock jawaban unit kompetensi
    }

    public function showJawab($id_sertifikasi, $id_ref_unit_kompetensi, $id_instrumen_asesmen) {
        $data = InstrumenAsesmenKompetensi::find($id_instrumen_asesmen);

        return view('asesi.selfAsesmen.form_jawab', ['data' => $data, 'id_sertifikasi' => $id_sertifikasi, 'id_ref_unit_kompetensi' => $id_ref_unit_kompetensi]);
    }

    public function jawab(Request $request, $id_sertifikasi, $id_ref_unit_kompetensi, $id_instrumen_asesmen)
    {
        $request->validate([
            'jawaban' => 'required'
        ]);

        $username = Auth::user()->username;
        $instrumen = InstrumenAsesmenKompetensi::find($id_instrumen_asesmen);
        $pendaftar = Pendaftar::where([
            'id_asesi' => Auth::user()->asesi->id,
            'id_penawaran_sertifikasi' => $id_sertifikasi
        ])->first();

        $path_file = null;

        if($request->file != null) {
            $file = $request->file('file');

            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'data_asesi/'.$username.'/'.$id_sertifikasi.'/'.$pendaftar->id.'/asesmen/'.$instrumen->id;
            $path_file = $tujuan_upload.'/'.$nama_file;

            $file->move($tujuan_upload, $nama_file);
        }

        $data_pendaftarInstrumen = PendaftarInstrumen::where([
            'id_pendaftar' => $pendaftar->id,
            'id_instrumen_asesmen' => $id_instrumen_asesmen
        ])->first();

        if($data_pendaftarInstrumen == null) {
            PendaftarInstrumen::create([
                'id_pendaftar' => $pendaftar->id,
                'id_instrumen_asesmen' => $id_instrumen_asesmen,
                'jawaban_self_asesmen' => $request->jawaban,
                'path_bukti' => $path_file,
                'komentar_bukti' => $request->komentar,
                'created_by' => Auth::user()->username,
                'edited_by' => Auth::user()->username
            ]);
        }
        else {
            PendaftarInstrumen::where('id', $data_pendaftarInstrumen->id)->update([
                'jawaban_self_asesmen' => $request->jawaban,
                'path_bukti' => $path_file,
                'komentar_bukti' => $request->komentar,
                'edited_by' => Auth::user()->username
            ]);
        }

        return redirect()->route('asesi.self-asesmen.show-unit-kompetensi', ['id_sertifikasi' => $id_sertifikasi, 'id_ref_unit_kompentensi' => $id_ref_unit_kompetensi]);
    }
}
