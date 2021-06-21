@extends('asesi.layout.template')

@section('head_title', 'Self Asesmen')

@section('sidebar-selfAsesmen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4> Kompetensi : {{ $data->nama }}</h4>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <table class="table table-striped projects">
                    <tbody>
                        @foreach ($data->instrumenAsesmenKompetensi as $d)
                            @if($d->is_aktif == 1)
                                <tr>
                                    <td>
                                        {{ $d->instrumen_pertanyaan }}
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('asesi.self-asesmen.show-jawab', ['id_sertifikasi' => $id_sertifikasi, 'id_ref_unit_kompetensi' => $data->id, 'id_instrumen_asesmen' => $d->id])}}">
                                            <button type="button" class="btn btn-primary">Jawab</button>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="py-3">
                    <a href="{{ route('asesi.self-asesmen.lock-unit-kompetensi', ['id_sertifikasi' => $id_sertifikasi, 'id_ref_unit_kompetensi' => $data->id])}}">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </a>
                    <a href="{{ route('asesi.self-asesmen.show-view', ['id_sertifikasi' => $id_sertifikasi]) }}">
                        <button class="btn btn-danger" type="button">Kembali</button>
                    </a>
                    <p>*Tombol simpan akan mengunci unit kompetensi ini</p>
                </div>
            </div>
        </div>
    </section>
@endsection
