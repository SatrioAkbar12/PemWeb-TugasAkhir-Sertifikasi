<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RefNegara;

class ReferensiNegaraController extends Controller
{
    public function show() {
        $data = RefNegara::all();
        return view('admin.referensi_negara.show', ['data' => $data]);
    }

    public function showCreate() {
        return view('admin.referensi_negara.form_tambah_data');
    }

    public function create(Request $request) {
        $this->validate($request,[
    		'nama' => 'required'
    	]);

        RefNegara::create([
            'nama' => $request->nama
        ]);

        return redirect('/admin/negara');
    }

    public function read($id) {
        $data = RefNegara::find($id);

        return view('admin.referensi_negara.show_data', ['data' => $data]);
    }

    public function showEdit($id) {
        $data = RefNegara::find($id);

        return view('admin.referensi_negara.form_edit_data', ['data' => $data]);
    }

    public function edit(Request $request) {
        $this->validate($request,[
    		'nama' => 'required'
    	]);

        RefNegara::where('id', $request->id)->update([
            'nama'=> $request->nama
        ]);

        return redirect('/admin/negara');
    }

    public function del($id) {
        $data = RefNegara::find($id);
        $data->delete();

        return redirect('/admin/negara');
    }
}
