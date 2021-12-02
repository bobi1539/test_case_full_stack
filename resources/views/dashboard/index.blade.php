@extends('layouts.dashboard')

@section('container-dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    @if (session()->has('messageSuccess'))
        <div id="flash-data-success" data-flashdata="{{ session('messageSuccess') }}"></div>
    @endif
@endsection
