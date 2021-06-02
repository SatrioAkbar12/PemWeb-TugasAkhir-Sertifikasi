<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RefKuesioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuesionerController extends Controller
{
    public function index()
    {
        $data = RefKuesioner::all();
        return view('admin.kuesioner.index', ['data' => $data]);
    }

    public function showCreate()
    {
        return view('admin.kuesioner.form_tambah_data');
    }

    public function create(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'is_aktif' => 'required|string',
        ]);

        RefKuesioner::create([
            'pertanyaan' => $request->pertanyaan,
            'is_aktif' => $request->is_aktif
        ]);

        return redirect('/admin/kuesioner');
    }

    public function read($id) {
        $data = RefKuesioner::find($id);

        return view('admin.kuesioner.show_data', ['data' => $data]);
    }

    public function showEdit($id) {
        $data = RefKuesioner::find($id);

        return view('admin.kuesioner.form_edit_data', ['data' => $data]);
    }

    public function edit($id, Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'is_aktif' => 'required|string',
        ]);

        RefKuesioner::where('id', $id)->update([
            'pertanyaan' => $request->pertanyaan,
            'is_aktif' => $request->is_aktif
        ]);

        return redirect('/admin/kuesioner/'.$id);
    }

    public function del($id) {
        $kuesioner = RefKuesioner::find($id);
        $kuesioner->delete();

        return redirect('/admin/kuesioner');
    }
}
