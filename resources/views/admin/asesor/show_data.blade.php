@extends('admin.layouts.template')

@section('head_title', 'Kelola Asesor')

@section('sidebar-asesor-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Asesor</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-4 col-md-2">
                        ID Asesor
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->id }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Username
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_user->username }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Nama Lengkap
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->nama }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Email
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_user->email }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        NIM
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->nip }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        NIK
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->nik }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Tempat Lahir
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->tempat_lahir }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Tanggal Lahir
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->tanggal_lahir }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Jenis kelamin
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->jenis_kelamin }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Negara
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_refnegara->nama }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Alamat
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->alamat }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Nomor Telepon
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->no_telepon }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Kualifikasi Pendidikan
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->kualifikasi_pendidikan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Program Studi
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_prodi->nama }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Dibuat oleh
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->created_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Diperbarui oleh
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->edited_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Dibuat pada
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->created_at }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-md-2">
                        Diperbarui pada
                    </div>
                    <div class="col-8 col-md-10">
                        : {{ $data_asesor->updated_at }}
                    </div>
                </div>

                <a href="/admin/kelola-asesor">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
            </div>
        </div>
    </section>
@endsection
