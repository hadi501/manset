@extends('layouts.master')
@section('title', 'Pre-Order | History')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">History Produksi</h2>
                </div>
                <div class="card-body">
                    <table id="myTable" class="display" width="100%">
                        <thead>
                            <tr>
                                <th hidden>#</th>
                                <th>Tanggal</th>
                                <th>Shift</th>
                                <th>Jumlah</th>
                                <th>Karyawan</th>
                                <th>No Mesin</th>
                                <th>Pemesan</th>
                                <th>Kaos Kaki</th>
                                <th>Warna</th>
                                <th>Ukuran</th>
                                <!-- <th class="w-10">Edit</th> -->
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
                                <td class="amount">{{$production->amount}}</td>
                                <td>{{$production->employe->name}}</td>
                                <td>{{$production->machine_no}}</td>
                                <td data-toggle="popover" title="{{$production->order->sock}}" data-content="Warna: {{$production->order->color}} <br /> Ukuran: {{$production->order->size}} <br /> Pesanan: {{$production->order->amount/12}} dz" data-html="true">{{$production->order->customer}}</td>
                                <td>{{$production->order->sock}}</td>
                                <td>{{$production->order->color}}</td>
                                <td>{{$production->order->size}}</td>
                                <!-- <td>
                                    <a href="{{ route('production.edit', $production->id) }}">
                                        <button type="button" class="btn btn-warning btn-aksi" data-toggle="modal" data-target="#exampleModalCenter"></button>
                                    </a>
                                </td> -->
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