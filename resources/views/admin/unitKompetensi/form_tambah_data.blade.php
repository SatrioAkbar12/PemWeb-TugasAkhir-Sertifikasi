@extends('admin.layouts.template')

@section('head_title', 'Unit Kompetensi')

@section('sidebar-unitKompetensi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Unit Kompetensi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/unitKompetensi/tambah">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_nama" class="form-label">Nama</label>
                        <textarea id="input_nama" class="form-control" name="nama" type="text"
                            placeholder="Masukkan pertanyaan ..." required ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_aktif" class="form-label">Is aktif</label>
                        <select id="input_aktif" class="form-control" name="is_aktif">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="/admin/unitKompetensi"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
