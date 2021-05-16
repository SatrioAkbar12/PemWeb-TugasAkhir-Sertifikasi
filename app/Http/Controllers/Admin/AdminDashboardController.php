<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function showDashboard() {
        $user = Auth::user();
        return view('admin.index', ['nama' => $user->nama, 'role'=> $user->role]);
    }
}
