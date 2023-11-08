@extends('layouts.master')
@section('title', 'Pre-Order | Home')

@section('main')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header"><h4>Progress</h4></div>
                    <div class="card-body">
                        <h1 class="card-title">1546 Dz</h1>
                        <h3 class="card-text"><span class="icon-person mr-3"></span>5</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header"><h4>Done</h4></div>
                    <div class="card-body">
                        <h1 class="card-title">34780 Dz</h1>
                        <h3 class="card-text"><span class="icon-person mr-3"></span>74</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <canvas id="myChart"></canvas>
            </div>
        </div>

    </div>

@push('styles')
    <!-- Main CSS-->
    <link href="{{ asset('css/order/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')
        
    <!-- Main JS-->
    <script src="{{ asset('js/order/index.js') }}"></script>
@endpush

@endsection