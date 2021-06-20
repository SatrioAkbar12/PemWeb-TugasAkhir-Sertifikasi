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
                <form method="post" action="{{ route('asesi.berkas-syarat.store-upload-syarat', ['id_sertifikasi' => $id_sertifikasi, 'id_syarat' => $data->id]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_syarat" class="form-label">Syarat</label>
                        <input id="input_syarat" class="form-control" type="text" name="syarat" value="{{ $data->syarat }}" disabled />
                    </div>
                    <div class="form-group">
                        <label for="input_file" class="form-label">Upload File</label>
                        <input id="input_file" class="form-control" type="file" name="file" required />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('asesi.berkas-syarat.show-syarat', ['id_sertifikasi' => $id_sertifikasi]) }}"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
