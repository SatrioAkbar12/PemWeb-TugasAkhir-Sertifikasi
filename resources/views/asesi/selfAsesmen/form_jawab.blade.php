@extends('asesi.layout.template')

@section('head_title', 'Jawab Asesmen')

@section('sidebar-selfAsesmen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jawab Asesmen</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/asesi/self-asesmen/{{ $data->id }}/jawab">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{-- {{ method_field('PUT') }} --}}

                    <div class="form-group">
                        <label for="input_jawaban" class="form-label">Jawaban</label>
                        <textarea id="input_jawaban" class="form-control" name="jawaban" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->jawaban_self_asesmen }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="input_jawaban" class="form-label">Path Bukti</label>
                        <textarea id="input_jawaban" class="form-control" name="jawaban" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->path_bukti }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="input_jawaban" class="form-label">Komentar</label>
                        <textarea id="input_jawaban" class="form-control" name="jawaban" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->komentar_bukti }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="input_jawaban" class="form-label">Jawaban Asesor Verifikasi</label>
                        <textarea id="input_jawaban" class="form-control" name="jawaban" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->jawaban_asesor_verifikasi }}</textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/asesi/self-asesmen"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
