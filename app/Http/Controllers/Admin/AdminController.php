<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminController extends Controller
{
    public function show() {
        $data = User::where('role', 'admin')->get();
        return view('admin.admin.show', ['data' => $data]);
    }

    public function showCreate() {
        return view('admin.admin.form_tambah_data');
    }

    public function create(Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
            // 'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            // 'password_confirmation' => 'required|min:8',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        return redirect('/admin/kelola-admin');
    }

    public function read($id) {
        $data = User::find($id);

        return view('admin.admin.show_data', ['data' => $data ]);
    }

    public function showEdit() {
        $data = Auth::user();

        return view('admin.admin.form_edit_data', ['data' => $data ]);
    }

    public function edit(Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
        ]);

        User::where('id', Auth::id())->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect('/admin/kelola-admin');
    }

    public function showChangePassword() {
        return view('admin.admin.form_ganti_password');
    }

    public function changePassword(Request $request) {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        User::where('id', Auth::id())->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/admin/kelola-admin');
    }

    public function del($id) {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/kelola-admin');
    }
}
