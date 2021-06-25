<?php

namespace App\Http\Controllers\asesi;

use App\Http\Controllers\Controller;
use App\Models\PenawaranSertifikasi;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;
use App\Models\Asesi;
use App\Models\AsesorPendaftar;
use App\Models\PendaftarSyarat;
use App\Models\SyaratSertifikasi;
use App\Models\RefJenisSertifikasi;
use Illuminate\Support\Facades\DB;

class AsesiBerkasSyaratController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = Pendaftar::where('id_asesi', Auth::user()->asesi->id)->get();

        return view('asesi.berkas_syarat.index', ['data' => $data]);
    }

    public function showSyarat($id_sertifikasi) {
        $data = PenawaranSertifikasi::where('id', $id_sertifikasi)->first();

        $pendaftar = Pendaftar::where([
            'id_asesi' => Auth::user()->asesi->id,
            'id_penawaran_sertifikasi' => $id_sertifikasi
        ])->first();

        $data_pendaftarsyarat = PendaftarSyarat::where('id_pendaftar', $pendaftar->id)->get();

        return view('asesi.berkas_syarat.show_syarat', ['data' => $data, 'data_pendaftarsyarat' => $data_pendaftarsyarat]);
    }

    public function showUploadSyarat($id_sertifikasi, $id_syarat) {
        $pendaftar = $this->getPendaftar($id_sertifikasi);

        $data = PendaftarSyarat::where([
            'id_syarat_sertifikasi' => $id_syarat,
            'id_pendaftar' => $pendaftar->id
        ])->first();

        // dd($data);

        return view('asesi.berkas_syarat.form_berkas', ['data' => $data, 'id_sertifikasi' => $id_sertifikasi]);
    }

    public function storeUploadSyarat(Request $request, $id_sertifikasi, $id_syarat) {
        $request->validate([
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $username = Auth::user()->username;
        $syarat = SyaratSertifikasi::find($id_syarat);

        $pendaftar = Pendaftar::where([
            'id_asesi' => Auth::user()->asesi->id,
            'id_penawaran_sertifikasi' => $id_sertifikasi
        ])->first();

        $tujuan_upload = 'data_asesi/'.$username.'/'.$id_sertifikasi.'/'.$pendaftar->id.'/syarat';
        $nama_file = $syarat->syarat.'_'.$file->getClientOriginalName();
        $path_bukti = $tujuan_upload.'/'.$nama_file;

        $data_asesorpendaftar = AsesorPendaftar::where('id_pendaftar', $pendaftar->id)->first();

        $file->move($tujuan_upload, $nama_file);
        $status = 'sudah upload';

        PendaftarSyarat::where([
            'id_pendaftar' => $pendaftar->id,
            'id_syarat_sertifikasi' => $id_syarat
        ])->update([
            'komentar_asesor' => null,
            'status_verifikasi_syarat' => $status,
            'path_bukti' => $path_bukti,
            'verifikasi_asesor' => $data_asesorpendaftar->id,
            'created_by' => $username,
            'edited_by' => $username
        ]);

        return redirect()->route('asesi.berkas-syarat.show-syarat', ['id_sertifikasi' => $id_sertifikasi]);
    }

    public function readUploadSyarat($id_sertifikasi, $id_syarat) {
        $pendaftar = Pendaftar::where([
            'id_asesi' => Auth::user()->asesi->id,
            'id_penawaran_sertifikasi' => $id_sertifikasi
        ])->first();

        $data = PendaftarSyarat::where([
            'id_syarat_sertifikasi' => $id_syarat,
            'id_pendaftar' => $pendaftar->id
        ])->first();

        return view('asesi.berkas_syarat.show_detail', ['data' => $data, 'id_sertifikasi' => $id_sertifikasi]);
    }

    public function getPendaftar($id_sertifikasi){
        $pendaftar = Pendaftar::where([
            'id_asesi' => Auth::user()->asesi->id,
            'id_penawaran_sertifikasi' => $id_sertifikasi
        ])->first();

        return $pendaftar;
    }
}
