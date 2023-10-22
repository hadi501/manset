@extends('layouts.master')
@section('title', 'Finishing | Home')

@section('main')
<div class="row justify-content-center">
    <div class="col col-home">
        <div class="text-center">
            <p class="judul">Finishing</p>
            <button class="btn btn-secondary mulai">Mulai!</button>
        </div>
    </div>
</div>

@push('styles')
    <link href="{{ asset('css/finishing/index.css') }}" rel="stylesheet">
@endpush

@endsection