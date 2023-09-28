@extends('layouts.master')
@section('title', 'Pre-Order | Detail')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Detail Produksi</h2>
                </div>
                <div class="card-body">
                    <!-- <table class="table-ket">
                        <tr>
                            <th>Tanggal</th>
                            <td>: </td>
                        </tr>
                        <tr>
                            <th>Pagi</th>
                            <td> : {{$productions->where('shift', '0')->sum('amount')/12}} dz |
                                -
                            </td>
                        </tr>
                        <tr>
                            <th>Siang</th>
                            <td> : {{$productions->where('shift', '1')->sum('amount')/12}} dz |
                                -
                            </td>
                        </tr>
                        <tr>
                            <th>Malam</th>
                            <td> : {{$productions->where('shift', '2')->sum('amount')/12}} dz |
                                - 
                            </td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>
                                : {{$productions->sum('amount')/12}} dz
                            </td>
                        </tr>
                    </table> -->
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th hidden>#</th>
                                <th class="w-15">Tanggal</th>
                                <th class="w-10">Shift</th>
                                <th class="w-15">Karyawan</th>
                                <th class="w-10">No Mesin</th>
                                <th class="w-15">Pemesan</th>
                                <th class="w-15">Kaos Kaki</th>
                                <th class="w-10">Jumlah</th>
                                <th class="w-10">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productions as $production)
                            <tr>
                                <td hidden>{{$loop->index}}</td>
                                <td>{{\Carbon\Carbon::parse($production->date)->format('d M Y')}}</td>
                                @switch($production->shift)
                                    @case(0)
                                        <td>Pagi</td>
                                        @break
                                    @case(1)
                                        <td>Siang</td>
                                        @break
                                    @case(2)
                                        <td>Malam</td>
                                        @break
                                    @default
                                        <td>Something went wrong, please try again</td>
                                @endswitch
                                <td>{{$production->employe->name}}</td>
                                <td>{{$production->machine_no}}</td>
                                <td data-toggle="popover" title="{{$production->order->sock}}" data-content="Warna: {{$production->order->color}} <br /> Ukuran: {{$production->order->size}} <br /> Pesanan: {{$production->order->amount/12}} dz" data-html="true">{{$production->order->customer}}</td>
                                <td>{{$production->order->sock}}</td>
                                <td class="amount">{{$production->amount}}</td>
                                <td>
                                    <a href="{{ route('production.edit', $production->id) }}">
                                        <button type="button" class="btn btn-warning btn-aksi" data-toggle="modal" data-target="#exampleModalCenter"></button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('styles')

        <!-- Form CSS-->
        <link href="{{ asset('css/form.css') }}" rel="stylesheet" media="all">
        
        <!-- Main CSS-->
        <link href="{{ asset('css/production/detail.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')
        <!-- Main JS-->
        <script src="{{ asset('js/production/detail.js') }}"></script>
    @endpush

@endsection