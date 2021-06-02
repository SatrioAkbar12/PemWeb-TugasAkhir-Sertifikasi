<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RefUnitKompetensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitKompetensiController extends Controller
{
    public function index()
    {
        $data = RefUnitKompetensi::all();
        return view('admin.unitKompetensi.index', ['data' => $data]);
    }

    public function showCreate()
    {
        return view('admin.unitKompetensi.form_tambah_data');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'is_aktif' => 'required|string',
        ]);

        RefUnitKompetensi::create([
            'nama' => $request->nama,
            'is_aktif' => $request->is_aktif
        ]);

        return redirect('/admin/unitKompetensi');
    }

    public function read($id) {
        $data = RefUnitKompetensi::find($id);

        return view('admin.unitKompetensi.show_data', ['data' => $data]);
    }

    public function showEdit($id) {
        $data = RefUnitKompetensi::find($id);

        return view('admin.unitKompetensi.form_edit_data', ['data' => $data]);
    }

    public function edit($id, Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'is_aktif' => 'required|string',
        ]);

        RefUnitKompetensi::where('id', $id)->update([
            'nama' => $request->nama,
            'is_aktif' => $request->is_aktif
        ]);

        return redirect('/admin/unitKompetensi/'.$id);
    }

    public function del($id) {
        $unitKompetensi = RefUnitKompetensi::find($id);
        $unitKompetensi->delete();

        return redirect('/admin/unitKompetensi');
    }
}
