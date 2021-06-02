@extends('admin.layouts.template')

@section('head_title', 'Kuesioner')

@section('sidebar-kuesioner-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Kuesioner</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/kuesioner/{{ $data->id }}/edit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="input_nama" class="form-label">Pertanyaan</label>
                        <textarea id="input_nama" class="form-control" name="pertanyaan" type="text"
                            placeholder="Masukkan pertanyaan ..." required ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_deskripsi" class="form-label">Is aktif</label>
                        <select id="input_deskripsi" class="form-control" name="is_aktif">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/admin/kuesioner"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
