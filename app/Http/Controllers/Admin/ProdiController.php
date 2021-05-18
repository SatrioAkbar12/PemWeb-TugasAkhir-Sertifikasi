<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function show() {
        $data = Prodi::all();

        return view('admin.prodi.show', ['data' => $data]);
    }

    public function showCreate() {
        return view('admin.prodi.form_tambah_data');
    }

    public function create(Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'fakultas' => 'string'
        ]);

        Prodi::create([
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
            'created_by' => Auth::user()->username,
            'edited_by' => Auth::user()->username
        ]);

        return redirect('/admin/prodi');
    }

    public function read($id) {
        $data = Prodi::find($id);

        return view('admin.prodi.show_data', ['data' => $data]);
    }

    public function showEdit($id) {
        $data = Prodi::find($id);

        return view('admin.prodi.form_edit_data', ['data' => $data]);
    }

    public function edit($id, Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'fakultas' => 'string'
        ]);

        Prodi::where('id', $id)->update([
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
            'edited_by' => Auth::user()->username
        ]);

        return redirect('/admin/prodi');
    }

    public function del($id) {
        $prodi = Prodi::find($id);
        $prodi->delete();

        return redirect('/admin/prodi');
    }
}
