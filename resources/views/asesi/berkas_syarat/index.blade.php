@extends('asesi.layout.template')

@section('head_title', 'Berkas Syarat')

@section('sidebar-syarat-active', 'active')

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



      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead class="text-center">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nama Sertifikasi
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
                    <td>
                        {{ $d->id }}
                    </td>
                    <td>
                        <a>
                            {{ $d->penawaranSertifikasi->nama }}
                        </a>
                    </td>
                    <td>
                        <a>
                            {{ $d->penawaranSertifikasi->refJenisSertifikasi->nama }}
                        </a>
                    </td>
                    <td class="project-actions text-right">
                         <a href="{{ route('asesi.berkas-syarat.show-syarat', ['id_sertifikasi' => $d->penawaranSertifikasi->id])}}">
                            <button type="button" class="btn btn-info">
                                <i class="fas fa-folder"></i>
                                Detail
                            </button>
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

