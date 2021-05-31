<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asesi;
use App\Models\RefNegara;
use App\Models\Prodi;

class RegisteredAsesiController extends Controller
{
    //
    public function create(){
        $refNegara=RefNegara::all();
        $refProdi=Prodi::all();
        return view('asesi.isiData.form_isiData',['ref_negara'=>$refNegara,'ref_prodi'=>$refProdi]);
    }
}
