@extends('admin.layouts.template')

@section('head_title', 'Syarat Sertifikasi')

@section('sidebar-syaratSertifikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Syarat Sertifikasi</h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
            <a href="/admin/syarat-sertifikasi/tambah">
                <button type="button" class="btn btn-success">Tambah Data</button>
            </a>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead class="text-center">
                <tr>
                    <th>
                        ID Jenis Sertifikasi
                    </th>
                    <th>
                        Jenis Sertifikasi
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            @foreach ($data as $d)
            <tbody>
                <tr>
                    <td class="text-center">
                        {{ $d->refJenisSertifikasi->id }}
                    </td>
                    <td>
                        <a>
                            {{ $d->refJenisSertifikasi->nama }}
                        </a>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="/admin/syarat-sertifikasi/{{ $d->refJenisSertifikasi->id }}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        {{-- <a class="btn btn-info btn-sm" href="/admin/syarat-sertifikasi/{{ $d->id }}/edit">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a> --}}
                        {{-- <a class="btn btn-danger btn-sm" href="/admin/syarat-sertifikasi/{{ $d->id }}/delete">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a> --}}
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection
