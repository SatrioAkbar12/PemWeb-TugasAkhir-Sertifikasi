@extends('asesi.layout.template')

@section('head_title', 'Jawab Asesmen')

@section('sidebar-selfAsesmen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jawab Asesmen</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <table class="table table-striped projects">
            <tbody>
                <tr>
                    <td>
                        Sertifikasi
                    </td>
                    <td>
                        : {{ $data->nama }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis Sertifikasi
                    </td>
                    <td>
                        : {{ $data->refJenisSertifikasi->nama }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Deskripsi
                    </td>
                    <td>
                        : {{ $data->deskripsi_penawaran }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Periode
                    </td>
                    <td>
                        : {{ $data->periode }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Unit Kompetensi
                    </td>
                    <td>
                        @foreach ($data_kompetensi as $d)
                            @if ($d->is_aktif == 1)
                                <div class="row p-1">
                                    <div class="col-8">
                                        {{ $d->refUnitKompetensi->nama }}
                                    </div>
                                    <div class="col-3 text-right">
                                        @foreach ($data_pendaftarinstrumen as $d_pendaftarinstrumen)
                                            @if ($d_pendaftarinstrumen->instrumenAsesmenKompetensi->id_ref_unit_kompetensi == $d->id_ref_kompetensi && $d_pendaftarinstrumen->jawaban_self_asesmen == null)
                                                <a href="{{ route('asesi.self-asesmen.show-unit-kompetensi', ['id_sertifikasi' => $data->id, 'id_ref_unit_kompetensi' => $d->refUnitKompetensi->id]) }}">
                                                    <button class="btn btn-info" type="button">Jawab</button>
                                                </a>
                                                @break
                                            @elseif ($d_pendaftarinstrumen->instrumenAsesmenKompetensi->id_ref_unit_kompetensi == $d->id_ref_kompetensi && $d_pendaftarinstrumen->jawaban_self_asesmen != null)
                                                <a href="{{ route('asesi.self-asesmen.show-unit-kompetensi', ['id_sertifikasi' => $data->id, 'id_ref_unit_kompetensi' => $d->refUnitKompetensi->id]) }}">
                                                    <button class="btn btn-info" type="button">Perbarui Jawaban</button>
                                                </a>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="py-3">
            <a href="{{ route('asesi.self-asesmen.akhiri-asesmen', ['id_sertifikasi' => $data->id]) }}">
                <button class="btn btn-primary" type="button">Simpan dan Akhiri</button>
            </a>
            <a href="{{ route('asesi.self-asesmen.index') }}">
                <button class="btn btn-danger" type="button">Kembali</button>
            </a>
        </div>
    </section>
@endsection
