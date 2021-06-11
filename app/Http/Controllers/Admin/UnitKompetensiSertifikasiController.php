<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitKompetensiSertifikasi;
use App\Models\RefJenisSertifikasi;
use App\Models\RefUnitKompetensi;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitKompetensiSertifikasiController extends Controller
{
    public function index() {
        $data = UnitKompetensiSertifikasi::distinct('id_ref_jenis_sertifikasi')->get('id_ref_jenis_sertifikasi');

        return view('admin.unit_kompetensi_sertifikasi.index', ['data' => $data]);
    }

    public function showCreate() {
        $data_refjenissertifikasi = RefJenisSertifikasi::all();
        $data_refunitkompetensi = RefUnitKompetensi::all();

        return view('admin.unit_kompetensi_sertifikasi.form_tambah_data', ['data_refjenissertifikasi' => $data_refjenissertifikasi, 'data_refunitkompetensi' => $data_refunitkompetensi]);
    }

    public function create(Request $request) {
        $request->validate([
            'jenisSertifikasi' => 'required',
            'unitKompetensi' => 'required',
            'aktif' => 'boolean|required'
        ]);

        UnitKompetensiSertifikasi::create([
            'id_ref_jenis_sertifikasi' => $request->jenisSertifikasi,
            'id_ref_kompetensi' => $request->unitKompetensi,
            'is_aktif' => $request->aktif
        ]);

        return redirect('/admin/unit-kompetensi-sertifikasi');
    }

    public function read($id) {
        $data = UnitKompetensiSertifikasi::where('id_ref_jenis_sertifikasi', $id)->first();
        $data_kompetensi = UnitKompetensiSertifikasi::where('id_ref_jenis_sertifikasi', $id)->get();

        return view('admin.unit_kompetensi_sertifikasi.show_data', ['data' => $data, 'data_kompetensi' => $data_kompetensi]);
    }

    public function showEdit($id) {
        $data = UnitKompetensiSertifikasi::find($id);
        $data_refjenissertifikasi = RefJenisSertifikasi::all();
        $data_refunitkompetensi = RefUnitKompetensi::all();

        return view('admin.unit_kompetensi_sertifikasi.form_edit_data', ['data' => $data, 'data_refjenissertifikasi' => $data_refjenissertifikasi, 'data_refunitkompetensi' => $data_refunitkompetensi]);
    }

    public function edit($id, Request $request) {
        $request->validate([
            'unitKompetensi' => 'required',
            'aktif' => 'boolean|required'
        ]);

        UnitKompetensiSertifikasi::where('id', $id)->update([
            'id_ref_kompetensi' => $request->unitKompetensi,
            'is_aktif' => $request->aktif
        ]);

        $data = UnitKompetensiSertifikasi::find($id);

        return redirect()->route('admin.unit_kompetensi_sertifikasi.read', ['id' => $data->id_ref_jenis_sertifikasi]);
    }

    public function del($id) {
        $data = UnitKompetensiSertifikasi::find($id);
        $data->delete();

        return redirect()->back();
    }
}
