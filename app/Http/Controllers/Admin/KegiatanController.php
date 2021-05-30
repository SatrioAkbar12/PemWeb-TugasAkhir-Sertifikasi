<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RefKegiatan;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RefKegiatan::all();
        return view('admin.kegiatan.index', ['data' => $data]);
    }

    public function showCreate()
    {
        return view('admin.kegiatan.form_tambah_data');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        RefKegiatan::create([
            'nama_kegiatan' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'created_by' => Auth::user()->username
        ]);

        return redirect('/admin/kegiatan');
    }

    public function read($id) {
        $data = RefKegiatan::find($id);

        return view('admin.kegiatan.show_data', ['data' => $data]);
    }

    public function showEdit($id) {
        $data = RefKegiatan::find($id);

        return view('admin.kegiatan.form_edit_data', ['data' => $data]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string'
        ]);

        RefKegiatan::where('id', $id)->update([
            'nama_kegiatan' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admin/kegiatan/'.$id);
    }

    public function del($id) {
        $kegiatan = RefKegiatan::find($id);
        $kegiatan->delete();

        return redirect('/admin/kegiatan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
