@extends('asesi.layout.template')

@section('head_title', 'Self Asesmen')

@section('sidebar-selfAsesmen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4> Kompetensi : {{ $data_refunitkompetensi->nama }}</h4>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="{{ route('asesi.self-asesmen.store-asesmen', ['id_sertifikasi' => $id_sertifikasi, 'id_ref_unit_kompetensi' => $data_refunitkompetensi->id])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @foreach ($data as $d)
                        @if($d->instrumenAsesmenKompetensi->id_ref_unit_kompetensi == $data_refunitkompetensi->id && $d->instrumenAsesmenKompetensi->is_aktif == 1)
                            <div class="py-3">
                                <label for="pertanyaan_{{ $d->id_instrumen_asesmen }}" class="form-label">{{ $d->instrumenAsesmenKompetensi->instrumen_pertanyaan }}</label>
                                <textarea id="pertanyaan_{{ $d->id_instrumen_asesmen }}" class="form-control" name="{{ $d->id_instrumen_asesmen }}_jawaban" placeholder="Masukkan jawaban ..." required>{{ $d->jawaban_self_asesmen }}</textarea>
                                <div class="px-4 py-2">
                                    <label class="from-label">Upload file</label>
                                    <input id="pertanyaan_{{ $d->id_instrumen_asesmen }}" class="form-control" type="file" name="{{ $d->id_instrumen_asesmen }}_upload" value="{{ $d->path_bukti }}">
                                    <textarea id="pertanyaan_{{ $d->id_instrumen_asesmen }}" class="form-control" name="{{ $d->id_instrumen_asesmen }}_uploadkomentar" placeholder="Komentar file upload ...">{{ $d->komentar_bukti }}</textarea>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="py-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('asesi.self-asesmen.show-view', ['id_sertifikasi' => $id_sertifikasi]) }}">
                            <button class="btn btn-danger" type="button">Kembali</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
