<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RefJenisSertifikasi;
use Illuminate\Cache\RedisTaggedCache;

class JenisSertifikasiController extends Controller
{
    public function index() {
        $data = RefJenisSertifikasi::all();

        return view('admin.jenis_sertifikasi.index', ['data' => $data]);
    }

    public function showCreate() {
        return view('admin.jenis_sertifikasi.form_tambah_data');
    }

    public function create(Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'keterangan' => 'required|string',
            'statusJenisSertifikasi' => 'required',
            'aktif' => 'required|boolean'
        ]);

        RefJenisSertifikasi::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'status_jenis_sertifikasi' => $request->statusJenisSertifikasi,
            'created_by' => Auth::user()->username,
            'edited_by' => Auth::user()->username,
            'is_aktif' => $request->aktif
        ]);

        return redirect('/admin/jenis-sertifikasi');
    }

    public function read($id) {
        $data = RefJenisSertifikasi::find($id);

        return view('admin.jenis_sertifikasi.show_data', ['data' => $data]);
    }

    public function showEdit($id) {
        $data = RefJenisSertifikasi::find($id);

        return view('admin.jenis_sertifikasi.form_edit_data', ['data' => $data]);
    }

    public function edit($id, Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'keterangan' => 'required|string',
            'statusJenisSertifikasi' => 'required',
            'aktif' => 'required|boolean'
        ]);

        RefJenisSertifikasi::where('id', $id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'status_jenis_sertifikasi' => $request->statusJenisSertifikasi,
            'edited_by' => Auth::user()->username,
            'is_aktif' => $request->aktif
        ]);

        return redirect('/admin/jenis-sertifikasi');
    }

    public function del($id) {
        $data = RefJenisSertifikasi::find($id);
        $data->delete();

        return redirect('/admin/jenis-sertifikasi');
    }
}
