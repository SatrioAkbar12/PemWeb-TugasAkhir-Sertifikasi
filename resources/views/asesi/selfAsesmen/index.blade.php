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
                    </tr>
                </thead>
                @foreach ($syarat as $d)
                    <tbody>
                        <tr>
                            <td>{{ $d->nama }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="/asesi/self-asesmen/{{ $d->id_ref_jenis_sertifikasi}}/view">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    View
                                </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
                {{-- @foreach ($data as $d)
                    <tbody>
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->instrumen_pertanyaan }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="/asesi/self-asesmen/{{ $d->id }}/jawab">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Jawab
                                </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach --}}
            </table>
        </div>
        <!-- /.card-body -->
    </div>

</section>
  <!-- /.content -->
@endsection
