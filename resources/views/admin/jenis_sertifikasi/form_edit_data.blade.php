@extends('admin.layouts.template')

@section('head_title', 'Jenis Sertifikasi')

@section('sidebar-jenisSertifikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Jenis Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/jenis-sertifikasi/{{ $data->id }}/edit">
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_nama" class="form-label">Jenis Sertifikasi</label>
                        <input id="input_nama" class="form-control" name="nama" type="text" value="{{ $data->nama }}" placeholder="Masukkan jenis sertifikasi ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_keterangan" class="form-label">Keterangan</label>
                        <input type="input_keterangan" class="form-control" name="keterangan" type="text" value="{{ $data->keterangan }}" placeholder="Masukkan keterangan ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_statusJenisSertifikasi" class="form-label">Status Jenis Sertifikasi</label>
                        <input type="input_statusJenisSertifikasi" class="form-control" name="statusJenisSertifikasi" type="text" value="{{ $data->status_jenis_sertifikasi }}" placeholder="Masukkan status ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_aktif" class="form-label">Aktif</label>
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <select id="input_aktif" class="form-control" name="aktif" required>
                                    <option value="1" {{ $data->is_aktif == 1 ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ $data->is_aktif == 0 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="/admin/jenis-sertifikasi"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
