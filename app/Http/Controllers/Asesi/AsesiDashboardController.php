<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsesiDashboardController extends Controller
{
    //
    public function showDashboard() {;
        return view('asesi.index');
    }
}
