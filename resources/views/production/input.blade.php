@extends('layouts.master')
@section('title', 'Produksi | Input')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Input Produksi</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('production.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-row m-b-20">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="date" name="date" placeholder="hari" required>
                                            <!-- <label class="label--desc">Dimensi 1</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-20">
                            <div class="name">Shift</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="shift" required>
                                                    <option disabled="disabled" selected="selected" value="">Choose option</option>
                                                        <option value="0">Pagi</option>
                                                        <option value="1">Siang</option>
                                                        <option value="2">Malam</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            <!-- <label class="label--desc">Shift</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-20">
                            <!-- <div class="value"> -->
                            <div class="col-6">
                                <div class="input-group-desc">
                                    <label class="label--desc">Operator</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="employe_id" required>
                                            <option disabled="disabled" selected="selected" value="">Choose option</option>
                                            @foreach($operators as $operator)
                                            <option value="{{$operator->id}}">{{$operator->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group-desc">
                                    <label class="label--desc">Mesin</label>
                                    <input class="input--style-5" type="number" name="machine_no" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group-desc">
                                    <label class="label--desc">ID PO</label>
                                    <input class="input--style-5" type="number" name="order_id" id="order_id" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group-desc">
                                    <label class="label--desc">Jumlah</label>
                                    <input class="input--style-5" type="number" name="amount" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group-desc">
                                    <label class="label--desc">Unit</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="unit" required>
                                            <option disabled="disabled" selected="selected" value="">Unit</option>
                                            <option value="0">Lusin</option>
                                            <option value="1">Pasang</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                        </div>
                        <div class="form-row m-b-30">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn--radius-2 btn--red btn-input-order" type="submit">Input</button>
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
                                    <td>
                                        <button type="button" class="btn btn-primary btn-aksi" data-toggle="modal" data-target="#modal-{{$loop->index}}"></button>
                                    </td>
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
    <div class="modal fade" id="modal-{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>{{$customer->customer}}</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table-detail display nowrap responsive" style="width:100%">
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
        <link href="{{ asset('css/production/input.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>
        
        <!-- Form JS-->
        <script src="{{ asset('js/form.js') }}"></script>

        <!-- Main JS-->
        <script src="{{ asset('js/production/input.js') }}"></script>
    @endpush

@endsection