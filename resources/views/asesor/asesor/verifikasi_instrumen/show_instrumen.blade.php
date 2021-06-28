@extends('asesor.layouts.template')

@section('head_title', 'Verifikasi Instrumen')

@section('sidebar-verifikasiInstrumen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Unit Kompetensi {{ $data_refunitkompetensi->nama }}</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="{{ route('asesor.verifikasi-instrumen.verifikasi', ['id_pendaftar' => $id_pendaftar, 'id_ref_unit_kompetensi' => $data_refunitkompetensi->id])}}">
                    {{ csrf_field() }}
                    @foreach ($data as $d)
                        @if ($d->instrumenAsesmenKompetensi->id_ref_unit_kompetensi == $data_refunitkompetensi->id)
                            <div class="py-3">
                                <div class="row">
                                    <div class="col-3">
                                        Pertanyaan
                                    </div>
                                    <div class="col-9">
                                        : {{ $d->instrumenAsesmenKompetensi->instrumen_pertanyaan }}
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="col-3">
                                        Jawaban Self Asesmen
                                    </div>
                                    <div class="col-9">
                                        <textarea class="form-control" disabled>{{ $d->jawaban_self_asesmen }}</textarea>
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="col-3">
                                        File upload
                                    </div>
                                    <div class="col-9">
                                        :
                                        @if ($d->path_bukti != null)
                                            <a href="{{ asset($d->path_bukti) }}" target="blank">Klik untuk lihat</a>
                                        @else
                                            -
                                        @endif
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="col-3">
                                        Komentar upload
                                    </div>
                                    <div class="col-9">
                                        <textarea class="form-control" disabled>{{ $d->komentar_bukti }}</textarea>
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="col-3">
                                        Jawaban Asesor
                                    </div>
                                    <div class="col-9">
                                        <textarea class="form-control" name="{{ $d->id_instrumen_asesmen }}_jawaban_asesor">{{ $d->jawaban_asesor_verifikasi }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="py-4">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('asesor.verifikasi-instrumen.read-pendaftar', ['id_pendaftar' => $id_pendaftar])}}">
                            <button type="button" class="btn btn-danger">Kembali</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
