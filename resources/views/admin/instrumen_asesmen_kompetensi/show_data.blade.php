@extends('admin.layouts.template')

@section('head_title', 'Instrumen Asesmen Kompetensi')

@section('sidebar-instrumenAsesmen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Instrumen Asesmen Kompetensi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <tbody>
                        <tr>
                            <td>
                                ID Unit Kompetensi
                            </td>
                            <td>
                                : {{ $data->refUnitKompetensi->id }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Unit Kompetensi
                            </td>
                            <td>
                                : {{ $data->refUnitKompetensi->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Instrumen Pertanyaan
                            </td>
                            <td>
                                @foreach ($data_instrumenasesmen as $d)
                                    <div class="row p-1">
                                        <div class="col-1 text-center">
                                            <input type="checkbox" {{ $d->is_aktif == 1 ? 'checked' : '' }} disabled>
                                        </div>
                                        <div class="col-8">
                                            {{ $d->instrumen_pertanyaan }}
                                        </div>
                                        <div class="col-3 text-right">
                                            <a href="{{ route('admin.instrumen-asesmen.show-edit', ['id' => $d->id]) }}">
                                                <button class="btn btn-info" type="button">Edit</button>
                                            </a>
                                            <a href="{{ route('admin.instrumen-asesmen.delete', ['id' => $d->id]) }}">
                                                <button class="btn btn-danger" type="button">Delete</button>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-4">
                    <a href="{{ route('admin.instrumen-asesmen.show-create') }}">
                        <button type="button" class="btn btn-success">Tambah</button>
                    </a>
                    <a href="{{ route('admin.instrumen-asesmen.index') }}">
                        <button type="button" class="btn btn-danger">Kembali</button>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
