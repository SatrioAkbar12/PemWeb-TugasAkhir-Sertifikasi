@extends('asesi.layout.template')

@section('head_title', 'Asesi')

@section('sidebar-prodi-active', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Profile Anda</h1>
            </div>
        </div>
</section>



<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-body p-4">
            <form method="post" action="/asesi/edit-data/edit">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="input_nama" class="form-label">Nama Asesi</label>
                    <input id="input_nama" class="form-control" name="nama" type="text" value="{{$data->nama}}" placeholder="Masukkan nama lengkap ..." required />
                </div>

                <div class="form-group">
                    <label for="input_nim" class="form-label">Nomor Induk Mahasiswa</label>
                    <input id="input_nim" class="form-control" name="nim" type="text" value="{{$data->nim}}" placeholder="Masukkan NIM ..." required />
                </div>

                <div class="form-group">
                    <label for="input_nik" class="form-label">Nomor Induk Kependudukan</label>
                    <input id="input_nik" class="form-control" name="nik" type="text" value="{{$data->nik}}" placeholder="Masukkan NIK ..." required />
                </div>

                <div class="form-group">
                    <label for="input_tpl" class="form-label">Tempat Lahir</label>
                    <input id="input_tpl" class="form-control" name="tpl" type="text" value="{{$data->tempat_lahir}}" placeholder="Masukkan tempat lahir ..." required />
                </div>

                <div class="form-group">
                    <label for="input_tgl" class="form-label">Tanggal Lahir</label>
                    <input id="input_tgl" class="form-control" name="tgl" type="date" value="{{$data->tanggal_lahir}}" placeholder="Masukkan tanggal lahir ..." required />
                </div>

                <div class="form-group">
                    <label for="input_jk" class="form-label">Jenis Kelamin</label>
                    <input id="input_jk" class="form-control" name="jk" type="text" value="{{$data->jenis_kelamin}}" placeholder="Masukkan jenis kelamin ..." required />
                </div>

                <div class="form-group">
                    <label for="input_negara" class="form-label">Negara</label>
                    <select id="input_negara" class="form-control" name="negara" placeholder="Masukkan nama program studi ..." required />
                    @foreach ($data_negara as $d_negara)
                    @if($data->id_ref_negara == $d_negara->id)
                    <option value="{{ $d_negara->id }}" selected>{{ $d_negara->nama }}</option>
                    @else
                    <option value="{{ $d_negara->id }}">{{ $d_negara->nama }}</option>
                    @endif
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="input_alamat" class="form-label">Alamat</label>
                    <input id="input_alamat" class="form-control" name="alamat" type="text" value="{{$data->alamat}}" placeholder="Masukkan alamat ..." required />
                </div>

                <div class="form-group">
                    <label for="input_tlp" class="form-label">Nomor Telepon</label>
                    <input id="input_tlp" class="form-control" name="tlp" type="text" value="{{$data->no_telepon}}" placeholder="Masukkan nomor telepon ..." required />
                </div>

                <div class="form-group">
                    <label for="input_pend" class="form-label">Pendidikan</label>
                    <select id="input_pend" class="form-control" name="pend" required>
                        @php
                        $list_kualifikasi = array(
                        'Pendidikan Dasar',
                        'Pendidikan Menengah',
                        'Sarjana (S1)',
                        'Magister (S2)',
                        'Doktor (S3)'
                        );
                        @endphp

                        @for($i=0; $i<count($list_kualifikasi); $i++) <option value="{{ $list_kualifikasi[$i] }}" {{ $list_kualifikasi[$i] == $data->kualifikasi_pendidikan ? 'selected' : ''}}>{{ $list_kualifikasi[$i] }}</option>
                            @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label for="input_prodi" class="form-label">Program Studi</label>
                    <select id="input_prodi" class="form-control" name="prodi" placeholder="Masukkan nama program studi ..." required />
                    @foreach ($data_prodi as $d_prodi)
                    <option value="{{ $d_prodi->id }}" {{ $d_prodi->id == $data->id_prodi ? 'selected' : '' }}>{{ $d_prodi->nama }}</option>
                    @endforeach
                    </select>

                </div>


                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="/asesi"><button class="btn btn-danger" type="button">Kembali</button></a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
