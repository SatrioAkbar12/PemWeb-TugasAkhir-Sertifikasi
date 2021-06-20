@extends('asesor.layouts.template')

@section('head_title', 'Verifikasi Berkas')

@section('sidebar-verifikasiBerkas-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Verifikasi Syarat Sertifikasi Peserta</h1>
                </div>
            </div>
    </section>


    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="{{ route('asesor.verifikasi-berkas.verifikasi', ['id_asesorpendaftar' => $id_asesorpendaftar, 'id_syarat' => $id_syarat]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_syarat" class="form-label">Syarat</label>
                        <input id="input_syarat" class="form-control" type="text" name="syarat" value="{{ $data->syaratSertifikasi->syarat }}" disabled />
                    </div>
                    <div class="form-group">
                        <label for="input_status" class="form-label">Status Verifikasi</label>
                        <select id="input_status" class="form-control" name="status" required>
                            <option value="lolos verifikasi">Lolos verifikasi</option>
                            <option value="gagal verifikasi">Tidak lolos verifikasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_komentar" class="form-label">Komentar</label>
                        <textarea id="input_komentar" class="form-control" name="komentar" placeholder="Masukkan komentar ..."></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('asesor.verifikasi-berkas.read-syarat', ['id_asesorpendaftar' => $id_asesorpendaftar, 'id_syarat' => $id_syarat]) }}"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
