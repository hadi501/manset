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
                    <table class="table-ket">
                        <tr>
                            <th>Tanggal</th>
                            <td>: 2023-09-01</td>
                        </tr>
                    </table>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="th-detail">Karyawan</th>
                                <th class="th-detail">Pemesan</th>
                                <th class="th-detail">Kaos Kaki</th>
                                <th class="th-detail">Jumlah</th>
                                <th class="th-detail">Tugas</th>
                                <th class="th-aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Fulan</td>
                                <td data-toggle="popover" title="Jempol Polos" data-content="Warna: Biru | Ukuran: 27 | Pesanan: 15dz">Abdul</td>
                                <td>Jempol Polos</td>
                                <td>4dz</td>
                                <td>Obras</td>
                                <td>
                                    <a href="{{ route('finishing.edit', 1) }}">
                                        <button type="button" class="btn btn-warning btn-aksi"></button>
                                    </a>
                                    <a href="#">
                                        <button type="button" class="btn btn-danger btn-aksi"></button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Fulanah</td>
                                <td data-toggle="popover" title="Jempol Polos" data-content="Warna: Maroon | Ukuran: 30 | Pesanan: 10dz">Ibadullah</td>
                                <td>Jempol Polos</td>
                                <td>5dz</td>
                                <td>Finishing</td>
                                <td>
                                    <a href="{{ route('finishing.edit', 1) }}">
                                        <button type="button" class="btn btn-warning btn-aksi"></button>
                                    </a>
                                    <a href="#">
                                        <button type="button" class="btn btn-danger btn-aksi"></button>
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
        <link href="{{ asset('css/finishing/detail.css') }}" rel="stylesheet" media="all">
    @endpush

    @push('scripts')
        <!-- Main JS-->
        <script src="{{ asset('js/finishing/detail.js') }}"></script>
    @endpush

@endsection