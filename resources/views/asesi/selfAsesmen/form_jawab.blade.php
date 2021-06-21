@extends('asesi.layout.template')

@section('head_title', 'Jawab Asesmen')

@section('sidebar-selfAsesmen-active', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jawab Instrumen</h1>
            </div>
        </div>
</section>

<section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="{{ route('asesi.self-asesmen.jawab', ['id_sertifikasi' => $id_sertifikasi, 'id_ref_unit_kompentensi' => $id_ref_unit_kompetensi, 'id_instrumen_asesmen' => $data->id]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h5>{{ $data->instrumen_pertanyaan }}</h5>
                    <div class="form-group">
                        <label for="input_jawaban" class="form-label">Jawaban</label>
                        <textarea if="input_jawaban" class="form-control" name="jawaban" placeholder="Masukkan jawaban"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_file" class="form-label">Upload File</label>
                        <input id="input_file" class="form-control" type="file" name="file" required />
                    </div>
                    <div class="form-group">
                        <label for="input_komentar" class="form-label">Komentar File</label>
                        <textarea id="input_komentar" class="form-control" name="komentar" placeholder="Masukkan komentar ..."></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('asesi.self-asesmen.show-unit-kompetensi', ['id_sertifikasi' => $id_sertifikasi, 'id_ref_unit_kompentensi' => $id_ref_unit_kompetensi]) }}">
                            <button class="btn btn-danger" type="button">Kembali</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
