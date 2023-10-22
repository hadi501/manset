@extends('layouts.master')
@section('title', 'Finishing | Detail')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Detail Finishing</h2>
                </div>
                <div class="card-body">
                    <!-- <table class="table-ket">
                        <tr>
                            <th>Tanggal</th>
                            <td>: -</td>
                        </tr>
                    </table> -->
                    <table id="myTable" class="display" width="100%">
                        <thead>
                            <tr>
                                <th hidden>#</th>
                                <th class="w-12-5">Tanggal</th>
                                <th class="w-12-5">Tugas</th>
                                <th class="w-12-5">Karyawan</th>
                                <th class="w-12-5">Pemesan</th>
                                <th class="w-12-5">Kaos Kaki</th>
                                <th class="w-12-5">Warna</th>
                                <th class="w-12-5">Jumlah</th>
                                <th class="w-12-5">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finishing as $finish)
                            <tr>
                                <td hidden>{{ $loop->index }}</td>
                                
                                <td>{{\Carbon\Carbon::parse($finish->date)->format('d M Y')}}</td>
                                @switch($finish->employe->task)
                                    @case(0)
                                        <td>Montir</td>
                                        @break
                                    @case(1)
                                        <td>Operator</td>
                                        @break
                                    @case(2)
                                        <td>Obras</td>
                                        @break
                                    @case(3)
                                        <td>Finishing</td>
                                        @break
                                    @default
                                        <td>Something went wrong, please try again</td>
                                @endswitch
                                <td>{{$finish->employe->name}}</td>
                                <td data-toggle="popover" title="Jempol Polos" data-content="Warna: {{$finish->order->color}} <br /> Ukuran: {{$finish->order->size}} <br /> Pesanan: {{$finish->order->amount/12}} dz" data-html="true">{{$finish->order->customer}}</td>
                                <td>{{$finish->order->sock}}</td>
                                <td>{{$finish->order->color}}</td>
                                <td class="amount">{{$finish->amount}}</td>
                                <td>
                                    <a href="{{ route('finishing.edit', $finish->id) }}">
                                        <button type="button" class="btn btn-warning btn-aksi"></button>
                                    </a>
                                    <a href="#" onclick="deleteData('{{ $finish->id }}')">
                                        <button type="button" class="btn btn-danger btn-aksi"></button>
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

    {{-- form delete hidden --}}
    <form action="" method="POST" id="form-delete">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    @push('styles')

        <!-- Form CSS-->
        <link href="{{ asset('css/form.css') }}" rel="stylesheet" media="all">
        
        <!-- Main CSS-->
        <link href="{{ asset('css/finishing/detail.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')
        <!-- Main JS-->
        <script src="{{ asset('js/finishing/detail.js') }}"></script>
    @endpush

@endsection