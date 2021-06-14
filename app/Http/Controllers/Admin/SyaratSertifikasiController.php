<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RefJenisSertifikasi;
use App\Models\SyaratSertifikasi;

class SyaratSertifikasiController extends Controller
{
    public function index() {
        $data = SyaratSertifikasi::distinct('id_ref_jenis_sertifikasi')->get('id_ref_jenis_sertifikasi');

        return view('admin.syarat_sertifikasi.index', ['data' => $data]);
    }

    public function showCreate() {
        $data_refjenissertifikasi = RefJenisSertifikasi::all();

        return view('admin.syarat_sertifikasi.form_tambah_data', ['data_refjenissertifikasi' => $data_refjenissertifikasi]);
    }

    public function create(Request $request) {
        $request->validate([
            'jenisSertifikasi' => 'required',
            'syarat' => 'required',
            'aktif' => 'boolean|required'
        ]);

        SyaratSertifikasi::create([
            'id_ref_jenis_sertifikasi' => $request->jenisSertifikasi,
            'syarat' => $request->syarat,
            'is_aktif' => $request->aktif
        ]);

        return redirect('/admin/syarat-sertifikasi');
    }

    public function read($id) {
        $data = SyaratSertifikasi::where('id_ref_jenis_sertifikasi', $id)->first();
        $data_kompetensi = SyaratSertifikasi::where('id_ref_jenis_sertifikasi', $id)->get();

        return view('admin.syarat_sertifikasi.show_data', ['data' => $data, 'data_kompetensi' => $data_kompetensi]);
    }

    public function showEdit($id) {
        $data = SyaratSertifikasi::find($id);
        $data_refjenissertifikasi = RefJenisSertifikasi::all();

        return view('admin.syarat_sertifikasi.form_edit_data', ['data' => $data, 'data_refjenissertifikasi' => $data_refjenissertifikasi]);
    }

    public function edit($id, Request $request) {
        $request->validate([
            'syarat' => 'required',
            'aktif' => 'boolean|required'
        ]);

        SyaratSertifikasi::where('id', $id)->update([
            'syarat' => $request->syarat,
            'is_aktif' => $request->aktif
        ]);

        $data = SyaratSertifikasi::find($id);

        return redirect()->route('admin.syarat_sertifikasi.read', ['id' => $data->id_ref_jenis_sertifikasi]);
    }

    public function del($id) {
        $data = SyaratSertifikasi::find($id);
        $data->delete();

        return redirect()->back();
    }
}
