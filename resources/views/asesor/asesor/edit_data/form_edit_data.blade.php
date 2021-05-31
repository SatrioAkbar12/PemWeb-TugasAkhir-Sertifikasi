@extends('asesor.layouts.template')

@section('head_title', 'Asesor')

@section('sidebar-prodi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Profile Anda</h1>
                </div>
            </div>
    </section>



    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/asesor/edit-data/edit">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="input_nama" class="form-label">Nama Asesor</label>
                        <input id="input_nama" class="form-control" name="nama" type="text" value="{{$data->nama}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_nip" class="form-label">Nomor Induk Pegawai</label>
                        <input id="input_nip" class="form-control" name="nip" type="text" value="{{$data->nip}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_nik" class="form-label">Nomor Induk Kependudukan</label>
                        <input id="input_nik" class="form-control" name="nik" type="text" value="{{$data->nik}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_tpl" class="form-label">Tempat Lahir</label>
                        <input id="input_tpl" class="form-control" name="tpl" type="text" value="{{$data->tempat_lahir}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_tgl" class="form-label">Tanggal Lahir</label>
                        <input id="input_tgl" class="form-control" name="tgl" type="date" value="{{$data->tanggal_lahir}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_jk" class="form-label">Jenis Kelamin</label>
                        <input id="input_jk" class="form-control" name="jk" type="text" value="{{$data->jenis_kelamin}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_negara" class="form-label">Negara</label>
                        <input id="input_negara" class="form-control" name="negara" type="text" value="{{$data->id_ref_negara}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_alamat" class="form-label">Alamat</label>
                        <input id="input_alamat" class="form-control" name="alamat" type="text" value="{{$data->alamat}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_tlp" class="form-label">Nomor Telepon</label>
                        <input id="input_tlp" class="form-control" name="tlp" type="text" value="{{$data->no_telepon}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_pend" class="form-label">Pendidikan</label>
                        <input id="input_pend" class="form-control" name="pend" type="text" value="{{$data->kualifikasi_pendidikan}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>

                    <div class="form-group">
                        <label for="input_prodi" class="form-label">Program Studi</label>
                        <input id="input_prodi" class="form-control" name="prodi" type="text" value="{{$data->id_prodi}}" placeholder="Masukkan nama program studi ..." required/>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/asesor"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
