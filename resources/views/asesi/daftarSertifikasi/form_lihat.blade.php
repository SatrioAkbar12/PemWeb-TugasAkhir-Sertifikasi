@extends('asesi.layout.template')

@section('head_title', 'Daftar Sertifikasi')

@section('sidebar-sertifikasi-active', 'active')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Sertifikasi</h1>
                </div>
            </div>
    </section>

 <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-3">
                        Nama Sertifikasi
                    </div>
                    <div class="col-9">
                        : {{ $data->nama}}
                    </div>

                    <div class="col-3">
                        Jenis Sertifikasi
                    </div>
                    <div class="col-9">
                        : {{ $data->refJenisSertifikasi->nama}}
                    </div>

                    <div class="col-3">
                        Deskripsi
                    </div>
                    <br>
                    <div class="col-9">
                        : {{ $data->deskripsi_penawaran}}
                    </div>
                    <div class="col-3">
                        Syarat
                    </div>
                    <div class="col-9">
                        @foreach ($syarat as $d)
                        <div>
                            <input type="checkbox" {{ $d->is_aktif == 1 ? 'checked' : '' }} disabled>
                            {{ $d->syarat }}
                        </div>
                    @endforeach
                    </div>
                    <br>
                    <div class="col-3">
                        Periode
                    </div>
                    <div class="col-9">
                        : {{ $data->periode}}
                    </div>
                </div>

                {{-- <a href="/asesi/daftarsertifikasi/{{ $data->id }}/daftar">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i>
                         Daftar
                    </button>
                     </a>
                <a href="/asesi/daftarsertifikasi">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a> --}}

                <div>
                    <form method="post" action="/asesi/daftarsertifikasi/{{ $data->id }}/daftar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{-- {{ method_field('PUT') }} --}}
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Daftar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
@endsection
