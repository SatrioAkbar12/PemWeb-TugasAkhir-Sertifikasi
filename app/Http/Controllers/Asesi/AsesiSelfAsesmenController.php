<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\PendaftarInstrumen;
use App\Models\InstrumenAsesmenKompetensi;
use Illuminate\Http\Request;

class AsesiSelfAsesmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asesi.selfAsesmen.index');
    }
}
