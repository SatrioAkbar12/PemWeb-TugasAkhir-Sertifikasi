@extends('asesor.layouts.template')

@section('head_title', 'Asesor')

@section('sidebar-prodi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peserta Sertifikasi</h1>
                </div>
            </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead class="text-center">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Nama Peserta
                            </th>
                            <th>
                                Sertifikasi
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    @foreach ($data_pendaftar as $d)
                        <tbody>
                            @if ($d->pendaftar->status_akhir_sertifikasi == 'selesai asesmen')
                                <tr>
                                    <td class="text-center">
                                        {{ $d->pendaftar->asesi->id }}
                                    </td>
                                    <td class="text-center">
                                        <a>
                                            {{ $d->pendaftar->asesi->nama }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a>
                                            {{ $d->pendaftar->penawaranSertifikasi->nama }}
                                        </a>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('asesor.verifikasi-instrumen.read-pendaftar', ['id_pendaftar' => $d->id_pendaftar]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>


@endsection
