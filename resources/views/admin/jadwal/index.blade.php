@extends('admin.layouts.template')

@section('head_title', 'Jadwal Sertifikasi')

@section('sidebar-jadwal-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Jadwal Sertifikasi</h1>
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
            <a href="{{ route('admin.jadwal.show-create') }}">
                <button type="button" class="btn btn-success">Tambah Data</button>
            </a>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead class="text-center">
                <tr>
                    <th>
                        ID Sertifikasi
                    </th>
                    <th>
                        Nama Sertifikasi
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            @foreach ($data as $d)
            <tbody>
                <tr>
                    <td class="text-center">
                        {{ $d->penawaranSertifikasi->id }}
                    </td>
                    <td>
                        <a>
                            {{ $d->penawaranSertifikasi->nama }}
                        </a>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.jadwal.kegiatan.read', ['id_penawaranSertifikasi' => $d->penawaranSertifikasi->id]) }}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
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
