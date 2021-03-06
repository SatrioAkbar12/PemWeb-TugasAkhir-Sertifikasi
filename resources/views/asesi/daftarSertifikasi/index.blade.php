@extends('asesi.layout.template')

@section('head_title', 'Daftar Sertifikasi')

@section('sidebar-sertifikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Daftar Sertifikasi</h1>
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
                @if ($data_pendaftar->isEmpty())
                    <tr>
                        <td>
                            {{ $d->id }}
                        </td>
                        <td>
                            <a>
                                {{ $d->nama }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $d->refJenisSertifikasi->nama }}
                            </a>
                        </td>
                        <td class="project-actions text-right">
                            <a href="/asesi/daftarsertifikasi/{{ $d->id }}/lihat">
                                <button type="button" class="btn btn-info">
                                    <i class="fas fa-folder"></i>
                                    Detail
                                </button>
                            </a>
                        </td>
                    </tr>
                @else
                    @foreach ($data_pendaftar as $d_pendaftar)
                        @if ($d_pendaftar->id_penawaran_sertifikasi != $d->id)
                            <tr>
                                <td>
                                    {{ $d->id }}
                                </td>
                                <td>
                                    <a>
                                        {{ $d->nama }}
                                    </a>
                                </td>
                                <td>
                                    <a>
                                        {{ $d->refJenisSertifikasi->nama }}
                                    </a>
                                </td>
                                <td class="project-actions text-right">
                                    <a href="/asesi/daftarsertifikasi/{{ $d->id }}/lihat">
                                        <button type="button" class="btn btn-info">
                                            <i class="fas fa-folder"></i>
                                            Detail
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </tbody>
            @endforeach
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
  @include('sweetalert::alert')
@endsection
