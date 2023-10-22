@extends('layouts.master')
@section('title', 'Production | Home')

@section('main')
<div class="row justify-content-center">
    <div class="col col-home">
        <div class="text-center">
            <p class="judul">Production</p>
            <button class="btn btn-secondary mulai">Mulai!</button>
        </div>
    </div>
</div>

@push('styles')
    <link href="{{ asset('css/production/index.css') }}" rel="stylesheet">
@endpush

@endsection