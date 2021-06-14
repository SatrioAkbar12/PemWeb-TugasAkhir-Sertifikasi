@extends('asesi.layout.template')

@section('head_title', 'Daftar Sertifikasi')

@section('sidebar-Sertifikasi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/asesi/daftarsertifikasi/{{ $data->id }}/daftar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{-- {{ method_field('PUT') }} --}}

                    <div class="form-group">
                        <label for="input_status_akhir_sertifikasi" class="form-label">Jawaban</label>
                        <textarea id="input_status_akhir_sertifikasi" class="form-control" name="status_akhir_sertifikasi" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->status_akhir_sertifikasi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="input_tanggal_status_akhir" class="form-label">Status Akhir</label>
                        <textarea id="input_tanggal_status_akhir" class="form-control" name="tanggal_status_akhir" type="date"
                            placeholder="Masukkan jawaban ..." required >{{ $data->tanggal_status_akhir }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="input_status_pendaftaran" class="form-label">Status Pendaftaran</label>
                        <textarea id="input_status_pendaftaran" class="form-control" name="status_pendaftaran" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->status_pendaftaran }}</textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/asesi/daftarsertifikasi"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
