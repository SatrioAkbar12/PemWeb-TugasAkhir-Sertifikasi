@extends('admin.layouts.template')

@section('head_title', 'Kelola Admin')

@section('sidebar-admin-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Admin</h1>
                </div>
            </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="/admin/kelola-admin/tambah">
                        <button type="button" class="btn btn-success">Tambah Data</button>
                    </a>
                    <a href="/admin/kelola-admin/{{ Auth::id() }}">
                        <button type="button" class="btn btn-primary">Lihat Data Pribadi</button>
                    </a>
                    <a href="/admin/kelola-admin/edit">
                        <button type="button" class="btn btn-warning">Edit Data Pribadi</button>
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
                            </th>
                        </tr>
                    </thead>
                    @foreach ($data as $d)
                        <tbody>
                            <tr>
                                <td>
                                    {{ $d->id }}
                                </td>
                                <td>
                                    <a>
                                        {{ $d->username }}
                                    </a>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="/admin/kelola-admin/{{ $d->id }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    @if ($d->id == Auth::id())
                                        <a class="btn btn-info btn-sm" href="/admin/kelola-admin/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                    @endif
                                    <a class="btn btn-danger btn-sm" href="/admin/kelola-admin/{{ $d->id }}/delete">
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
