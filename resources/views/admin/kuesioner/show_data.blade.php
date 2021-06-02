@extends('admin.layouts.template')

@section('head_title', 'Kuesioner')

@section('sidebar-kuesioner-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Kuesioner</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-2">
                        ID
                    </div>
                    <div class="col-10">
                        : {{ $data->id }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Pertanyaan
                    </div>
                    <div class="col-10">
                        : {{ $data->pertanyaan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Is aktif
                    </div>
                    <div class="col-10">
                        : {{ $data->is_aktif }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Dibuat pada
                    </div>
                    <div class="col-10">
                        : {{ $data->created_at }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Diperbarui pada
                    </div>
                    <div class="col-10">
                        : {{ $data->updated_at }}
                    </div>
                </div>
                <a href="/admin/kuesioner">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
            </div>
        </div>
    </section>
@endsection
