<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\PenawaranSertifikasi;
use App\Models\RefKegiatan;

class JadwalController extends Controller
{
    public function index() {
        $data = Jadwal::distinct('id_penawaran_sertifikasi')->get('id_penawaran_sertifikasi');

        return view('admin.jadwal.index', ['data' => $data]);
    }

    public function showCreate() {
        $data_penawaransertifikasi = PenawaranSertifikasi::all();
        $data_refkegiatan = RefKegiatan::all();

        return view('admin.jadwal.form_tambah_data', ['data_penawaransertifikasi' => $data_penawaransertifikasi, 'data_refkegiatan' => $data_refkegiatan]);
    }

    public function create(Request $request) {
        $request->validate([
            'penawaranSertifikasi' => 'required',
            'kegiatan' => 'required',
            'tanggalAwal' => 'date|required',
            'tanggalAkhir' => 'date|required',
            'show' => 'boolean|required',
            'deskripsi' => 'required'
        ]);

        Jadwal::create([
            'id_penawaran_sertifikasi' => $request->penawaranSertifikasi,
            'id_kegiatan' => $request->kegiatan,
            'tanggal_awal' => $request->tanggalAwal,
            'tanggal_akhir' => $request->tanggalAkhir,
            'deskripsi' => $request->deskripsi,
            'is_show' => $request->show,
            'created_by' => Auth::user()->username,
            'edited_by' => Auth::user()->username
        ]);

        return redirect()->route('admin.jadwal.index');
    }

    public function read($id_penawaranSertifikasi) {
        $data = Jadwal::where('id_penawaran_sertifikasi', $id_penawaranSertifikasi)->first();
        $data_kegiatan = Jadwal::where('id_penawaran_sertifikasi', $id_penawaranSertifikasi)->get();

        return view('admin.jadwal.show_data', ['data' => $data, 'data_kegiatan' => $data_kegiatan]);
    }

    public function readKegiatan($id_penawaranSertifikasi, $id_jadwal) {
        $data = Jadwal::find($id_jadwal);

        return view('admin.jadwal.show_jadwal', ['data' => $data]);
    }

    public function showEdit($id_penawaranSertifikasi, $id_jadwal) {
        $data = Jadwal::find($id_jadwal);
        $data_penawaransertifikasi = PenawaranSertifikasi::all();
        $data_refkegiatan = RefKegiatan::all();

        return view('admin.jadwal.form_edit_data', ['data' => $data, 'data_penawaransertifikasi' => $data_penawaransertifikasi, 'data_refkegiatan' => $data_refkegiatan]);
    }

    public function edit($id_penawaranSertifikasi, $id_jadwal, Request $request) {
        $request->validate([
            'tanggalAwal' => 'date|required',
            'tanggalAkhir' => 'date|required',
            'show' => 'boolean|required',
            'deskripsi' => 'required'
        ]);

        Jadwal::where('id', $id_jadwal)->update([
            'tanggal_awal' => $request->tanggalAwal,
            'tanggal_akhir' => $request->tanggalAkhir,
            'deskripsi' => $request->deskripsi,
            'is_show' => $request->show,
            'edited_by' => Auth::user()->username
        ]);

        return redirect()->route('admin.jadwal.kegiatan.read', ['id_penawaranSertifikasi' => $id_penawaranSertifikasi]);
    }

    public function del($id_penawaranSertifikasi, $id_jadwal) {
        $data = Jadwal::find($id_jadwal);
        $data->delete();

        return redirect()->back();
    }
}
