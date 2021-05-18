@extends('admin.layouts.template')

@section('head_title', 'Referensi Negara')

@section('sidebar-negara-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Referensi Negara</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/negara/{{ $data->id }}/edit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="input_id" class="form-label">ID</label>
                        <input id="input_id" class="form-control" name="id" type="number" value="{{ $data->id }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="input_nama" class="form-label">Nama Negara</label>
                        <input id="input_nama" class="form-control" name="nama" type="text" placeholder="Masukkan nama negara ..." value="{{ $data->nama }}"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/admin/negara"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
