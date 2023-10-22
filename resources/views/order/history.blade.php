@extends('layouts.master')
@section('title', 'Pre-Order | Detail')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">History PO</h2>
                </div>
                <div class="card-body">
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
                                    <td><button type="button" class="btn btn-primary btn-aksi" data-toggle="modal" data-target="#modal-{{$loop->index}}"></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach($customers as $customer)
    <!-- Modal Detail Tiap Pemesan -->
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
                                <th>Jumlah</th>
                                <th>Pesan</th>
                                <th>Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @if($customer->customer == $order->customer)
                                <tr>
                                    <td>{{$order->sock}}</td>
                                    <td>{{$order->color}}</td>
                                    <td>{{$order->size}}</td>
                                    <td class="amount">{{$order->amount}}</td>
                                    <td>{{\Carbon\Carbon::parse($order->date)->format('d M Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($order->updated_at)->format('d M Y')}}</td>
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

        <!-- Form CSS-->
        <link href="{{ asset('css/form.css') }}" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="{{ asset('css/order/history.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')
        
    <!-- Main JS-->
        <script src="{{ asset('js/order/history.js') }}"></script>
    @endpush

@endsection