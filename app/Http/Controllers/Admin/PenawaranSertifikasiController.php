<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenawaranSertifikasi;
use App\Models\RefJenisSertifikasi;

class PenawaranSertifikasiController extends Controller
{
    public function index() {
        $data = PenawaranSertifikasi::all();

        return view('admin.penawaran_sertifikasi.index', ['data' => $data]);
    }

    public function showCreate() {
        $data_jenissertifikasi = RefJenisSertifikasi::all();

        return view('admin.penawaran_sertifikasi.form_tambah_data', ['data_jenissertifikasi' => $data_jenissertifikasi]);
    }

    public function create(Request $request) {
        $request->validate([
            'nama' => 'string|required',
            'jenisSertifikasi' => 'required',
            'deskripsi' => 'string|required',
            'periode' => 'required',
            'aktif' => 'boolean|required'
        ]);

        PenawaranSertifikasi::create([
            'nama' => $request->nama,
            'id_ref_jenis_sertifikasi' => $request->jenisSertifikasi,
            'deskripsi_penawaran' => $request->deskripsi,
            'periode' => $request->periode,
            'created_by' => Auth::user()->username,
            'edited_by' => Auth::user()->username,
            'is_aktif' => $request->aktif
        ]);

        return redirect('/admin/penawaran-sertifikasi');
    }

    public function read($id) {
        $data = PenawaranSertifikasi::find($id);

        return view('admin.penawaran_sertifikasi.show_data', ['data' => $data]);
    }

    public function showEdit($id) {
        $data = PenawaranSertifikasi::find($id);
        $data_jenissertifikasi = RefJenisSertifikasi::all();

        return view('admin.penawaran_sertifikasi.form_edit_data', ['data' => $data, 'data_jenissertifikasi' => $data_jenissertifikasi]);
    }

    public function edit($id, Request $request) {
        $request->validate([
            'nama' => 'string|required',
            'jenisSertifikasi' => 'required',
            'deskripsi' => 'string|required',
            'periode' => 'required',
            'aktif' => 'boolean|required'
        ]);

        PenawaranSertifikasi::where('id', $id)->update([
            'nama' => $request->nama,
            'id_ref_jenis_sertifikasi' => $request->jenisSertifikasi,
            'deskripsi_penawaran' => $request->deskripsi,
            'periode' => $request->periode,
            'edited_by' => Auth::user()->username,
            'is_aktif' => $request->aktif
        ]);

        return redirect('/admin/penawaran-sertifikasi');
    }

    public function del($id) {
        $data = PenawaranSertifikasi::find($id);
        $data->delete();

        return redirect('admin/penawaran-sertifikasi');
    }
}
