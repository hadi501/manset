@extends('layouts.master')
@section('title', 'Produksi | Edit')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Edit Produksi</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('production.update', $production->id)}}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                        <div class="form-row m-b-55">
                            <div class="name">Pemesan</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-12">
                                        <div class="input-group-desc" hidden>
                                            <input class="input--style-5" type="number" name="id" value="{{ $production->id }}" required>
                                            <!-- <label class="label--desc">first name</label> -->
                                        </div>
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="name" value="{{$production->order->customer}}" readonly>
                                            <!-- <label class="label--desc">first name</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Pesanan</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="sock" value="{{$production->order->sock}}" readonly>
                                            <label class="label--desc">Kaos Kaki</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="color" value="{{$production->order->color}}" readonly>
                                            <label class="label--desc">warna</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No Mesin</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="machine_no" value="{{$production->machine_no}}" readonly>
                                            <!-- <label class="label--desc">Dimensi 1</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Jumlah</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="amount" value="{{$production->amount}}" required>
                                            <!-- <label class="label--desc">Dimensi 1</label> -->
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="unit" required>
                                                    <option disabled="disabled" selected="selected" value="">Choose option</option>
                                                    <option value="0" {{ ($production->unit  == '0') ? 'selected' : '' }}>Lusin</option>
                                                    <option value="1" {{ ($production->unit  == '1') ? 'selected' : '' }}>Pasang</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            <!-- <label class="label--desc">warna</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-row">
                            <div class="name">Jam</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="time" value="{{$production->time}}" required>
                                </div>
                            </div>
                        </div> -->
                        <div>
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <button class="btn btn--radius-2 btn--red btn-input-order" type="submit">Input</button>
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
        <!-- Icons font CSS-->
        <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

        <!-- Form CSS-->
        <link href="{{ asset('css/form.css') }}" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="{{ asset('css/production/edit.css') }}" rel="stylesheet" media="all">

    @endpush

    @push('scripts')
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <!-- Vendor JS-->
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>

        <!-- Form JS-->
        <script src="{{ asset('js/form.js') }}"></script>

        <!-- Main JS-->
        <script src="{{ asset('js/production/edit.js') }}"></script>
    @endpush

@endsection