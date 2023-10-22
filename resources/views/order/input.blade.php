@extends('layouts.master')
@section('title', 'Pre-Order | Input')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Input PO</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('order.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-row m-b-20">
                            <div class="name">Pemesan</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-9">
                                        <div class="input-group-desc" id="customerInput">
                                            <div class="rs-select2 js-select-simple select--no-search customer0">
                                                <select class="select-customer" name="customer" required>
                                                    <option disabled="disabled" selected="selected" value="">Choose option</option>
                                                    @foreach($customers as $customer)
                                                        <option>{{$customer->customer}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            <input class="input--style-5 customer1" type="text" name="customer" disabled hidden>
                                        </div>
                                    </div>
                                    <div class="col-3 h-25 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-change btn-danger disable" onclick="ubahForm()"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-20">
                            <div class="name">Pesanan</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="sock" required>
                                            <label class="label--desc">Kaos Kaki</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="color" required>
                                            <label class="label--desc">warna</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-20">
                            <div class="name">Ukuran</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="size1" required>
                                            <label class="label--desc">Dimensi 1</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="size2">
                                            <label class="label--desc">Dimensi 2</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-20">
                            <div class="name">Jumlah</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="amount" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="unit" required>
                                                    <option disabled="disabled" selected="selected" value="">Choose option</option>
                                                    <option value="0">Lusin</option>
                                                    <option value="1">Pasang</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-20">
                            <div class="name">Tanggal Pesan</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="date" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-30">
                            <div class="name">Deadline</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="deadline" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <button class="btn btn--radius-2 btn--red btn-input-order" type="submit">Input</button>
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
        <link href="{{ asset('css/order/input.css') }}" rel="stylesheet" media="all">

    @endpush

    @push('scripts')
        
        <!-- Vendor JS-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>

        <!-- Form JS-->
        <script src="{{ asset('js/form.js') }}"></script>

        <!-- Main JS-->
        <script src="{{ asset('js/order/input.js') }}"></script>
    @endpush

@endsection