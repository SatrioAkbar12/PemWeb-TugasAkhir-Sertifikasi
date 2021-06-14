<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\PendaftarInstrumen;
use App\Models\InstrumenAsesmenKompetensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AsesiSelfAsesmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InstrumenAsesmenKompetensi::where('is_aktif', 1)->get();
        return view('asesi.selfAsesmen.index', ['data' => $data]);
    }

    public function showJawab($id)
    {
        $data = InstrumenAsesmenKompetensi::find($id);
        return view('asesi.selfAsesmen.form_jawab', ['data' => $data]);
    }
    public function jawab(Request $request, $id)
    {

        $nomor=Auth::user()->id;
        $a = DB::table('pendaftar')
            ->join('asesi','pendaftar.id_asesi','=','asesi.id')
            ->where('asesi.id_user','=',$nomor)
            ->select('pendaftar.id')
            ->get();

        $b = $a->first()->id;

        $request->validate([
            'jawaban_self_asesmen'=>'required|string',
            'path_bukti'=>'required|string',
            'komentar_bukti'=>'required|string',
            'jawaban_asesor_verifikasi'=>'required|string'
        ]);

        PendaftarInstrumen::create([

            'id_pendaftar' => $b,
            'id_instrumen_asesmen' =>$id,
            'jawaban_self_asesmen' => $request->jawaban_self_asesmen,
            'path_bukti' => $request->path_bukti,
            'komentar_bukti' => $request->komentar_bukti,
            'jawaban_asesor_verifikasi' => $request->jawaban_asesor_verifikasi,
            'verified_by' => Auth::user()->username,
            'created_by' => Auth::user()->username,
            'edited_by' => Auth::user()->username
        ]);

        return redirect('/asesi/self-asesmen');
    }
}
