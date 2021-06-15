@extends('asesi.layout.template')

@section('head_title', 'Berkas Syarat')

@section('sidebar-syarat-active', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Isi Berkas Syarat</h1>
            </div>
        </div>
</section>

<section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/asesi/berkas-syarat/{{ $data->id }}/berkas">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="input_syarat" class="form-label">Syarat</label>
                        <textarea id="input_syarat" class="form-control" name="syarat" type="text"
                            placeholder="Masukkan syarat ..." required >{{ $data->syarat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_status_verifikasi_syarat" class="form-label">Status Verifikasi Syarat</label>
                        <textarea id="input_status_verifikasi_syarat" class="form-control" name="status_verifikasi_syarat" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->status_verifikasi_syarat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_path_bukti" class="form-label">Path Bukti</label>
                        <textarea id="input_path_bukti" class="form-control" name="path_bukti" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->path_bukti }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_verifikasi_asesor" class="form-label">Verifikasi Asesor</label>
                        <textarea id="input_verifikasi_asesor" class="form-control" name="verifikasi_asesor" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->verifikasi_asesor }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_komentar_asesor" class="form-label">Komentar Asesor</label>
                        <textarea id="input_komentar_asesor" class="form-control" name="komentar_asesor" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->komentar_asesor }}</textarea>
                    </div>
            
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/asesi/isiSyarat"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
