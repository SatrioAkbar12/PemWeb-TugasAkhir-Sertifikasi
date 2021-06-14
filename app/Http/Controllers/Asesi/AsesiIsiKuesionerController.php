<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\RefKuesioner;
use Illuminate\Http\Request;

class AsesiIsiKuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RefKuesioner::all();
        return view('asesi.isiKuesioner.index', ['data' => $data]);
    }
}
