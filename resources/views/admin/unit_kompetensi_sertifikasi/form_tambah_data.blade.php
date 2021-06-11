@extends('admin.layouts.template')

@section('head_title', 'Unit Kompetensi Sertifikasi')

@section('sidebar-unitKompetensiSertifikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Unit Kompetensi Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/unit-kompetensi-sertifikasi/tambah">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_refjenissertifikasi" class="form-label">Jenis Sertifikasi</label>
                        <select id="input_refjenissertifikasi" class="form-control" name="jenisSertifikasi" required>
                            @foreach ($data_refjenissertifikasi as $d_refjenissertifikasi)
                                <option value="{{ $d_refjenissertifikasi->id }}">{{ $d_refjenissertifikasi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_refunitkompetensi" class="form-label">Unit Kompetensi</label>
                        <div class="row">
                            <div class="col-md-4">
                                <select id="input_refunitkompetensi" class="form-control" name="unitKompetensi" required>
                                    @foreach ($data_refunitkompetensi as $d_refunitkompetensi)
                                        <option value="{{ $d_refunitkompetensi->id }}">{{ $d_refunitkompetensi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_show" class="form-label">Aktif</label>
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <select id="input_show" class="form-control" name="aktif" required>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="/admin/unit-kompetensi-sertifikasi"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
