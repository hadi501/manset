@extends('layouts.master')
@section('title', 'Produksi | Detail')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-body">
                    <form action="{{ route('production.detail') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-row">
                            <div class="name">Pilih Tanggal</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="date" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <!-- <a href=""> -->
                                        <button type="submit" class="btn btn--radius-2 btn--red btn-input-order">Input</button>
                                    <!-- </a> -->
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
        
        <link href="{{ asset('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

        <!-- Form CSS-->
        <link href="{{ asset('css/form.css') }}" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="{{ asset('css/production/getdetail.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')
        <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>
        
        <!-- Main JS-->
    
    @endpush

@endsection