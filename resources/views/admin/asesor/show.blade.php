@extends('admin.layouts.template')

@section('head_title', 'Kelola Asesor')

@section('sidebar-asesor-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Asesor</h1>
                </div>
            </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                *untuk mengedit jenis sertifikasi dari asesor, bisa dilakukan pada menu <a href="{{ url('/admin/asesor-jenis-sertifikasi') }}">Asesor Jenis Sertifikasi</a>
                <div class="card-tools">
                    <a href="/admin/kelola-asesor/tambah">
                        <button type="button" class="btn btn-success">Tambah Data</button>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead class="text-center">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    @foreach ($data_asesor as $d)
                        <tbody>
                            <tr>
                                <td>
                                    {{ $d->id }}
                                </td>
                                <td>
                                    <a>
                                        {{ $d->user->username }}
                                    </a>
                                </td>
                                <td>
                                    <a>
                                        {{ $d->nama }}
                                    </a>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="/admin/kelola-asesor/{{ $d->id }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="/admin/kelola-asesor/{{ $d->id }}/edit">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="/admin/kelola-asesor/{{ $d->id }}/delete">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>

    </section>
@endsection
