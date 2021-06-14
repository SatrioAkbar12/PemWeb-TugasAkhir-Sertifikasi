@extends('admin.layouts.template')

@section('head_title', 'Jadwal Sertifikasi')

@section('sidebar-jadwal-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Jadwal Sertifikasi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="{{ route('admin.jadwal.kegiatan.edit', ['id_penawaranSertifikasi' => $data->id_penawaran_sertifikasi, 'id_jadwal' => $data->id])}}">
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_penawaranSertifikasi" class="form-label">Penawaran Sertifikasi</label>
                        <select id="input_penawaranSertifikasi" class="form-control" name="penawaranSertifikasi" disabled required>
                            @foreach ($data_penawaransertifikasi as $d_penawaransertifikasi)
                                <option value="{{ $d_penawaransertifikasi->id }}" {{ $d_penawaransertifikasi->id == $data->id_penawaran_sertifikasi ? 'selected' : '' }}>{{ $d_penawaransertifikasi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_kegiatan" class="form-label">Kegiatan</label>
                        <div class="row">
                            <div class="col-md-4">
                                <select id="input_kegiatan" class="form-control" name="kegiatan" disabled required>
                                    @foreach ($data_refkegiatan as $d_refkegiatan)
                                        <option value="{{ $d_refkegiatan->id }}" {{ $d_refkegiatan->id == $data->id_kegiatan ? 'selected' : '' }}>{{ $d_refkegiatan->nama_kegiatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_deskripsi" class="form-label">Deskripsi Jadwal</label>
                        <textarea id="input_deskripsi" class="form-control" name="deskripsi" placeholder="Masukkan deskripsi ..." required>{{ $data->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <label for="input_tanggalAwal" class="form-label">Tanggal Awal</label>
                                <input id="input_tanggalAwal" class="form-control" name="tanggalAwal" type="date" value="{{ $data->tanggal_awal }}" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <label for="input_tanggalAkhir" class="form-label">Tanggal Akhir</label>
                                <input id="input_tanggalAkhir" class="form-control" name="tanggalAkhir" type="date" value="{{ $data->tanggal_akhir }}" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_show" class="form-label">Ditampilkan</label>
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <select id="input_show" class="form-control" name="show" required>
                                    <option value="1" {{ $data->is_show == 1 ? 'selected' : ''}}>Ya</option>
                                    <option value="0" {{ $data->is_show == 0 ? 'selected' : ''}}>Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="/admin/jadwal"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
