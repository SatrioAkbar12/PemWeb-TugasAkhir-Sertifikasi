@extends('admin.layouts.template')

@section('head_title', 'Instrumen Asesmen Kompetensi')

@section('sidebar-instrumenAsesmen-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Instrumen Asesmen Kompetensi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="{{ route('admin.instrumen-asesmen.create') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_UnitKompetensi" class="form-label">Unit Kompetensi</label>
                        <select id="input_UnitKompetensi" class="form-control" name="refUnitKompetensi" required>
                            @foreach ($data_refunitkompetensi as $d_refunitkompetensi)
                                <option value="{{ $d_refunitkompetensi->id }}">{{ $d_refunitkompetensi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_pertanyaan" class="form-label">Pertanyaan</label>
                        <textarea id="input_pertanyaan" class="form-control" name="pertanyaan" placeholder="Masukkan pertanyaan ..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_status" class="form-label">Status Pertanyaan</label>
                        <input id="input_status" class="form-control" name="status" placeholder="Masukkan status ... " required />
                    </div>
                    <div class="form-group">
                        <label for="input_aktif" class="form-label">Aktif</label>
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <select id="input_aktif" class="form-control" name="aktif" required>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="{{ route('admin.instrumen-asesmen.index') }}"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
