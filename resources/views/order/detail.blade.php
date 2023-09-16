@extends('layouts.master')
@section('title', 'Pre-Order | Detail')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Detail PO</h2>
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
                                    <td>{{$customer->amount}}</td>
                                    <td><button type="button" class="btn btn-primary btn-aksi" data-toggle="modal" data-target="#modal-{{$customer->customer}}"></button></td>
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
    <div class="modal fade" id="modal-{{$customer->customer}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>{{$customer->customer}}</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="table-detail" class="detail-table" class="display">
                        <thead>
                            <tr>
                                <th>Kaos Kaki</th>
                                <th>Warna</th>
                                <th>Ukuran</th>
                                <th>Jumlah</th>
                                <th>Produksi</th>
                                <th>Deadline</th>
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
                                <td>{{$order->amount}}</td>
                                <td>0</td>
                                <td>{{$order->deadline}}</td>
                                <td>
                                    <a href="#" onclick="finishOrder('{{ $order->id }}')">
                                        <button type="button" class="btn btn-success btn-aksi"></button>
                                    </a>
                                    <a href="{{ route('order.edit', $order->id) }}">
                                        <button type="button" class="btn btn-warning btn-aksi"></button>
                                    </a>
                                    <a href="#" onclick="deleteData('{{ $order->id }}')">
                                        <button type="button" class="btn btn-danger btn-aksi"></button>
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

    {{-- form delete hidden --}}
    <form action="" method="POST" id="form-delete">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    {{-- form finish hidden --}}
    <form action="" method="POST" id="form-finish">
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="id-finish" name="id">
    </form>

    @push('styles')

        <!-- Form CSS-->
        <link href="{{ asset('css/form.css') }}" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="{{ asset('css/order/detail.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')
        
        <!-- Main JS-->
        <script src="{{ asset('js/order/detail.js') }}"></script>
    @endpush

@endsection