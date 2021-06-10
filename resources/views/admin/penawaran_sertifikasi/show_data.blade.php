@extends('admin.layouts.template')

@section('head_title', 'Penawaran Sertifikasi')

@section('sidebar-penawaranSertifikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Penawaran Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-4">
                        ID
                    </div>
                    <div class="col-8">
                        : {{ $data->id }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Nama Sertifikasi
                    </div>
                    <div class="col-8">
                        : {{ $data->nama }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Jenis Sertifikasi
                    </div>
                    <div class="col-8">
                        : {{ $data->refJenisSertifikasi->nama }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Deskripsi Penawaran Sertifikasi
                    </div>
                    <div class="col-8">
                        : {{ $data->deskripsi_penawaran }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Periode
                    </div>
                    <div class="col-8">
                        : {{ $data->periode }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Aktif
                    </div>
                    <div class="col-8">
                        : {{ $data->is_aktif == 1 ? 'Ya' : 'Tidak' }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Dibuat oleh
                    </div>
                    <div class="col-8">
                        : {{ $data->created_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Diperbarui oleh
                    </div>
                    <div class="col-8">
                        : {{ $data->edited_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Dibuat pada
                    </div>
                    <div class="col-8">
                        : {{ $data->created_at }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Diperbarui pada
                    </div>
                    <div class="col-8">
                        : {{ $data->updated_at }}
                    </div>
                </div>
                <a href="/admin/penawaran-sertifikasi">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
            </div>
        </div>
    </section>
@endsection
