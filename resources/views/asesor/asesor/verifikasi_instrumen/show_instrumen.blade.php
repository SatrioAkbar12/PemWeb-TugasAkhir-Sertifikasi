@extends('asesor.layouts.template')

@section('head_title', 'Verifikasi Instrumen')

@section('sidebar-verifikasiInstrumen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Syarat Sertifikasi Peserta</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-2">
                        Instrumen
                    </div>
                    <div class="col-10">
                        : {{ $data->InstrumenAsesmenKompetensi->instrumen_pertanyaan}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        File Upload
                    </div>
                    <div class="col-10">
                        : <a href="{{ url($data->path_bukti) }}" target="blank">Klik untuk lihat</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Jawaban Self Asesmen
                    </div>
                    <div class="col-10">
                        : {{ $data->jawaban_self_asesmen}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Komentar
                    </div>
                    <div class="col-10">
                        : {{ $data->komentar_bukti }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                       Jawaban Asesor
                    </div>
                    <div class="col-10">
                        : {{ $data->jawaban_asesor_verifikasi }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Verified by
                    </div>
                    <div class="col-10">
                        : {{ $data->verified_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Verified at
                    </div>
                    <div class="col-10">
                        : {{ $data->verified_at }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Dibuat oleh
                    </div>
                    <div class="col-10">
                        : {{ $data->created_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Diperbarui oleh
                    </div>
                    <div class="col-10">
                        : {{ $data->edited_by }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Dibuat pada
                    </div>
                    <div class="col-10">
                        : {{ $data->created_at }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Diperbarui pada
                    </div>
                    <div class="col-10">
                        : {{ $data->updated_at }}
                    </div>
                </div>
                <div class="py-3">
               
                    <a href="{{ route('asesor.verifikasi-instrumen.show-verifikasi', ['id_asesorpendaftar' => $id_asesorpendaftar, 'id_instrumen' => $data->id_instrumen_asesmen]) }}">
                        <button type="button" class="btn btn-primary">Verifikasi</button>
                    </a>
                    <a href="{{ route('asesor.verifikasi-instrumen.read-pendaftar', ['id_asesorpendaftar' => $id_asesorpendaftar]) }}">
                        <button type="button" class="btn btn-danger">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
