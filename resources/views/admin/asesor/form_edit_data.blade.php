@extends('admin.layouts.template')

@section('head_title', 'Kelola Asesor')

@section('sidebar-asesor-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Asesor</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/kelola-asesor/{{ $data_asesor->id }}/edit">
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_user" value="{{ $data_asesor->id_user }}">
                    <div class="form-group">
                        <label for="input_username" class="form-label">Username</label>
                        <input id="input_username" class="form-control" name="username" type="text" value="{{ $data_user->username }}" placeholder="Username ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_email" class="form-label">Email</label>
                        <input id="input_email" class="form-control" name="email" type="email" value="{{ $data_user->email }}" placeholder="Email ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_nama" class="form-label">Nama Lengkap</label>
                        <input id="input_nama" class="form-control" name="nama" type="text" value="{{ $data_asesor->nama }}" placeholder="Masukkan nama lengkap ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_nim" class="form-label">NIP</label>
                        <input id="input_nim" class="form-control" name="nip" type="text" value="{{ $data_asesor->nip }}" placeholder="Masukkan NIM ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                        <input id="input_nik" class="form-control" name="nik" type="text" value="{{ $data_asesor->nik }}" placeholder="Masukkan NIK ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_tempatlahir" class="form-label">Tempat Lahir</label>
                        <input id="input_tempatlahir" class="form-control" name="tempatlahir" type="text" value="{{ $data_asesor->tempat_lahir }}" placeholder="Masukkan tempat lahir ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_tanggallahir" class="form-label">Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <input id="input_tanggallahir" class="form-control" name="tanggallahir" type="date" value="{{ $data_asesor->tanggal_lahir }}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_jeniskelamin" class="form-label">Jenis Kelamin</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="input_jeniskelamin" class="form-control" name="jeniskelamin" required>
                                    @if ($data_asesor->jenis_kelamin == 'Laki-laki')
                                        <option value="Laki-Laki" selected>Laki-laki</option>
                                    @else
                                        <option value="Laki-Laki">Laki-laki</option>
                                    @endif
                                    @if ($data_asesor->jenis_kelamin == 'Perempuan')
                                        <option value="Perempuan" selected>Perempuan</option>
                                    @else
                                        <option value="Perempuan">Perempuan</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label form="input_refnegara" class="form-label">Negara</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="input_refnegara" class="form-control" name="ref_negara" required>
                                    @foreach ($data_refnegara as $d_negara)
                                        @if($data_asesor->id_ref_negara == $d_negara->id)
                                            <option value="{{ $d_negara->id }}" selected>{{ $d_negara->nama }}</option>
                                        @else
                                            <option value="{{ $d_negara->id }}">{{ $d_negara->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_alamat" class="form-label">Alamat</label>
                        <textarea id="input_alamat" class="form-control" name="alamat" placeholder="Masukkan alamat ..." required>{{ $data_asesor->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_notelepon" class="form-label">Nomor Telepon</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <input id="input_notelepon" class="form-control" name="no_telepon" type="number" value="{{ $data_asesor->no_telepon }}" placeholder="Masukkan nomor telepon ..." required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_kualifikasipendidikan" class="form-label">Kualifikasi Pendidikan</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="input_kualifikasipendidikan" class="form-control" name="kualifikasi_pendidikan" required>
                                    @php
                                        $list_kualifikasi = array(
                                            'Pendidikan Dasar',
                                            'Pendidikan Menengah',
                                            'Sarjana (S1)',
                                            'Magister (S2)',
                                            'Doktor (S3)'
                                        );
                                    @endphp

                                    @for($i=0; $i<count($list_kualifikasi); $i++)
                                        <option value="{{ $list_kualifikasi[$i] }}" {{ $list_kualifikasi[$i] == $data_asesor->kualifikasi_pendidikan ? 'selected' : ''}}>{{ $list_kualifikasi[$i] }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label form="input_prodi" class="form-label">Program Studi</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="input_prodi" class="form-control" name="prodi">
                                    @foreach ($data_prodi as $d_prodi)
                                        <option value="{{ $d_prodi->id }}" {{ $d_prodi->id == $data_asesor->id_prodi ? 'selected' : '' }}>{{ $d_prodi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="/admin/kelola-asesor"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
