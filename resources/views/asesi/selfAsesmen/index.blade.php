@extends('asesi.layout.template')

@section('head_title', 'Self Asesmen')

@section('sidebar-selfAsesmen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Self Asesmen</h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <!-- /.card -->

    {{-- CARD COBA --}}
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead class="text-center">
                    <tr>
                        <th>Sertifikasi</th>
                        <th>Jenis Sertifikas</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($data as $d)
                    <tbody>
                        <tr>
                            <td>{{ $d->penawaranSertifikasi->nama }}</td>
                            <td>{{ $d->penawaranSertifikasi->refJenisSertifikasi->nama }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('asesi.self-asesmen.show-view', ['id_sertifikasi' => $d->id_penawaran_sertifikasi]) }}">
                                    <i class="fas fa-pencil-alt">
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

</section>
  <!-- /.content -->
@endsection
