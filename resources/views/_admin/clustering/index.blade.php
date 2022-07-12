@extends('_admin._layouts.app')
@section('title', 'Clustering')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Clustering
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Clustering</li>
        @endslot

        @slot('cardTitle')
            Clustering Produk
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <div class="row mb-2">
                <div class="col">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-success float-right"> Generate K-Means</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <x-_admin.datatables>
                        @slot('columns')
                            <th>Produk</th>
                            <th>Total Transaksi</th>
                            <th>Total Penjualan</th>
                        @endslot
                    </x-_admin.datatables>
                </div>
            </div>

        </div>
        @endslot
    </x-_admin.page-content>
@endsection

@push('css-script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@endpush
@push('js-script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var datatable = $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'transaksi', name: 'transaksi'},
                {data: 'penjualan', name: 'penjualan'},
                {data: 'cluster', name: 'cluster'},
                {data: 'action', name: 'action', searchable: false, orderable: false},
            ],
        });
   </script>
@endpush