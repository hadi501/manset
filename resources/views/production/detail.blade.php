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
                    <table class="table-ket">
                        <tr>
                            <th>Tanggal</th>
                            <td>: 2023-09-01</td>
                        </tr>
                        <tr>
                            <th>Pagi</th>
                            <td>: Fulanah</td>
                        </tr>
                        <tr>
                            <th>Siang</th>
                            <td>: Fulanah</td>
                        </tr>
                        <tr>
                            <th>Malam</th>
                            <td>: Fulanah</td>
                        </tr>
                    </table>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="th-shift">Shift</th>
                                <th class="th-no">No Mesin</th>
                                <th class="th-detail">Pemesan</th>
                                <th class="th-detail">Kaos Kaki</th>
                                <th class="th-detail">Jumlah</th>
                                <th class="th-detail">Jam</th>
                                <th class="th-aksi">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pagi</td>
                                <td>1</td>
                                <td data-toggle="popover" title="Sport" data-content="Warna: Biru | Ukuran: 30x25 | Pesanan: 10dz">Abdullah</td>
                                <td>Sport</td>
                                <td>4dz</td>
                                <td>07:30 07:57 08:32 08:59</td>
                                <td>
                                    <a href="{{ route('production.edit', 1) }}">
                                        <button type="button" class="btn btn-warning btn-aksi" data-toggle="modal" data-target="#exampleModalCenter"></button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Siang</td>
                                <td>1</td>
                                <td data-toggle="popover" title="Jempol Polos" data-content="Warna: Hitam | Ukuran: 30 | Pesanan: 15dz">Ibadullah</td>
                                <td>Jempol Polos</td>
                                <td>5dz</td>
                                <td>09:30 09:57 10:32 10:59 11:40 09:30 09:57 10:32 10:59 11:40</td>
                                <td>
                                    <a href="{{ route('production.edit', 1) }}">
                                        <button type="button" class="btn btn-warning btn-aksi" data-toggle="modal" data-target="#exampleModalCenter"></button>
                                    </a>
                                </td>
                            </tr>
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