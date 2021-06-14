@extends('admin.layouts.template')

@section('head_title', 'Jadwal Sertifikasi')

@section('sidebar-jadwal-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Jadwal Sertifikasi</h1>
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
                                ID Sertifikasi
                            </td>
                            <td>
                                {{ $data->penawaranSertifikasi->id }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nama Sertifikasi
                            </td>
                            <td>
                                {{ $data->penawaranSertifikasi->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kegiatan
                            </td>
                            <td>
                                @foreach ($data_kegiatan as $d)
                                    <div class="row p-1">
                                        <div class="col-1 text-center">
                                            <input type="checkbox" value="{{ $d->is_show }}" {{ $d->is_show == 1 ? 'checked' : '' }} disabled />
                                        </div>
                                        <div class="col-7">
                                            {{ $d->refKegiatan->nama_kegiatan }}
                                        </div>
                                        <div class="col-4 text-right">
                                            <a href="{{ route('admin.jadwal.kegiatan.read-kegiatan', ['id_penawaranSertifikasi' => $d->id_penawaran_sertifikasi, 'id_jadwal' => $d->id]) }}">
                                                <button class="btn btn-info" type="button">View</button>
                                            </a>
                                            <a href="{{ route('admin.jadwal.kegiatan.show-edit', ['id_penawaranSertifikasi' => $d->id_penawaran_sertifikasi, 'id_jadwal' => $d->id]) }}">
                                                <button class="btn btn-warning" type="button">Edit</button>
                                            </a>
                                            <a href="{{ route('admin.jadwal.kegiatan.delete', ['id_penawaranSertifikasi' => $d->id_penawaran_sertifikasi, 'id_jadwal' => $d->id]) }}">
                                                <button class="btn btn-danger" type="button">Delete</button>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-4">
                    <a href="{{ route('admin.jadwal.show-create') }}">
                        <button type="button" class="btn btn-success"> Tambah Data</button>
                    </a>
                    <a href="{{ route('admin.jadwal.index') }}">
                        <button type="button" class="btn btn-danger">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
