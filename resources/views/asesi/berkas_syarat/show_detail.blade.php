@extends('asesi.layout.template')

@section('head_title', 'Berkas Syarat')

@section('sidebar-syarat-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Berkas Syarat</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-2">
                        Syarat
                    </div>
                    <div class="col-10">
                        : {{ $data->syaratSertifikasi->syarat }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        File Upload
                    </div>
                    <div class="col-10">
                        : <a href="{{ url($data->path_bukti) }}" target="blank">Klik untuk lihat</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Status Verifikasi Syarat
                    </div>
                    <div class="col-10">
                        : {{ $data->status_verifikasi_syarat }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Asesor verifikator
                    </div>
                    <div class="col-10">
                        : {{ $data->verifikasi_asesor }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Komentar Asesor
                    </div>
                    <div class="col-10">
                        : {{ $data->komentar_asesor }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Verified by
                    </div>
                    <div class="col-10">
                        : {{ $data->verified_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Verified at
                    </div>
                    <div class="col-10">
                        : {{ $data->verified_at }}
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
                <a href="{{ route('asesi.berkas-syarat.show-syarat', ['id_sertifikasi' => $id_sertifikasi]) }}">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
            </div>
        </div>
    </section>
@endsection
