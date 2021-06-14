@extends('admin.layouts.template')

@section('head_title', 'Jadwal Sertifikasi')

@section('sidebar-jadwal-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Kegiatan Jadwal Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-4">
                        ID Sertifikasi
                    </div>
                    <div class="col-8">
                        : {{ $data->penawaranSertifikasi->id }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Nama Sertifikasi
                    </div>
                    <div class="col-8">
                        : {{ $data->penawaranSertifikasi->nama }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Kegiatan
                    </div>
                    <div class="col-8">
                        : {{ $data->refKegiatan->nama_kegiatan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Deskripsi Jadwal
                    </div>
                    <div class="col-8">
                        : {{ $data->deskripsi }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Tanggal Awal
                    </div>
                    <div class="col-8">
                        : {{ $data->tanggal_awal }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Tanggal Akhir
                    </div>
                    <div class="col-8">
                        : {{ $data->tanggal_akhir }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Ditampilkan
                    </div>
                    <div class="col-8">
                        : {{ $data->is_show == 1 ? 'Ya' : 'Tidak' }}
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
                <div class="py-3">
                    <a href="{{ route('admin.jadwal.kegiatan.read', ['id_penawaranSertifikasi' => $data->id_penawaran_sertifikasi]) }}">
                        <button type="button" class="btn btn-danger">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
