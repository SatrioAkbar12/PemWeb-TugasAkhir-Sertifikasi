<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsesorJenisSertifikasi;
use App\Models\RefJenisSertifikasi;

class AsesorJenisSertifikasiController extends Controller
{
    public function index() {
        $data = AsesorJenisSertifikasi::all();

        return view('admin.asesor_jenis_sertifikasi.index', ['data' => $data]);
    }

    public function read($id) {
        $data = AsesorJenisSertifikasi::find($id);

        return view('admin.asesor_jenis_sertifikasi.show_data', ['data' => $data]);
    }

    public function showEdit($id) {
        $data = AsesorJenisSertifikasi::find($id);
        $data_jenissertifikasi = RefJenisSertifikasi::all();

        return view('admin.asesor_jenis_sertifikasi.form_edit_data', ['data' => $data, 'data_jenissertifikasi' => $data_jenissertifikasi]);
    }

    public function edit($id, Request $request) {
        $request->validate([
            'jenisSertifikasi' => 'required',
            'noSertifikat' => 'required',
            'tanggalAwalBerlaku' => 'date|required',
            'tanggalAkhirBerlaku' => 'date|required'
        ]);

        AsesorJenisSertifikasi::where('id', $id)->update([
            'id_ref_jenis_sertifikasi' => $request->jenisSertifikasi,
            'no_sertifikat' => $request->noSertifikat,
            'tanggal_awal_berlaku' => $request->tanggalAwalBerlaku,
            'tanggal_akhir_berlaku' => $request->tanggalAkhirBerlaku
        ]);

        return redirect('/admin/asesor-jenis-sertifikasi');
    }
}
