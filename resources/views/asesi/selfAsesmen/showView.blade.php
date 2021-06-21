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
        <!-- Default box -->
        <!-- <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/asesi/self-asesmen/{{ $data->id }}/jawab">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{-- {{ method_field('PUT') }} --}}

                    <div class="form-group">
                        <label for="input_jawaban_self_asesmen" class="form-label">Jawaban</label>
                        <textarea id="input_jawaban_self_asesmen" class="form-control" name="jawaban_self_asesmen" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->jawaban_self_asesmen }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="input_path_bukti" class="form-label">Path Bukti</label>
                        <textarea id="input_path_bukti" class="form-control" name="path_bukti" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->path_bukti }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="input_komentar_bukti" class="form-label">Komentar</label>
                        <textarea id="input_komentar_bukti" class="form-control" name="komentar_bukti" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->komentar_bukti }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="input_jawaban_asesor_verifikasi" class="form-label">Jawaban Asesor Verifikasi</label>
                        <textarea id="input_jawaban_asesor_verifikasi" class="form-control" name="jawaban_asesor_verifikasi" type="text"
                            placeholder="Masukkan jawaban ..." required >{{ $data->jawaban_asesor_verifikasi }}</textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/asesi/self-asesmen"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div> -->

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
                                        <a href="{{ route('asesi.self-asesmen.show-unit-kompetensi', ['id_sertifikasi' => $data->id, 'id_ref_unit_kompentensi' => $d->refUnitKompetensi->id]) }}">
                                            <button class="btn btn-info" type="button">Jawab</button>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
