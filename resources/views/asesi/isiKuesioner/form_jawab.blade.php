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
                <form method="post" action="/asesi/kuesioner/{{ $data->id }}/jawab">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}

                    {{-- <div class="form-group">
                        <label for="input_pertanyaan" class="form-label">Pertanyaan</label>
                        <textarea id="input_pertanyaan" class="form-control" name="pertanyaan" type="text"
                            placeholder="Masukkan pertanyaan ..." required >{{ $data->pertanyaan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_aktif" class="form-label">Is aktif</label>
                        <select id="input_aktif" class="form-control" name="is_aktif">
                            <option value="1" {{ $data->is_aktif == 1 ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ $data->is_aktif == 0 ? 'selected' : '' }}>Tidak</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/asesi/kuesioner"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
