@extends('_admin._layouts.app')
@section('title', 'Pengguna')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Pengguna
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Akun</li>
            <li class="breadcrumb-item active">Pengguna</li>
        @endslot

        @slot('cardTitle')
            Daftar Pengguna
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <div class="row mb-2">
                <div class="col">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success float-right"> <i class="fas fa-plus"></i> Tambah Pengguna</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <x-_admin.datatables>
                        @slot('columns')
                            <th>Nama</th>
                            <th>E-Mail</th>
                            <th>Foto</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                        @endslot
                    </x-_admin.datatables>
                </div>
            </div>

        </div>
        @endslot
    </x-_admin.page-content>
@endsection

@push('js-script')
    <script>
        var datatable = $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'photo', name: 'photo'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
            columnDefs: [
                {
                    "targets": 3,
                    "className": "text-center",
                },
                {
                    "targets": 6,
                    "className": "text-center",
                },
            ]
        });
   </script>
@endpush