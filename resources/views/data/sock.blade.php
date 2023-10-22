@extends('layouts.master')
@section('title', 'Data | Kaos Kaki')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Data Kaos Kaki</h2>
                </div>
                <div class="card-body">
                    <div class="form-row m-b-30">
                        <div class="col">
                            <button type="button" class="btn btn--radius-2 btn--green btn-add-employe" data-toggle="modal" data-target="#add">Tambah</button>
                        </div>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="th-detail">Kaos Kaki</th>
                                <th class="th-detail">Dimensi</th>
                                <th class="th-detail">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($socks as $sock)
                                <tr>
                                    <td>{{$sock->sock}}</td>
                                    @switch($sock->dimension)
                                        @case(0)
                                            <td>1 Dimensi</td>
                                            @break
                                        @case(1)
                                            <td>2 DImensi</td>
                                            @break
                                        @default
                                            <td>Something went wrong, please try again</td>
                                    @endswitch
                                    <td>
                                        <button type="button" class="btn btn-warning btn-aksi" data-toggle="modal" data-target="#edit-{{$sock->id}}"></button>
                                        <button type="button" class="btn btn-danger btn-aksi" onclick="deleteData('{{ $sock->id }}')"></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kaos Kaki -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle"><b>Tambah Kaos Kaki</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('sock.store')}}" method="POST">
                    {{csrf_field()}}
                        <div class="form-row m-b-10">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="sock" required>
                                            <!-- <label class="label--desc">first name</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-20">
                            <div class="name">Dimensi</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="dimension" required>
                                                    <option disabled="disabled" selected="selected" value="">Choose option</option>
                                                    <option value="0">1 Dimensi</option>
                                                    <option value="1">2 Dimensi</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            <!-- <label class="label--desc">warna</label> -->
                                        </div>
                                    </div>
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

    <!-- Modal Edit Kaos Kaki -->
    @foreach ($socks as $sock)
    <div class="modal fade" id="edit-{{$sock->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle"><b>Edit Kaos Kaki</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('sock.update', $sock->id)}}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="sock" value="{{$sock->sock}}" required>
                                            <!-- <label class="label--desc">first name</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Dimensi</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="dimension" required>
                                                    <option disabled="disabled" selected="selected">Choose option</option>
                                                    <option value="0" {{ ($sock->dimension  == '0') ? 'selected' : '' }}>1 Dimensi</option>
                                                    <option value="1" {{ ($sock->dimension  == '1') ? 'selected' : '' }}>2 Dimensi</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            <!-- <label class="label--desc">warna</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="row">
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
                            </div>
                        </div>
                    </form>
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
        <link href="{{ asset('css/data/sock.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')

        <!-- Vendor JS-->
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>

        <!-- Form JS-->
        <script src="{{ asset('js/form.js') }}"></script>
        
        <!-- Main JS-->
        <script src="{{ asset('js/data/sock.js') }}"></script>
    @endpush

@endsection