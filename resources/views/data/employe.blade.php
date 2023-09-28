@extends('layouts.master')
@section('title', 'Data | Karyawan')

@section('main')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Data Karyawan</h2>
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
                                <th class="th-detail">Nama Karyawan</th>
                                <th class="th-detail">Tugas</th>
                                <th class="th-detail">Kontak</th>
                                <th class="th-detail">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employes as $employe)
                                <tr>
                                    <td>{{$employe->name}}</td>
                                    @switch($employe->task)
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
                                    <td>{{$employe->phone}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-aksi" data-toggle="modal" data-target="#edit-{{$employe->id}}"></button>
                                        <button type="button" class="btn btn-danger btn-aksi" onclick="deleteData('{{ $employe->id }}')"></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Karyawan -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle"><b>Tambah Karyawan</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('employe.store')}}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="name" required>
                                            <!-- <label class="label--desc">first name</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Tugas</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="task" required>
                                                    <option disabled="disabled" selected="selected" value="">Choose option</option>
                                                    <option value="0">Montir</option>
                                                    <option value="1">Operator</option>
                                                    <option value="2">Obras</option>
                                                    <option value="3">Finishing</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            <!-- <label class="label--desc">warna</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Telepon</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="phone" required>
                                            <!-- <label class="label--desc">first name</label> -->
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


    <!-- Modal Edit Karyawan -->
    @foreach ($employes as $employe)
    <div class="modal fade" id="edit-{{$employe->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle"><b>Edit Karyawan</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('employe.update', $employe->id)}}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="name" value="{{$employe->name}}" required>
                                            <!-- <label class="label--desc">first name</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Tugas</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="task" required>
                                                    <option disabled="disabled" selected="selected">Choose option</option>
                                                    <option value="0" {{ ($employe->task  == '0') ? 'selected' : '' }}>Montir</option>
                                                    <option value="1" {{ ($employe->task  == '1') ? 'selected' : '' }}>Operator</option>
                                                    <option value="2" {{ ($employe->task  == '2') ? 'selected' : '' }}>Obras</option>
                                                    <option value="3" {{ ($employe->task  == '3') ? 'selected' : '' }}>Finishing</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                            <!-- <label class="label--desc">warna</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Telepon</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="phone" value="{{$employe->phone}}" required>
                                            <!-- <label class="label--desc">first name</label> -->
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
        <link href="{{ asset('css/data/employe.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')

        <!-- Vendor JS-->
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
        <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>

        <!-- Form JS-->
        <script src="{{ asset('js/form.js') }}"></script>
        
        <!-- Main JS-->
        <script src="{{ asset('js/data/employe.js') }}"></script>
    @endpush

@endsection