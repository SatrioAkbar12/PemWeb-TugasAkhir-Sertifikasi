<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsesorDashboardController extends Controller
{
    //
    public function showDashboard() {;
        return view('asesor.index');
    }
}
