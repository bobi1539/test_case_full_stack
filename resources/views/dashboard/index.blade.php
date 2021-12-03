@extends('layouts.dashboard')

@section('container-dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card card-body">
                <h5 class="text-center">Jumlah Produk</h5>
                <h3 class="text-center fw-bold">{{ $totalProduct }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body">
                <h5 class="text-center">Jumlah Kategori</h5>
                <h3 class="text-center fw-bold">{{ $totalCategory }}</h3>
            </div>
        </div>
    </div>
    @if (session()->has('messageSuccess'))
        <div id="flash-data-success" data-flashdata="{{ session('messageSuccess') }}"></div>
    @endif
@endsection
