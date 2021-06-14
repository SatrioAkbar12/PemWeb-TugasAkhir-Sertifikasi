@extends('asesi.layout.template')

@section('head_title', 'Isi Kuesioner')

@section('sidebar-kuesioner-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jawab Kuesioner</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/asesi/isikuesioner/{{ $data->id }}/jawab">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{-- {{ method_field('PUT') }} --}}

                    <div class="form-group">
                        <label for="input_jawaban" class="form-label">Jawaban</label>
                        <textarea id="input_jawaban" class="form-control" name="jawaban" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->jawaban }}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/asesi/isikuesioner"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
