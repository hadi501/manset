@extends('layouts.master')
@section('title', 'ManSet | Home')

@section('main')
<div class="row justify-content-center">
    <div class="col col-home">
        <div class="text-center">
            <p class="judul">Manajemen Aset</p>
            <button class="btn btn-secondary mulai">Mulai!</button>
        </div>

    </div>
</div>

@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@endsection