@extends('asesor.layouts.template')

@section('head_title', 'Asesor')

@section('sidebar-prodi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Peserta Sertifikasi</h1>
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
                        : {{ $data->pendaftar->asesi->id }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Nama
                    </div>
                    <div class="col-10">
                        : {{ $data->pendaftar->asesi->nama }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        No telepon
                    </div>
                    <div class="col-10">
                        : {{ $data->pendaftar->asesi->no_telepon }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Jenis Kelamin
                    </div>
                    <div class="col-10">
                        : {{ $data->pendaftar->asesi->jenis_kelamin }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Nim
                    </div>
                    <div class="col-10">
                        : {{ $data->pendaftar->asesi->nim }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Nik
                    </div>
                    <div class="col-10">
                        : {{ $data->pendaftar->asesi->nik }}
                    </div>
                </div>
                
                <br>
                <a href="/asesor/verifikasi-berkas/">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
            </div>
        </div>
    </section>
@endsection
