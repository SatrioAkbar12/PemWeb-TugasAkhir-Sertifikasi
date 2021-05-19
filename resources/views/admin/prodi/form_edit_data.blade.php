@extends('admin.layouts.template')

@section('head_title', 'Program Studi')

@section('sidebar-prodi-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Program Studi</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/prodi/{{ $data->id }}/edit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="input_nama" class="form-label">Nama Program Studi</label>
                        <input id="input_nama" class="form-control" name="nama" type="text" value="{{ $data->nama }}" placeholder="Masukkan nama program studi ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_fakultas" class="form-label">Fakultas</label>
                        <select id="input_fakultas" class="form-control" name="fakultas">
                            @php
                                $list_fakultas = array(
                                   "Fakultas Ilmu Budaya",
                                   "Fakultas Hukum",
                                   "Fakultas Ilmu Sosial dan Ilmu Politik",
                                   "Fakultas Keguruan dan Ilmu Pendidikan",
                                   "Fakultas Ekonomi dan Bisnis",
                                   "Fakultas Teknik",
                                   "Fakultas Kedokteran",
                                   "Fakultas Pertanian",
                                   "Fakultas Matematika dan Ilmu Pengetahuan Alam",
                                   "Fakultas Seni Rupa dan Desain",
                                   "Fakultas Keolahragaan",
                                   "Pascasarjana",
                                   "Sekolah Vokasi"
                                );
                            @endphp
                            @for($i = 0; $i < count($list_fakultas); $i++)
                                <option value="{{ $list_fakultas[$i] }}" {{ $list_fakultas[$i] == $data->fakultas ? 'selected' : ''}}>{{ $list_fakultas[$i] }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/admin/prodi"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
