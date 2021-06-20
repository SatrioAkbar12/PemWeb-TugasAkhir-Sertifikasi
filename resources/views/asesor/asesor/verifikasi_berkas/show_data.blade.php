@extends('asesor.layouts.template')

@section('head_title', 'Verifikasi Berkas')

@section('sidebar-verifikasiBerkas-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Syarat Sertifikasi Peserta</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <tbody>
                        <tr>
                            <td>
                                Nama Pendaftar
                            </td>
                            <td>
                                : {{ $data->pendaftar->asesi->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sertifikasi
                            </td>
                            <td>
                                : {{ $data->pendaftar->penawaranSertifikasi->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Sertifikasi
                            </td>
                            <td>
                                : {{ $data->pendaftar->penawaranSertifikasi->refJenisSertifikasi->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Syarat
                            </td>
                            <td>
                                @foreach ($data_pendaftarsyarat as $d)
                                    <div class="row p-1">
                                        <div class="col-8">
                                            {{ $d->syaratSertifikasi->syarat }}
                                        </div>
                                        <div class="col-3 text-right">
                                            <a href="">
                                                <button class="btn btn-secondary" type="button">Lihat</button>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-4">
                    <a href="{{ route('asesi.berkas-syarat.index') }}">
                        <button type="button" class="btn btn-danger">Kembali</button>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
