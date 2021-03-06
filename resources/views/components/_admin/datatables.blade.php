<div>
    <table id="datatables" class="table table-bordered">
        <thead class="text-white text-center" style="background-color: #DEB886;">
            <tr>
                <th style="width: 5%;">#</th>
                {{ $columns }}
                <th style="width: 10%;">Status</th>
                <th style="width: 10%;">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    @push('css-script')
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endpush
    @push('js-script')
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    @endpush
</div>