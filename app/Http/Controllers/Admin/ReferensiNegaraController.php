<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReferensiNegaraController extends Controller
{
    public function show() {
        return view('admin.referensi_negara.show');
    }
}
