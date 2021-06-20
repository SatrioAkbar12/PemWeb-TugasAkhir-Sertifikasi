<?php

namespace App\Http\Controllers\asesi;

use App\Http\Controllers\Controller;
use App\Models\PenawaranSertifikasi;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;
use App\Models\Asesi;
use App\Models\SyaratSertifikasi;
use App\Models\RefJenisSertifikasi;
use Illuminate\Support\Facades\DB;

class AsesiBerkasSyaratController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $nomor=Auth::user()->id;
        $a = DB::table('asesi')
            ->where('asesi.id_user','=',$nomor)
            ->select('asesi.id')
            ->get();

        $b = $a->first()->id;

        $data = DB::table('penawaran_sertifikasi')
            ->leftJoin('pendaftar', 'penawaran_sertifikasi.id', '=', 'pendaftar.id_penawaran_sertifikasi')
            ->where('pendaftar.id_asesi',$b)
            ->get();

        return view('asesi.berkas_syarat.index', ['data' => $data]);
    }

    // public function syarat()
    // {
    //     $syarat = $request->input('syarat');
    //     return "Syarat :".$syarat;
    // }
}
