@extends('admin.layouts.template')

@section('head_title', 'Penawaran Sertifikasi')

@section('sidebar-penawaranSertfikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Penawaran Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/penawaran-sertifikasi/{{ $data->id }}/edit">
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_nama" class="form-label">Nama Sertifikasi</label>
                        <input id="input_nama" class="form-control" name="nama" type="text" value="{{ $data->nama }}" placeholder="Masukkan nama sertifikasi ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_jenissertifikasi" class="form-label">Jenis Sertifikasi</label>
                        <select id="input_jenissertifikasi" class="form-control" name="jenisSertifikasi" required>
                            @foreach ($data_jenissertifikasi as $d_jenissertifikasi)
                                <option value="{{ $d_jenissertifikasi->id }}" {{ $d_jenissertifikasi->id == $data->id_ref_jenis_sertifikasi ? 'selected' : '' }}>{{ $d_jenissertifikasi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_deskripsi" class="form-label">Deskripsi Penawaran Sertifikasi</label>
                        <textarea id="input_deskripsi" class="form-control" name="deskripsi" placeholder="Masukkan deskripsi ..." required>{{ $data->deskripsi_penawaran }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_periode" class="form-label">Periode</label>
                        <input type="input_periode" class="form-control" name="periode" type="text" value="{{ $data->periode }}" placeholder="Masukkan periode ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_aktif" class="form-label">Aktif</label>
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <select id="input_aktif" class="form-control" name="aktif" required>
                                    <option value="1" {{ $data->is_aktif == 1 ? 'seleceted' : ''}}>Ya</option>
                                    <option value="0" {{ $data->is_aktif == 0 ? 'seleceted' : ''}}>Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="/admin/penawaran-sertifikasi"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection