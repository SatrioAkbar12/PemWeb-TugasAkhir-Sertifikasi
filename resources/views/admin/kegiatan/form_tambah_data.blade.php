@extends('admin.layouts.template')

@section('head_title', 'Referensi Negara')

@section('sidebar-kegiatan-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Kegiatan</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/kegiatan/tambah">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_nama" class="form-label">Nama Kegiatan</label>
                        <input id="input_nama" class="form-control" name="nama" type="text"
                            placeholder="Masukkan nama Kegiatan ..." required />
                    </div>
                    <div class="form-group">
                        <label for="input_deskripsi" class="form-label">Deskripsi Kegiatan</label>
                        <textarea id="input_deskripsi" class="form-control" name="deskripsi" type="text"
                            placeholder="Masukkan Deskripsi Kegiatan ..." required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="/admin/kegiatan"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
