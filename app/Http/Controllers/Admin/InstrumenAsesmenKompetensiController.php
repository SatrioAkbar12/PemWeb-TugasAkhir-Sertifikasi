<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstrumenAsesmenKompetensi;
use App\Models\RefUnitKompetensi;

class InstrumenAsesmenKompetensiController extends Controller
{
    public function index() {
        $data = InstrumenAsesmenKompetensi::distinct('id_ref_unit_kompetensi')->get('id_ref_unit_kompetensi');

        return view('admin.instrumen_asesmen_kompetensi.index', ['data' => $data]);
    }

    public function showCreate() {
        $data_refunitkompetensi = RefUnitKompetensi::all();

        return view('admin.instrumen_asesmen_kompetensi.form_tambah_data', ['data_refunitkompetensi' => $data_refunitkompetensi]);
    }

    public function create(Request $request) {
        $request->validate([
            'refUnitKompetensi' => 'required',
            'pertanyaan' => 'string|required',
            'status' => 'required',
            'aktif' => 'boolean|required',
        ]);

        InstrumenAsesmenKompetensi::create([
            'id_ref_unit_kompetensi' => $request->refUnitKompetensi,
            'instrumen_pertanyaan' => $request->pertanyaan,
            'status_instrumen' => $request->status,
            'is_aktif' => $request->aktif
        ]);

        return redirect()->route('admin.instrumen-asesmen.index');
    }

    public function read($id) {
        $data = InstrumenAsesmenKompetensi::where('id_ref_unit_kompetensi', $id)->first();
        $data_instrumenasesmen = InstrumenAsesmenKompetensi::where('id_ref_unit_kompetensi', $id)->get();

        return view('admin.instrumen_asesmen_kompetensi.show_data', ['data' => $data, 'data_instrumenasesmen' => $data_instrumenasesmen]);
    }

    public function showEdit($id) {
        $data = InstrumenAsesmenKompetensi::find($id);
        // $data_refunitkompetensi = RefUnitKompetensi::all();

        return view('admin.instrumen_asesmen_kompetensi.form_edit_data', ['data' => $data]);
    }

    public function edit($id, Request $request) {
        $request->validate([
            'pertanyaan' => 'string|required',
            'status' => 'required',
            'aktif' => 'boolean|required',
        ]);

        InstrumenAsesmenKompetensi::where('id', $id)->update([
            'instrumen_pertanyaan' => $request->pertanyaan,
            'status_instrumen' => $request->status,
            'is_aktif' => $request->aktif
        ]);

        $data = InstrumenAsesmenKompetensi::find($id);

        return redirect()->route('admin.instrumen-asesmen.read', ['id' => $data->id_ref_unit_kompetensi]);
    }

    public function del($id) {
        $data = InstrumenAsesmenKompetensi::find($id);
        $data->delete();

        return redirect()->back();
    }
}
