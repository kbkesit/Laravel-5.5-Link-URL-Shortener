@extends('layouts.master')

@section('title')
    Error 404
@endsection

@section('main-content')
    <div style="text-align: center;">
        <h1>Link tidak ditemukan...</h1>
        <h4><em>Cek kembali link URL tujuan Anda</em></h4>
        <img src="{{ URL::to('img/404.gif') }}" alt="404 not found" height="500"/>
    </div>
@endsection