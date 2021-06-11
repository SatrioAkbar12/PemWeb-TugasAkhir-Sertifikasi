@extends('admin.layouts.template')

@section('head_title', 'Unit Kompetensi Sertifikasi')

@section('sidebar-unitKompetensiSertifikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Unit Kompetensi Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                {{-- <div class="row">
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
                </div> --}}
                <table class="table table-striped projects">
                    <tbody>
                        <tr>
                            <td>
                                ID Jenis Sertifikasi
                            </td>
                            <td>
                                : {{ $data->refJenisSertifikasi->id }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Sertifikasi
                            </td>
                            <td>
                                : {{ $data->refJenisSertifikasi->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Unit Kompetensi
                            </td>
                            <td>
                                @foreach ($data_kompetensi as $d)
                                    <div class="row p-1">
                                        <div class="col-1 text-center">
                                            <input type="checkbox" {{ $d->is_aktif == 1 ? 'checked' : '' }} disabled>
                                        </div>
                                        <div class="col-8">
                                            {{ $d->refUnitKompetensi->nama }}
                                        </div>
                                        <div class="col-3 text-right">
                                            <a href="/admin/unit-kompetensi-sertifikasi/{{ $d->id }}/edit">
                                                <button class="btn btn-info" type="button">Edit</button>
                                            </a>
                                            <a href="/admin/unit-kompetensi-sertifikasi/{{ $d->id }}/delete">
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
                    <a href="/admin/unit-kompetensi-sertifikasi/tambah">
                        <button type="button" class="btn btn-success">Tambah</button>
                    </a>
                    <a href="/admin/unit-kompetensi-sertifikasi">
                        <button type="button" class="btn btn-danger">Kembali</button>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
