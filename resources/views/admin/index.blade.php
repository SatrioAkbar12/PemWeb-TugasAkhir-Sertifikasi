@extends('admin.layouts.template')

@section('head_title', 'Admin Dashboard')

@section('sidebar-dashboard-active', 'active')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Selamat Datang, {{ $nama }}</h1>
                </div>
            </div>
    </section>
@endsection
