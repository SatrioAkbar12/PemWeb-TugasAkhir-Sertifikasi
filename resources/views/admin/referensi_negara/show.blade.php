@extends('admin.layouts.template')

@section('head_title', 'Referensi Negara')

@section('nama')
    {{ Auth::user()->nama }}
@endsection

@section('role')
    {{ Auth::user()->role }}
@endsection

@section('sidebar-negara-active', 'active')

@section('content')

@endsection
