@extends('admin.layouts.template')

@section('head_title', 'Kelola Admin')

@section('sidebar-admin-active', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <form method="post" action="/admin/kelola/edit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="input_username" class="form-label">Username</label>
                        <input id="input_username" class="form-control" name="username" type="text" value="{{ $data->username }}" placeholder="Username ..." />
                    </div>
                    <div class="form-group">
                        <label for="input_email" class="form-label">Email</label>
                        <input id="input_email" class="form-control" name="email" type="email" value="{{ $data->email }}" placeholder="Email ..." />
                    </div>
                    <div class="form-group">
                        <label for="input_password" class="form-label">Password</label>
                        <input id="input_password" class="form-control" name="password" type="password" value="{{ $data->password }}" placeholder="Password ..." />
                    </div>
                    <div class="form-group">
                        <label for="input_ulangpassword" class="form-label">Ulangi Password</label>
                        <input id="input_ulangpassword" class="form-control" name="password_confirmation" type="password" value="{{ $data->password }}" placeholder="Masukkan ulang password ..." />
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
