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
                                @foreach ($data_syarat as $d)
                                    <div class="row p-1">
                                        <div class="col-8">
                                            {{ $d->syarat }}
                                        </div>
                                        <div class="col-3 text-right">
                                            <a href="{{ route('asesi.berkas-syarat.show-upload-syarat', ['id_sertifikasi' => $data->id, 'id_syarat' => $d->id])}}">
                                                <button class="btn btn-primary" type="button">Upload</button>
                                            </a>
                                            <a href="{{ route('asesi.berkas-syarat.read-upload-syarat', ['id_sertifikasi' => $data->id, 'id_syarat' => $d->id]) }}">
                                                <button class="btn btn-info" type="button">Detail</button>
                                            </a>
                                            {{-- @foreach ($data_pendaftarsyarat as $d_pendaftarsyarat) --}}
                                                {{-- @if($d_pendaftarsyarat->id_syarat_sertifikasi == $d->id)
                                                    <a href="{{ route('asesi.berkas-syarat.show-upload-syarat', ['id_sertifikasi' => $data->id, 'id_syarat' => $d->id])}}">
                                                        <button class="btn btn-primary" type="button" disabled>Upload</button>
                                                    </a>
                                                    <a href="{{ route('asesi.berkas-syarat.read-upload-syarat', ['id_sertifikasi' => $data->id, 'id_syarat' => $d->id]) }}">
                                                        <button class="btn btn-info" type="button">Detail</button>
                                                    </a>
                                                    @break
                                                @else
                                                    <a href="{{ route('asesi.berkas-syarat.show-upload-syarat', ['id_sertifikasi' => $data->id, 'id_syarat' => $d->id])}}">
                                                        <button class="btn btn-primary" type="button">Upload</button>
                                                    </a>
                                                    <a href="{{ route('asesi.berkas-syarat.read-upload-syarat', ['id_sertifikasi' => $data->id, 'id_syarat' => $d->id]) }}">
                                                        <button class="btn btn-info" type="button" disabled>Detail</button>
                                                    </a>
                                                @endif --}}
                                            {{-- @endforeach --}}
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
