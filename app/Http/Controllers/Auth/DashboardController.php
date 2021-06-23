<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class DashboardController extends Controller
{
    public function showDashboard() {
        if(Auth::user()->role == 'admin') {
            return redirect('/admin');
        }
        elseif(Auth::user()->role == 'asesor') {
            return redirect('/asesor');
        }
        elseif(Auth::user()->role == 'asesi') {
            return redirect('/asesi');
        }
        else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
