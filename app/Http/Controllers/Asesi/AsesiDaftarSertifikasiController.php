<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\PenawaranSertifikasi;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;
use App\Models\Asesi;
use App\Models\Asesor;
use App\Models\AsesorJenisSertifikasi;
use App\Models\AsesorPendaftar;
use App\Models\SyaratSertifikasi;
use App\Models\RefJenisSertifikasi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AsesiDaftarSertifikasiController extends Controller
{
    public function index()
    {
        $data = PenawaranSertifikasi::where('is_aktif', 1)->get();
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
            'status_akhir_sertifikasi'=>'string',
            'tanggal_status_akhir'=>'string',
            'status_pendaftaran'=>'string'
        ]);

        $data_sertifikasi = PenawaranSertifikasi::find($id);

        $data_asesor = AsesorJenisSertifikasi::where('id_ref_jenis_sertifikasi', $data_sertifikasi->id_ref_jenis_sertifikasi)->get();

        $array_id_asesor = array();
        foreach($data_asesor as $d) {
            array_push($array_id_asesor, $d->id);
        }

        Pendaftar::create([
            'id_penawaran_sertifikasi'=>$id,
            'id_asesi'=>$b,
            'status_akhir_sertifikasi' =>'pendaftar baru',
            'tanggal_status_akhir' => date("Y-m-d"),
            'created_by' => Auth::user()->username,
            'edited_by'=> Auth::user()->username,
            'status_pendaftaran' => 'pendaftar baru'
        ]);

        $pendaftar = Pendaftar::where([
            'id_penawaran_sertifikasi' => $id,
            'id_asesi' => Auth::user()->asesi->id
        ])->first();

        AsesorPendaftar::create([
            'id_asesor_jenis_sertifikasi' => $array_id_asesor[array_rand($array_id_asesor)],
            'id_pendaftar' => $pendaftar->id,
            'hasil' => ' ',
        ]);

        return redirect('/asesi/daftarsertifikasi')->with('success', 'Anda Telah Terdaftar!');;
    }
    public function showLihat($id)
    {
        $data = PenawaranSertifikasi::find($id); //1-Guru honorer 2-guru sd
        $a = $data->id_ref_jenis_sertifikasi;
        $syarat=SyaratSertifikasi::where('id_ref_jenis_sertifikasi',$a)->get();
        // $syarat= RefJenisSertifikasi::where('id_ref_jenis_sertifikasi', $id)->get();
        return view('asesi.daftarSertifikasi.form_lihat', ['data' => $data, 'syarat'=>$syarat]);
    }

}
