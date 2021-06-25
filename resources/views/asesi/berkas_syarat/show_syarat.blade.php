@extends('asesi.layout.template')

@section('head_title', 'Berkas Syarat')

@section('sidebar-syarat-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Syarat Sertifikasi</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <tbody>
                        <tr>
                            <td>
                                Nama Sertifikasi
                            </td>
                            <td>
                                : {{ $data->nama }}
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
                                Syarat
                            </td>
                            <td>
                                @foreach ($data_pendaftarsyarat as $d)
                                    <div class="row p-1">
                                        <div class="col-8">
                                            {{ $d->syaratSertifikasi->syarat }}
                                        </div>
                                        <div class="col-3 text-right">
                                            @if ($d->path_bukti == null)
                                                <a href="{{ route('asesi.berkas-syarat.show-upload-syarat', ['id_sertifikasi' => $data->id, 'id_syarat' => $d->id_syarat_sertifikasi])}}">
                                                    <button class="btn btn-primary" type="button">Upload</button>
                                                </a>
                                            @else
                                                <a href="{{ route('asesi.berkas-syarat.read-upload-syarat', ['id_sertifikasi' => $data->id, 'id_syarat' => $d->id_syarat_sertifikasi]) }}">
                                                    <button class="btn btn-info" type="button">Detail</button>
                                                </a>
                                            @endif
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
