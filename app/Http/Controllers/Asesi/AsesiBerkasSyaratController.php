<?php

namespace App\Http\Controllers\asesi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendaftarSyarat;

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
        $data = PendaftarSyarat::all();
        return view('asesi.berkas_syarat.form_berkas', ['data' => $data]);
    }

    // public function syarat()
    // {
    //     $syarat = $request->input('syarat');
    //     return "Syarat :".$syarat;
    // }
}