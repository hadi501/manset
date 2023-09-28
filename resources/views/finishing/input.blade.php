@extends('layouts.master')
@section('title', 'Finishing | Input')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Input Finishing</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('finishing.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="date" name="date" id="date" required>
                                            <!-- <label class="label--desc">ID PO</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Karyawan</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="employe_id" required>
                                                    <option disabled="disabled" selected="selected" value="">Choose option</option>
                                                    @foreach($employes as $employe)    
                                                        <option value="{{$employe->id}}">{{$employe->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            <!-- <label class="label--desc">Karyawan</label> -->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="order_id" id="order_id" required>
                                            <label class="label--desc">ID PO</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="amount" required>
                                            <label class="label--desc">Jumlah</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="unit" required>
                                                    <option disabled="disabled" selected="selected" value="">Unit</option>
                                                    <option value="0">Lusin</option>
                                                    <option value="1">Pasang</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            <label class="label--desc">Unit</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-30">
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                                <button class="btn btn--radius-2 btn--red btn-input-order" type="submit">Input</button>
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </form>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="th-detail">Pemesan</th>
                            <th class="th-detail">Jumlah Pesanan</th>
                                <th class="th-detail">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)    
                            <tr>
                                <td>{{$customer->customer}}</td>
                                <td class="amount">{{$customer->amount}}</td>
                                <td><button type="button" class="btn btn-primary btn-aksi" data-toggle="modal" data-target="#modal-{{ $loop->index }}"></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>

    <!-- Modal Detail Tiap Pemesan -->
    @foreach($customers as $customer)
    {{$index = $loop->index}}
    <div class="modal fade" id="modal-{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>{{$customer->customer}}</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table-detail">
                        <thead>
                            <tr>
                                <th>Kaos Kaki</th>
                                <th>Warna</th>
                                <th>Ukuran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            @if($customer->customer == $order->customer)
                            <tr>
                                <td>{{$order->sock}}</td>
                                <td>{{$order->color}}</td>
                                <td>{{$order->size}}</td>
                                <td>
                                    <a href="#">
                                        <button type="button" class="btn btn-info btn-aksi" onclick="getId('{{ $order->id }}','modal-{{$index}}')"></button>
                                    </a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @push('styles')
        <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
        
        <!-- Form CSS-->
        <link href="{{ asset('css/form.css') }}" rel="stylesheet" media="all">
        
        <!-- Main CSS-->
        <link href="{{ asset('css/finishing/input.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>
        
        <!-- Form JS-->
        <script src="{{ asset('js/form.js') }}"></script>

        <!-- Main JS-->
        <script src="{{ asset('js/finishing/input.js') }}"></script>
    @endpush

@endsection