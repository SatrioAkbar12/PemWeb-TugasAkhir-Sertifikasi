@extends('asesor.layouts.template')

@section('head_title', 'Verifikasi Instrumen')

@section('sidebar-verifikasiInstrumen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jawaban Instrumen Sertifikasi Peserta</h1>
                </div>
            </div>
    </section>


    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="{{ route('asesor.verifikasi-instrumen.verifikasi', ['id_asesorpendaftar' => $id_asesorpendaftar, 'id_instrumen' => $id_Instrumen]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                    <div class="form-group">
                        <label for="input_komentar" class="form-label">Jawaban</label>
                        <textarea id="input_komentar" class="form-control" name="jawaban" placeholder="Masukkan komentar ..."></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('asesor.verifikasi-instrumen.read-instrumen', ['id_asesorpendaftar' => $id_asesorpendaftar, 'id_instrumen' => $id_Instrumen]) }}"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
