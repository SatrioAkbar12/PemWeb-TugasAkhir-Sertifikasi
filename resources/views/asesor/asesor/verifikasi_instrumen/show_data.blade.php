@extends('asesor.layouts.template')

@section('head_title', 'Verifikasi Instrumen')

@section('sidebar-verifikasiInstrumen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Instrumen Sertifikasi Peserta</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <tbody>
                        <tr>
                            <td>
                                Nama Pendaftar
                            </td>
                            <td>
                                : {{ $data->asesi->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sertifikasi
                            </td>
                            <td>
                                : {{ $data->penawaranSertifikasi->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Sertifikasi
                            </td>
                            <td>
                                : {{ $data->penawaranSertifikasi->refJenisSertifikasi->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Instrumen
                            </td>
                            <td>
                                @foreach ($data_unitkompetensisertifikasi as $d)
                                    @foreach ($data_pendaftarinstrumen as $d_pendaftarinstrumen)
                                        @if ($d_pendaftarinstrumen->instrumenAsesmenKompetensi->id_ref_unit_kompetensi == $d->id_ref_kompetensi)
                                            <div class="row py-1">
                                                <div class="col-9">
                                                    {{ $d->refUnitKompetensi->nama }}
                                                </div>
                                                <div class="col-3 text-right">
                                                    @if ($d_pendaftarinstrumen->verified_by == null)
                                                        <a href="{{ route('asesor.verifikasi-instrumen.read-instrumen', ['id_pendaftar' => $data->id, 'id_ref_unit_kompetensi' => $d->id_ref_kompetensi]) }}">
                                                            <button type="button" class="btn btn-primary">Cek</button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('asesor.verifikasi-instrumen.read-instrumen', ['id_pendaftar' => $data->id, 'id_ref_unit_kompetensi' => $d->id_ref_kompetensi]) }}">
                                                            <button type="button" class="btn btn-primary">Cek ulang</button>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-4">
                    <a href="{{ route('asesor.verifikasi-instrumen.akhiri-verifikasi', ['id_pendaftar' => $data->id])}}">
                        <button type="button" class="btn btn-success">Akhiri Verifikasi</button>
                    </a>
                    <a href="{{ route('asesor.verifikasi-instrumen.index') }}">
                        <button type="button" class="btn btn-danger">Kembali</button>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
