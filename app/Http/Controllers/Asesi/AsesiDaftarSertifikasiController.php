<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\PenawaranSertifikasi;
use Illuminate\Http\Request;

class AsesiDaftarSertifikasiController extends Controller
{
    public function index()
    {
        $data = PenawaranSertifikasi::all();
        return view('asesi.daftarSertifikasi.index', ['data' => $data]);
    }
}
