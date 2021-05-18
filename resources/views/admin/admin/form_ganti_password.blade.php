@extends('admin.layouts.template')

@section('head_title', 'Kelola Admin')

@section('sidebar-admin-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ganti Password</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-4">
                <form method="post" action="/admin/kelola-admin/edit/ganti-password">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="input_password" class="form-label">Password Baru</label>
                        <input id="input_password" class="form-control" name="password" type="password" placeholder="Password yang baru ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_password_confirmation" class="form-label">Ulangi Password Baru</label>
                        <input id="input_password_confirmation" class="form-control" name="password_confirmation" type="password" placeholder="Ulangi password yang baru ..." required/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/admin/kelola-admin"><button class="btn btn-danger" type="button">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
