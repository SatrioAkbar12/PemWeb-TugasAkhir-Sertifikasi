<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftar;
use App\Models\RefKuesioner;
use App\Models\Asesi;
use App\Models\PendaftarKuesioner;
use Illuminate\Support\Facades\DB;

class AsesiIsiKuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RefKuesioner::where('is_aktif', 1)->get();
        return view('asesi.isiKuesioner.index', ['data' => $data]);
    }

    public function showJawab($id)
    {
        $data = RefKuesioner::find($id);
        return view('asesi.isiKuesioner.form_jawab', ['data' => $data]);
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
            'jawaban'=>'required|string'
        ]);

        PendaftarKuesioner::create([
            'id_pendaftar' => $b,
            'id_kuesioner' =>$id,
            'jawaban'=> $request->jawaban,
            'created_by' => Auth::user()->username,
            'edited_by' => Auth::user()->username
        ]);

        return redirect('/asesi/isikuesioner');
    }
}
