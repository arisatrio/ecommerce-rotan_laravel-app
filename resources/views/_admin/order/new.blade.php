@extends('_admin._layouts.app')
@section('title', 'Pesanan Baru')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Pesanan Baru
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Master Data</li>
            <li class="breadcrumb-item active">Pesanan Baru</li>
        @endslot

        @slot('cardTitle')
            Daftar Pesanan Baru
        @endslot

        @slot('cardBody')
        <div class="card-body">

            <div class="row">
                <div class="col">
                    <x-_admin.datatables>
                        @slot('columns')
                            <th>Tanggal</th>
                            <th>Oleh</th>
                            <th>Order ID</th>
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
                {data: 'created_at', name: 'created_at'},
                {data: 'oleh', name: 'oleh'},
                {data: 'order_number', name: 'order_number'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
        });
   </script>
@endpush