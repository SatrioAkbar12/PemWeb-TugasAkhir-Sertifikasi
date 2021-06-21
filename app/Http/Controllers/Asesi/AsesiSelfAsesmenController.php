<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\PendaftarInstrumen;
use App\Models\InstrumenAsesmenKompetensi;
use App\Models\PenawaranSertifikasi;
use App\Models\Pendaftar;
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
        $data = Pendaftar::where('status_akhir_sertifikasi', 'siap asesmen')->get();

<<<<<<< HEAD
        return view('asesi.selfAsesmen.index', ['data' => $data]);
=======
        $nomor=Auth::user()->id;
        $a = DB::table('asesi')
            ->where('asesi.id_user','=',$nomor)
            ->select('asesi.id')
            ->get();

        $b = $a->first()->id;

        $syarat = DB::table('penawaran_sertifikasi')
            ->leftJoin('pendaftar', 'penawaran_sertifikasi.id', '=', 'pendaftar.id_penawaran_sertifikasi')
            ->leftJoin('pendaftar_syarat','pendaftar.id','=','pendaftar_syarat.id_pendaftar')
            ->where('pendaftar.id_asesi',$b)
            ->where('pendaftar_syarat.status_verifikasi_syarat','lolos verifikasi')
            ->get();


        return view('asesi.selfAsesmen.index', ['data' => $data,'syarat'=>$syarat]);
>>>>>>> ae626b3668c9b1387343b52030f0db5783f20ef0
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

    public function showJawab($id_sertifikasi, $id_ref_unit_kompetensi, $id_instrumen_asesmen) {
        $data = InstrumenAsesmenKompetensi::find($id_instrumen_asesmen);

        return view('asesi.selfAsesmen.form_jawab', ['data' => $data, 'id_sertifikasi' => $id_sertifikasi, 'id_ref_unit_kompetensi' => $id_ref_unit_kompetensi]);
    }

    public function jawab(Request $request, $id_sertifikasi, $id_ref_unit_kompetensi, $id_instrumen_asesmen)
    {
        // $nomor=Auth::user()->id;
        // $a = DB::table('pendaftar')
        //     ->join('asesi','pendaftar.id_asesi','=','asesi.id')
        //     ->where('asesi.id_user','=',$nomor)
        //     ->select('pendaftar.id')
        //     ->get();

        // $b = $a->first()->id;

        // $request->validate([
        //     'jawaban_self_asesmen'=>'required|string',
        //     'path_bukti'=>'string'
        // ]);

        // PendaftarInstrumen::create([
        //     'id_pendaftar' => $b,
        //     'id_instrumen_asesmen'=>$id_sertifikasi,
        //     'jawaban_self_asesmen'=>$request->jawaban_self_asesmen,
        //     'path_bukti'=>$request->path_bukti,
        //     'komentar_bukti'=>' ',
        //     'jawaban_asesor_verifikasi'=>' ',
        //     'verified_by'=>' ',
        //     'created_by'=>Auth::user()->username,
        //     'edited_by'=>' '
        // ]);
        // return redirect('/asesi/self-asesmen');


    }
}
