@extends('_admin._layouts.app')
@section('title', 'Admin')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Admin
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Akun</li>
            <li class="breadcrumb-item active">Admin</li>
        @endslot

        @slot('cardTitle')
            Daftar Admin
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <div class="row mb-2">
                <div class="col">
                    <a href="{{ route('admin.admins.create') }}" class="btn btn-success float-right"> <i class="fas fa-plus"></i> Tambah Admin</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <x-_admin.datatables>
                        @slot('columns')
                            <th>Nama</th>
                            <th>E-Mail</th>
                            <th>No. Telepon</th>
                            <th>Foto</th>
                            <th>Tanggal Daftar</th>
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
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'photo', name: 'photo'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
            columnDefs: [
                {
                    "targets": 4,
                    "className": "text-center",
                },
                {
                    "targets": 6,
                    "className": "text-center",
                },
                {
                    "targets": 7,
                    "className": "text-center",
                },
            ]
        });

        function delete_admin(e) {
            var url = '{{ route("admin.admins.destroy", ":id") }}';
            url = url.replace(':id', e);
            console.log(url);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            Swal.fire({
                title             : "Hapus Data",
                text              : "Apakah Anda yakin akan hapus data ini!?",
                icon              : "warning",
                showCancelButton  : true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor : "#d33",
                confirmButtonText : "Ya, Hapus!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url    : url,
                        type   : "delete",
                        success: function(data) {
                            $('#datatables').DataTable().ajax.reload();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }
            })

        }
   </script>
@endpush