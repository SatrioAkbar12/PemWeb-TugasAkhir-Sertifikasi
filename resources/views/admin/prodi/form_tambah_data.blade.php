@extends('admin.layouts.template')

@section('head_title', 'Referensi Negara')

@section('sidebar-prodi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Program Studi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/prodi/tambah">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_nama" class="form-label">Nama Program Studi</label>
                        <input id="input_nama" class="form-control" name="nama" type="text" placeholder="Masukkan nama program studi ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_fakultas" class="form-label">Fakultas</label>
                        <select id="input_fakultas" class="form-control" name="fakultas">
                            <option disabled selected>Pilih Fakultas ...</option>
                            <option value="Fakultas Ilmu Budaya">Fakultas Ilmu Budaya</option>
                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                            <option value="Fakultas Ilmu Sosial dan Ilmu Politik">Fakultas Ilmu Sosial dan Ilmu Politik</option>
                            <option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu Pendidikan</option>
                            <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                            <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                            <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                            <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                            <option value="Fakultas Seni Rupa dan Desain">Fakultas Seni Rupa dan Desain</option>
                            <option value="Fakultas Keolahragaan">Fakultas Keolahragaan</option>
                            <option value="Pascasarjana">Pascasarjana</option>
                            <option value="Sekolah Vokasi">Sekolah Vokasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <a href="/admin/prodi"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
