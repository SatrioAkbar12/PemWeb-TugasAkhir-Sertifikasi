@extends('asesi.layout.template')

@section('head_title', 'Isi Kuesioner')

@section('sidebar-kuesioner-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Isi Kuesioner</h1>
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
                            <th>ID</th>
                            <th>Pertanyaan</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($data as $d)
                        <tbody>
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->pertanyaan }}</td>
                                <td class="project-actions text-right">
                                    {{-- <a class="btn btn-primary btn-sm" href="/asesi/isiKuesioner/{{ $d->id }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a> --}}
                                    <a class="btn btn-info btn-sm" href="/asesi/isiKuesioner/{{ $d->id }}/jawab">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Jawab
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
