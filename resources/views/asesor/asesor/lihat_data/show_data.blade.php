@extends('asesor.layouts.template')

@section('head_title', 'Asesor')

@section('sidebar-prodi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Profile Anda</h1>
                </div>
            </div>
    </section>


    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-3">
                        Nama
                    </div>
                    <div class="col-9">
                        : {{ $data->nama }}
                    </div>
                    <div class="col-3">
                        Nomor Induk Pegawai
                    </div>
                    <div class="col-9">
                        : {{ $data->nip }}
                    </div>
                    <div class="col-3">
                        Nomor Induk Kependudukan
                    </div>
                    <div class="col-9">
                        : {{ $data->nik }}
                    </div>
                    <div class="col-3">
                        Tempat Lahir
                    </div>
                    <div class="col-9">
                        : {{ $data->tempat_lahir }}
                    </div>
                    <div class="col-3">
                        Tanggal Lahir
                    </div>
                    <div class="col-9">
                        : {{ $data->tanggal_lahir }}
                    </div>
                    <div class="col-3">
                        Jenis Kelamin
                    </div>
                    <div class="col-9">
                        : {{ $data->jenis_kelamin }}
                    </div>
                    <div class="col-3">
                        Negara
                    </div>
                    <div class="col-9">
                        : {{ $data->id_ref_negara }}
                    </div>
                    <div class="col-3">
                        Alamat
                    </div>
                    <div class="col-9">
                        : {{ $data->alamat }}
                    </div>
                    <div class="col-3">
                        No Telepon
                    </div>
                    <div class="col-9">
                        : {{ $data->no_telepon }}
                    </div>
                    <div class="col-3">
                        Pendidikan
                    </div>
                    <div class="col-9">
                        : {{ $data->kualifikasi_pendidikan }}
                    </div>
                    <div class="col-3">
                        Prodi
                    </div>
                    <div class="col-9">
                        : {{ $data->id_prodi }}
                    </div>
                </div>


                <a href="/asesor">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
            </div>
        </div>
    </section>
@endsection
