@extends('asesi.layout.template')

@section('head_title', 'Asesi')

@section('sidebar-dashboard-active', 'active')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Selamat Datang, {{ Auth::user()->username }}</h1>
                </div>
            </div>
    </section>

    <!-- <section class="flat-row">
    <div class="container">
    <div id="w1" class="list-view"><div data-key="9012">
    <div class="col-md-6 col-sm-12" style="min-height: 300px">
    <div class="content-pad">
        <div class="thumbnail-overflow">
            <div class="comment-block main-color-1-bg dark-div">
            </div>
        </div><!--/thumbnail-overflow
        <div class="item-content" style="padding-left: 10px;padding-right: 50px;">
            <h3 class="title"><a href="#" class="main-color-1-hover">Daftar Sertifikasi</a></h3>
            <div class="item-excerpt blog-item-excerpt">
                <p>Telah dibuka pendaftaran sertifikasi<br>Klik <b>Daftar sekarang</b> untuk mendaftar</p>
            </div>
            <a class="button" href="#">Daftar Sekarang <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    </div></div>
    </section> -->
@endsection