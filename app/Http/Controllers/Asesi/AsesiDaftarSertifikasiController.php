<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\PenawaranSertifikasi;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;
use App\Models\Asesi;
use DB;

class AsesiDaftarSertifikasiController extends Controller
{
    public function index()
    {
        $data = PenawaranSertifikasi::all();
        return view('asesi.daftarSertifikasi.index', ['data' => $data]);
    }
    public function showDaftar($id)
    {
        $data = PenawaranSertifikasi::find($id);
        return view('asesi.daftarSertifikasi.form_daftar', ['data' => $data]);
    }
    public function daftar(Request $request, $id)
    {

        $nomor=Auth::user()->id;
        $a = DB::table('asesi')
            ->where('asesi.id_user','=',$nomor)
            ->select('asesi.id')
            ->get();

        $b = $a->first()->id;

        $request->validate([
            'status_akhir_sertifikasi'=>'required|string',
            'tanggal_status_akhir'=>'required|string',
            'status_pendaftaran'=>'required|string'
        ]);

        Pendaftar::create([

            'id_penawaran_sertifikasi'=>$id,
            'id_asesi'=>$b,
            'status_akhir_sertifikasi' => $request->status_akhir_sertifikasi,
            'tanggal_status_akhir' => $request->tanggal_status_akhir,
            'created_by' => Auth::user()->username,
            'edited_by'=> Auth::user()->username,
            'status_pendaftaran' => $request->status_pendaftaran
        ]);


        return redirect('/asesi/daftarsertifikasi');
    }
}
