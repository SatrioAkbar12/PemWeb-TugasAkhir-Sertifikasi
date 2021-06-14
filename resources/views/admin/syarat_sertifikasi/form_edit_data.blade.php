@extends('admin.layouts.template')

@section('head_title', 'Syarat Sertifikasi')

@section('sidebar-syaratSertifikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Syarat Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/syarat-sertifikasi/{{ $data->id }}/edit">
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_refjenissertifikasi" class="form-label">Jenis Sertifikasi</label>
                        <select id="input_refjenissertifikasi" class="form-control" name="jenisSertifikasi" disabled required>
                            @foreach ($data_refjenissertifikasi as $d_refjenissertifikasi)
                                <option value="{{ $d_refjenissertifikasi->id }}" {{ $d_refjenissertifikasi->id == $data->id_ref_jenis_sertifikasi ? 'selected' : '' }}>{{ $d_refjenissertifikasi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_syarat" class="form-label">Syarat</label>
                        <textarea id="input_syarat" class="form-control" name="syarat" type="text"
                            placeholder="Masukkan syarat..." required >{{ $data->syarat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_show" class="form-label">Aktif</label>
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <select id="input_show" class="form-control" name="aktif" required>
                                    <option value="1" {{ $data->is_aktif == 1 ? 'selected' : ''}}>Ya</option>
                                    <option value="0" {{ $data->is_aktif == 0 ? 'selected' : ''}}>Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="/admin/syarat-sertifikasi/{{ $data->id_ref_jenis_sertifikasi }}"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
