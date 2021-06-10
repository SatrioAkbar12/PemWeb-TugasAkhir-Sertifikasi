@extends('admin.layouts.template')

@section('head_title', 'Jenis Sertifikasi')

@section('sidebar-jenisSertifikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Jenis Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-2">
                        ID
                    </div>
                    <div class="col-10">
                        : {{ $data->id }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Jenis Sertifikasi
                    </div>
                    <div class="col-10">
                        : {{ $data->nama }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Keterangan
                    </div>
                    <div class="col-10">
                        : {{ $data->keterangan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Status
                    </div>
                    <div class="col-10">
                        : {{ $data->status_jenis_sertifikasi }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Aktif
                    </div>
                    <div class="col-10">
                        : {{ $data->is_aktif == 1 ? 'Ya' : 'Tidak' }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Dibuat oleh
                    </div>
                    <div class="col-10">
                        : {{ $data->created_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Diperbarui oleh
                    </div>
                    <div class="col-10">
                        : {{ $data->edited_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Dibuat pada
                    </div>
                    <div class="col-10">
                        : {{ $data->created_at }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Diperbarui pada
                    </div>
                    <div class="col-10">
                        : {{ $data->updated_at }}
                    </div>
                </div>
                <a href="/admin/jenis-sertifikasi">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
            </div>
        </div>
    </section>
@endsection
